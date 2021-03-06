<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Helpers\Common;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payouts;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Settings;
use App\Models\PaymentMethods;
use App\Models\Payment;
use App\Models\Photo;
use App\Models\Withdraw;
use App\Models\Properties;
use App\Models\Bookings;
use App\Models\BookingDetails;
use App\Models\PropertyDates;
use App\Models\PropertyDatesTime;
use App\Models\PaymentSlip;
use App\Models\Messages;
use Validator;
use DateTime;
use Session;
use Auth;
use App\Http\Controllers\EmailController;

class PaymentController extends Controller {

    protected $helper;

    public function __construct() {
        $this->helper = new Common;
    }

    public function setup($way = 'PayPal_Express') {
        $paypal_data = Settings::where('type', 'PayPal')->pluck('value', 'name');
        $this->omnipay = Omnipay::create($way);
        $this->omnipay->setUsername($paypal_data['username']);
        $this->omnipay->setPassword($paypal_data['password']);
        $this->omnipay->setSignature($paypal_data['signature']);
        $this->omnipay->setTestMode(($paypal_data['mode'] == 'sandbox') ? true : false);
        if ($way == 'Paypal_Express')
            $this->omnipay->setLandingPage('Login');
    }

    public function index(Request $request) {
        $special_offer_id = '';

        if ($_GET) {
            Session::put('payment_property_id', $request->property_id);
            Session::put('payment_checkin', date('d-m-Y H:i', strtotime($request->checkin)));
            Session::put('payment_checkout', date('d-m-Y H:i', strtotime($request->checkout)));
            Session::put('payment_number_of_guests', $request->number_of_guests);
            Session::put('payment_booking_type', 'instant');

            $id = Session::get('payment_property_id');
            $checkin = Session::get('payment_checkin');
            $checkout = Session::get('payment_checkout');
            $number_of_guests = Session::get('payment_number_of_guests');
            $booking_type = Session::get('payment_booking_type');
        } elseif ($_POST) {
            Session::put('payment_property_id', $request->id);
            Session::put('payment_checkin', $request->checkin);
            Session::put('payment_checkout', $request->checkout);
            Session::put('payment_number_of_guests', $request->number_of_guests);
            Session::put('payment_booking_type', $request->booking_type);

            $id = Session::get('payment_property_id');
            $checkin = Session::get('payment_checkin');
            $checkout = Session::get('payment_checkout');
            $number_of_guests = Session::get('payment_number_of_guests');
            $booking_type = Session::get('payment_booking_type');
        } else {
            $id = Session::get('payment_property_id');
            $number_of_guests = Session::get('payment_number_of_guests');
            $checkin = Session::get('payment_checkin');
            $checkout = Session::get('payment_checkout');
            $booking_type = Session::get('payment_booking_type');
        }

        if (!$_POST && !$checkin) {
            return redirect('properties/' . $request->id);
        }

        $data['result'] = Properties::find($id);
        $data['property_id'] = $id;


        $data['number_of_guests'] = $number_of_guests;
        $data['booking_type'] = $booking_type;
        $data['checkin'] = $checkin;
        $data['checkout'] = $checkout;


        //custom code start
        $total_time = "";
        $from = new DateTime($checkin);
        $to = new DateTime($checkout);
        $diff = date_diff($from, $to);
        $total_nights_minute = ($diff->d * 24 * 60) + ($diff->h * 60) + $diff->i;
        if ($diff->y) {
            $total_time .= "{$diff->y} year";
        }
        if ($diff->m) {
            $total_time .= " {$diff->m} month";
        }
        if ($diff->d) {
            $total_time .= " {$diff->d} day";
        }
        if ($diff->h) {
            $total_time .= " {$diff->h} hour";
        }
        if ($diff->i) {
            $total_time .= " {$diff->i} min";
        }

        $data['nights'] = $total_time;


        $travel_credit = 0;


        $data['price_list'] = json_decode($this->helper->get_price($data['property_id'], $data['checkin'], $data['checkout'], $data['number_of_guests']));

        Session::put('payment_price_list', $data['price_list']);

        if (@$data['price_list']->status == 'Not available') {
            $this->helper->one_time_message('error', trans('messages.error.property_available_error'));
            return redirect('properties/' . $id);
        }

        $data['price_eur'] = $this->helper->convert_currency($data['result']->property_price->code, 'EUR', $data['price_list']->total);

        $data['price_rate'] = $this->helper->currency_rate($data['result']->property_price->currency_code, 'EUR');

//        $data['currency']         = Currency::where('default', 129)->take(1)->get();
        $data['country'] = Country::all()->pluck('name', 'short_name');

        return view('payment.payment', $data);
    }

    public function create_booking(Request $request) {
        $paypal_credentials = Settings::where('type', 'PayPal')->pluck('value', 'name');

        $price_list = json_decode($this->helper->get_price($request->property_id, $request->checkin, $request->checkout, $request->number_of_guests));

        $amount = $this->helper->convert_currency($request->currency, 'EUR', $price_list->total);

        $country = $request->payment_country;

        $message_to_host = $request->message_to_host;


        $purchaseData = [
            'testMode' => ($paypal_credentials['mode'] == 'sandbox') ? true : false,
            'amount' => $amount,
            'currency' => 'EUR',
            'returnUrl' => url('payments/success'),
            'cancelUrl' => url('payments/cancel')
        ];

        Session::put('amount', $amount);
        Session::put('payment_country', $country);
        Session::put('message_to_host_' . Auth::user()->id, $message_to_host);

        Session::save();

        if ($request->payment_method == 'stripe') {
            return redirect('payments/stripe');
        }
        if ($request->payment_method == 'bank_transfer') {
            return redirect('payments/bank_transfer');
        } else
            $this->setup();

        if ($amount) {
            $response = $this->omnipay->purchase($purchaseData)->send();
            if ($response->isSuccessful()) {

                $result = $response->getData();

                $data = [
                    'property_id' => $request->property_id,
                    'checkin' => $request->checkin,
                    'checkout' => $request->checkout,
                    'number_of_guests' => $request->number_of_guests,
                    'transaction_id' => $result['TRANSACTIONID'],
                    'price_list' => $price_list,
                    'paymode' => 'Credit Card',
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'postal_code' => $request->zip,
                    'country' => $request->payment_country
                ];

                $code = $this->store($data);

                $this->helper->one_time_message('success', trans('messages.success.payment_success'));
                return redirect('booking/requested?code=' . $code);
            } elseif ($response->isRedirect()) {
                $response->redirect();
            } else {
                $this->helper->one_time_message('error', $response->getMessage());
                return redirect('payments/book/' . $request->property_id);
            }
        } else {
            $data = [
                'property_id' => $request->property_id,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
                'number_of_guests' => $request->number_of_guests,
                'transaction_id' => '',
                'price_list' => $price_list,
                'paymode' => 'PayPal',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'postal_code' => $request->zip,
                'country' => $request->payment_country
            ];

            $code = $this->store($data);

            $this->helper->one_time_message('success', trans('messages.success.payment_success'));
            return redirect('booking/requested?code=' . $code);
        }
    }

    public function stripe_payment(Request $request) {
        $id = Session::get('payment_property_id');
        $data['result'] = Properties::find($id);
        $data['property_id'] = $id;

        $checkin = Session::get('payment_checkin');
        $checkout = Session::get('payment_checkout');
        $number_of_guests = Session::get('payment_number_of_guests');
        $booking_type = Session::get('payment_booking_type');

        $data['checkin'] = $checkin;
        $data['checkout'] = $checkout;
        $data['number_of_guests'] = $number_of_guests;
        $data['booking_type'] = $booking_type;

        //custom code start
        $total_time = "";
        $from = new DateTime($checkin);
        $to = new DateTime($checkout);
        $diff = date_diff($from, $to);

        if ($diff->y) {
            $total_time .= "{$diff->y} year";
        }
        if ($diff->m) {
            $total_time .= " {$diff->m} month";
        }
        if ($diff->d) {
            $total_time .= " {$diff->d} day";
        }
        if ($diff->h) {
            $total_time .= " {$diff->h} hour";
        }
        if ($diff->i) {
            $total_time .= " {$diff->i} min";
        }

        $data['nights'] = $total_time;

        $data['price_list'] = Session::get('payment_price_list');

        $data['price_eur'] = $this->helper->convert_currency($data['result']->property_price->default_code, 'EUR', $data['price_list']->total);

        $data['price_rate'] = $this->helper->currency_rate($data['result']->property_price->currency_code, 'EUR');

        $stripe = Settings::where('type', 'Stripe')->pluck('value', 'name');
        $data['publishable'] = $stripe['publishable'];
        return view('payment.stripe', $data);
    }

    public function bank_transfer(Request $request) {
        $id = Session::get('payment_property_id');
        $data['result'] = Properties::find($id);
        $data['property_id'] = $id;

        $checkin = Session::get('payment_checkin');
        $checkout = Session::get('payment_checkout');
        $number_of_guests = Session::get('payment_number_of_guests');
        $booking_type = Session::get('payment_booking_type');

        $data['checkin'] = $checkin;
        $data['checkout'] = $checkout;
        $data['number_of_guests'] = $number_of_guests;
        $data['booking_type'] = $booking_type;

        //custom code start
        $total_time = "";
        $from = new DateTime($checkin);
        $to = new DateTime($checkout);
        $diff = date_diff($from, $to);

        if ($diff->y) {
            $total_time .= "{$diff->y} year";
        }
        if ($diff->m) {
            $total_time .= " {$diff->m} month";
        }
        if ($diff->d) {
            $total_time .= " {$diff->d} day";
        }
        if ($diff->h) {
            $total_time .= " {$diff->h} hour";
        }
        if ($diff->i) {
            $total_time .= " {$diff->i} min";
        }

        $data['nights'] = $total_time;

        $data['price_list'] = Session::get('payment_price_list');

        $data['price_eur'] = $this->helper->convert_currency($data['result']->property_price->default_code, 'EUR', $data['price_list']->total);

        $data['price_rate'] = $this->helper->currency_rate($data['result']->property_price->currency_code, 'EUR');

        $bank = Settings::where('type', 'bank_transfer')->pluck('value', 'name');

        $data['bank_name'] = $bank['bank_name'];
        $data['account_holder_name'] = $bank['account_holder_name'];
        $data['account_number'] = $bank['account_number'];
        $data['ifsc_code'] = $bank['ifsc_code'];
        $data['iban'] = $bank['iban'];
        $data['bic'] = $bank['bic'];
        $data['instruction_note'] = $bank['instruction_note'];

        return view('payment.bank', $data);
    }

    public function stripe_request(Request $request) {
        if ($_POST) {
            if (isset($request->stripeToken)) {
                $id = Session::get('payment_property_id');
                $result = Properties::find($id);
                $price_list = Session::get('payment_price_list');
                $price_eur = $this->helper->convert_currency($result->property_price->code, 'EUR', $price_list->total);

                $stripe = Settings::where('type', 'Stripe')->pluck('value', 'name');

                $gateway = Omnipay::create('Stripe');
                $gateway->setApiKey($stripe['secret']);

                $response = $gateway->purchase([
                            'amount' => $price_eur,
                            'currency' => 'EUR',
                            'token' => $request->stripeToken,
                        ])->send();

                if ($response->isSuccessful()) {
                    $token = $response->getTransactionReference();
                    $pm = PaymentMethods::where('name', 'Stripe')->first();
                    $data = [
                        'property_id' => Session::get('payment_property_id'),
                        'checkin' => Session::get('payment_checkin'),
                        'checkout' => Session::get('payment_checkout'),
                        'number_of_guests' => Session::get('payment_number_of_guests'),
                        'transaction_id' => $token,
                        'price_list' => Session::get('payment_price_list'),
                        'country' => Session::get('payment_country'),
                        'message_to_host' => Session::get('message_to_host_' . Auth::user()->id),
                        'payment_method_id' => $pm->id,
                        'paymode' => 'Stripe'
                    ];
                    $code = $this->store($data);

                    $this->helper->one_time_message('success', trans('messages.success.payment_complete_success'));
                    return redirect('booking/requested?code=' . $code);
                } else {
                    $message = $response->getMessage();
                    $this->helper->one_time_message('error', $message);
                    return redirect('payments/book/' . Session::get('payment_property_id'));
                }
            } else {
                $this->helper->one_time_message('error', trans('messages.error.payment_request_error'));
                return redirect('payments/book/' . Session::get('payment_property_id'));
            }
        }
    }

    public function success(Request $request) {
        $this->setup();
        $transaction = $this->omnipay->completePurchase(array(
            'payer_id' => $request->PayerID,
            'transactionReference' => $request->token,
            'amount' => Session::get('amount'),
            'currency' => 'EUR'
        ));

        $response = $transaction->send();

        $result = $response->getData();

        if (@$result['ACK'] == 'Success') {
            $pm = PaymentMethods::where('name', 'PayPal')->first();
            $data = [
                'property_id' => Session::get('payment_property_id'),
                'checkin' => Session::get('payment_checkin'),
                'checkout' => Session::get('payment_checkout'),
                'number_of_guests' => Session::get('payment_number_of_guests'),
                'transaction_id' => @$result['PAYMENTINFO_0_TRANSACTIONID'],
                'price_list' => Session::get('payment_price_list'),
                'country' => Session::get('payment_country'),
                'message_to_host' => Session::get('message_to_host_' . Auth::user()->id),
                'payment_method_id' => $pm->id,
                'paymode' => 'PayPal'
            ];

            $code = $this->store($data);

            $this->helper->one_time_message('success', trans('messages.success.payment_success'));
            return redirect('booking/requested?code=' . $code);
        } else {
            $this->helper->one_time_message('error', $result['L_SHORTMESSAGE0']);
            return redirect('payments/book/' . Session::get('payment_property_id'));
        }
    }

    public function cancel(Request $request) {
        $this->helper->one_time_message('error', trans('messages.error.payment_process_error'));
        return redirect('payments/buy/' . Session::get('photo_id'));
    }

    public function store($data) {
        $booking = new Bookings;

        $booking->property_id = $data['property_id'];
        $properties = properties::find($data['property_id']);
        $booking->host_id = $properties->host_id;
        $booking->user_id = Auth::user()->id;

        //custom code
        $booking->start_date = date("Y-m-d H:i:s", strtotime($data['checkin']));
        $booking->end_date = date("Y-m-d H:i:s", strtotime($data['checkout']));
//        $booking->start_date        = $this->helper->y_m_d_convert($data['checkin']);
//        $booking->end_date          = $this->helper->y_m_d_convert($data['checkout']);        

        $booking->guest = $data['number_of_guests'];
        $booking->total_night = $data['price_list']->total_nights;
        $booking->per_night = $data['price_list']->property_price;
        $booking->base_price = $data['price_list']->subtotal;
        $booking->cleaning_charge = $data['price_list']->cleaning_fee;
        $booking->guest_charge = $data['price_list']->additional_guest;
        $booking->security_money = $data['price_list']->security_fee;
        $booking->service_charge = $data['price_list']->service_fee;
        $booking->host_fee = $data['price_list']->host_fee;
        $booking->total = $data['price_list']->total;
        $booking->currency_code = $data['price_list']->currency;
        $booking->transaction_id = $data['transaction_id'];
        $booking->payment_method_id = $data['payment_method_id'];
        $booking->cancellation = Properties::find($data['property_id'])->cancellation;
        $booking->status = (Session::get('payment_booking_type') == 'instant') ? 'Accepted' : 'Pending';
        $booking->booking_type = Session::get('payment_booking_type');
        $booking->save();

        if ($data['paymode'] == 'Credit Card') {
            $booking_details['first_name'] = $data['first_name'];
            $booking_details['last_name '] = $data['last_name'];
            $booking_details['postal_code'] = $data['postal_code'];
        }

        $booking_details['country'] = $data['country'];

        foreach ($booking_details as $key => $value) {
            $booking_details = new BookingDetails;
            $booking_details->booking_id = $booking->id;
            $booking_details->field = $key;
            $booking_details->value = $value;
            $booking_details->save();
        }


        do {
            $code = $this->helper->randomCode(6);
            $check_code = Bookings::where('code', $code)->get();
        } while (empty($check_code));

        $booking_code = Bookings::find($booking->id);

        $booking_code->code = $code;

        $booking_code->save();

        $days = $this->helper->get_days($data['checkin'], $data['checkout']);
        for ($j = 0; $j < count($days); $j++) {
            $tmp_date = date('Y-m-d', strtotime($days[$j]));
            $property_data = [
                'property_id' => $data['property_id'],
                'date' => $tmp_date,
                'status' => 'Not available'
            ];

            $property_dates = PropertyDates::updateOrCreate(['property_id' => $data['property_id'], 'date' => $tmp_date], $property_data);
            //cutom code

            if (date('Y-m-d', strtotime($data['checkout'])) == date('Y-m-d', strtotime($data['checkin'])) && date('Y-m-d', strtotime($data['checkout'])) == $tmp_date) {
                $date_time = [
                    'property_dates_id' => $property_dates->id,
                    'check_in' => date("Y-m-d H:i", strtotime($data['checkin'])),
                    'check_out' => date("Y-m-d H:i", strtotime($data['checkout'])),
                ];
            } else if ($tmp_date == date('Y-m-d', strtotime($data['checkin']))) {
                $date_time = [
                    'property_dates_id' => $property_dates->id,
                    'check_in' => date("Y-m-d H:i", strtotime($data['checkin'])),
                ];
            } else if ($tmp_date == date('Y-m-d', strtotime($data['checkout']))) {
                $date_time = [
                    'property_dates_id' => $property_dates->id,
                    'check_out' => date("Y-m-d H:i", strtotime($data['checkout'])),
                ];
            } else {
                $date_time = [
                    'property_dates_id' => $property_dates->id,
                ];
            }

            $share_accomodates = 0;
            if ($properties->space_type_name == "Shared room") {
                $bedrooms = $properties->bedrooms;
                $capacity = $properties->accommodates;
                $capacity_per_room = (int) $capacity / $bedrooms;
                $last_room_capacity = 0;
                if ($capacity % $bedrooms) {
                    $last_room_capacity = $capacity_per_room + $last_room_capacity;
                }
                $book_count = 0;
                for ($i = 1; $i <= $bedrooms; $i++) {
                    $book_count = $i;
                    $temp = $data['number_of_guests'] - $capacity_per_room;
                    if ($temp < 1) {
                        break;
                    }
                }
                $data_previous = PropertyDatesTime::where($date_time)->first();
                if ($data_previous) {
                    $share_accomodates = $data_previous->share_accomodates + $book_count;
                    $date_time['share_accomodates'] = $share_accomodates;
                    PropertyDatesTime::where(['id' => $data_previous->id])->update($date_time);
                } else {
                    $share_accomodates = $book_count;
                    PropertyDatesTime::create($date_time);
                }
            } else {
                $date_time['share_accomodates'] = $share_accomodates;
                PropertyDatesTime::updateOrCreate($date_time);
            }
        }

        if ($booking->status == 'Accepted') {
            $payouts = new Payouts;

            $payouts->booking_id = $booking->id;
            $payouts->user_id = $booking->host_id;
            $payouts->user_type = 'host';
            $payouts->amount = $booking->host_payout;
            $payouts->penalty_amount = 0;
            $payouts->currency_code = $booking->currency_code;
            $payouts->status = 'Future';

            $payouts->save();
        }

        $message = new Messages;
        $message->property_id = $data['property_id'];
        $message->booking_id = $booking->id;
        $message->sender_id = $booking->user_id;
        $message->receiver_id = $booking->host_id;
        $message->message = @$data['message_to_host'];
        $message->type_id = 4;
        $message->read = 0;
        $message->save();

        $email_controller = new EmailController;
        $email_controller->booking($booking->id);

        Session::forget('payment_property_id');
        Session::forget('payment_checkin');
        Session::forget('payment_checkout');
        Session::forget('payment_number_of_guests');
        Session::forget('payment_booking_type');

        return $code;
    }

    public function withdraws(Request $request) {
        $photos = Photo::where('user_id', \Auth::user()->id)->get();
        $photo_ids = [];
        foreach ($photos as $key => $value) {
            $photo_ids[] = $value->id;
        }
        $payment_sum = Payment::whereIn('photo_id', $photo_ids)->sum('amount');
        $withdraw_sum = Withdraw::where('user_id', Auth::user()->id)->sum('amount');
        $data['total'] = $total = $payment_sum - $withdraw_sum;
        if ($_POST) {
            if ($total >= $request->amount) {
                $withdraw = new Withdraw;
                $withdraw->user_id = Auth::user()->id;
                $withdraw->amount = $request->amount;
                $withdraw->status = 'Pending';
                $withdraw->save();
                $data['success'] = 1;
                $data['message'] = 'Success';
            } else {
                $data['success'] = 0;
                $data['message'] = 'Balance exceed';
            }
            echo json_encode($data);
            exit;
        }

        $data['details'] = Auth::user()->details_key_value();
        $data['results'] = Withdraw::where('user_id', Auth::user()->id)->get();
        return view('payment.withdraws', $data);
    }

    public function bank_request(Request $request) {
        if ($_POST && $_POST['file_name']) {
            // location to save cropped image
            $url = public_path() . "/front/images/payments/" . time() . '_pay_slip.jpg';

            // remove the base64 part
            $base64 = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $_POST['string']));
            // create image
            $source = imagecreatefromstring($base64);
            // save image
            if (imagejpeg($source, $url, 100)) {
                $this->helper->one_time_message('error', 'Could not upload Image');
                return redirect('payments/book/' . Session::get('payment_property_id'));
            }

            $payment_slip = PaymentSlip::create([
                        'file_name' => $filename,
                        'property_id' => Session::get('payment_property_id'),
                        'status' => 'pending']);

//            $id = Session::get('payment_property_id');
//            $result = Properties::find($id);
//            $price_list = Session::get('payment_price_list');

            $pm = PaymentMethods::where('name', 'Bank Transfer')->first();
            $data = [
                'property_id' => Session::get('payment_property_id'),
                'checkin' => Session::get('payment_checkin'),
                'checkout' => Session::get('payment_checkout'),
                'number_of_guests' => Session::get('payment_number_of_guests'),
                'transaction_id' => $payment_slip->id,
                'price_list' => Session::get('payment_price_list'),
                'country' => Session::get('payment_country'),
                'message_to_host' => Session::get('message_to_host_' . Auth::user()->id),
                'payment_method_id' => $pm->id,
                'paymode' => 'Bank Transfer'
            ];
            $code = $this->store($data);
            $this->helper->one_time_message('success', trans('messages.success.payment_complete_success'));
            return redirect('booking/requested?code=' . $code);
//                }else{
//                     $message = $response->getMessage();
//                     $this->helper->one_time_message('error',  $message);
//                     return redirect('payments/book/'.Session::get('payment_property_id'));
//                }
        } else {
            $this->helper->one_time_message('error', trans('messages.error.payment_request_error'));
            return redirect('payments/book/' . Session::get('payment_property_id'));
        }
    }

}
