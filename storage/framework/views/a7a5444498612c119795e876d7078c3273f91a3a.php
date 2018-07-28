<?php $__env->startSection('main'); ?>
<div class="container margin-top30 mb30">
  <form action="<?php echo e(url('payments/create_booking')); ?>" method="post" id="checkout-form">
    <div class="col-md-8 col-sm-8 col-xs-12 mb10" style="background-color:#f3f3f3;">
      <input name="property_id" type="hidden" value="<?php echo e($property_id); ?>">
      <input name="checkin" type="hidden" value="<?php echo e($checkin); ?>">
      <input name="checkout" type="hidden" value="<?php echo e($checkout); ?>">
      <input name="number_of_guests" type="hidden" value="<?php echo e($number_of_guests); ?>">
      <input name="nights" type="hidden" value="<?php echo e($nights); ?>">
      <input name="currency" type="hidden" value="<?php echo e($result->property_price->code); ?>">

      <div class="h2 mb25"><?php echo e(trans('messages.payment.payment')); ?></div>
      <div class="form-group">
        <div class="col-sm-12">
          <label for="exampleInputEmail1"><?php echo e(trans('messages.payment.country')); ?></label>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-5">
          <select name="payment_country" id="country-select" data-saving="basics1" class="form-control">
            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($key); ?>" <?php echo e(($key == $default_country) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
        <div class="col-sm-12">
          <label for="exampleInputEmail1"><?php echo e(trans('messages.payment.payment_type')); ?></label>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-5">
          <select name="payment_method" class="form-control" id="payment-method-select">
            <option value="paypal" data-payment-type="payment-method" data-cc-type="visa" data-cc-name="" data-cc-expire="">
             <?php echo e(trans('messages.payment.paypal')); ?> 
            </option>
            <option value="stripe" data-payment-type="payment-method" data-cc-type="visa" data-cc-name="" data-cc-expire="">
              <?php echo e(trans('messages.payment.stripe')); ?>

            </option>
          </select>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr/>
      <div class="clearfix"></div>
      <div class="form-group paypal-div mb20">
        <div class="row col-md-12">
          <div class="col-md-12" id='paypal-text'>
            <?php echo e(trans('messages.payment.redirect_to_paypal')); ?>

          </div>
        </div>
      </div>
      <hr/>
      <div class="information">

       <div class="col-md-12">
         <div class="col-md-2 col-sm-3 col-xs-12">
          <div class="media-photo-badge text-center">
            <a href="<?php echo e(url('users/show/'.Auth::user()->id)); ?>"><img alt="User Profile Image" class="" src="<?php echo e(Auth::user()->profile_src); ?>" title="<?php echo e(Auth::user()->first_name); ?>"></a>
          </div>
         </div>
         <div class="col-md-10 col-sm-9 col-xs-12">
          <textarea name="message_to_host" placeholder="Message your host..." class="form-control" rows="5"></textarea>
         </div>
       </div>
       
       <div class="clearfix"></div>
        <button id="payment-form-submit" type="submit" class="btn ex-btn">
            <?php echo e(($booking_type == 'instant') ? 'Book Now' : 'Continue'); ?>

        </button>
       </div>
    </div>
  </form>
  <div class="col-md-4 col-sm-4 col-xs-12 mb10">
    <img src="<?php echo e(@$result->cover_photo); ?>" alt="<?php echo e($result->name); ?>" style="width:100%; height:180px;">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="extra-sizefont"><strong><?php echo e($result->name); ?></strong></div>
        <div class="h6"><?php echo e($result->property_address->city); ?>, <?php echo e($result->property_address->state); ?>, <?php echo e($result->property_address->country_name); ?></div>
        <hr/>
        <div class="h6"><strong><?php echo e($result->property_type_name); ?></strong> <?php echo e(trans('messages.payment.for')); ?> <strong><?php echo e($number_of_guests); ?> <?php echo e(trans('messages.payment.guest')); ?></strong> </div>
        <div class="h6"><strong><?php echo e(date('D, M d, Y', strtotime($checkin))); ?></strong> to <strong><?php echo e(date('D, M d, Y', strtotime($checkout))); ?></strong></div>
        <hr/>

        <div class="">
          <div class="side_tt"><?php echo e(trans('messages.payment.night')); ?></div>
          <div class="side_tt"><?php echo e($nights); ?></div>
        </div>
        <div class="clearfix"></div>
        <hr/>
        <div class="exfont">
          <div class="side_tt"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->property_price); ?> x <?php echo e($nights); ?> <?php echo e(trans('messages.payment.nights')); ?></div>
          <div class="side_tt text-right"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->total_night_price); ?></div>
        </div>
        <?php if($price_list->service_fee): ?>
        <div class="exfont">
          <div class="side_tt"><?php echo e(trans('messages.payment.service_fee')); ?></div>
          <div class="side_tt text-right"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->service_fee); ?></div>
        </div>
        <?php endif; ?>
        <?php if($price_list->additional_guest): ?>
        <div class="exfont">
          <div class="side_tt"><?php echo e(trans('messages.payment.additional_guest_fee')); ?></div>
          <div class="side_tt text-right"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->additional_guest); ?></div>
        </div>
        <?php endif; ?>
        <?php if($price_list->security_fee): ?>
        <div class="exfont">
          <div class="side_tt"><?php echo e(trans('messages.payment.security_deposit')); ?></div>
          <div class="side_tt text-right"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->security_fee); ?></div>
        </div>
        <?php endif; ?>
        <?php if($price_list->cleaning_fee): ?>
        <div class="exfont">
          <div class="side_tt"><?php echo e(trans('messages.payment.cleaning_fee')); ?></div>
          <div class="side_tt text-right"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->cleaning_fee); ?></div>
        </div>
        <?php endif; ?>
        <div class="clearfix"></div>
        <hr/>
        <div class="ex-pop mb20">
          <div class="side_tt"><strong><?php echo e(trans('messages.payment.total')); ?></strong></div>
          <div class="side_tt text-right"><strong><?php echo e($result->property_price->currency->symbol); ?> <?php echo e($price_list->total); ?></strong></div>
          <div class="clearfix"></div>
        </div>
        <p class="exfont">
          <small>
            <?php echo e(trans('messages.payment.paying_in')); ?>

            <strong><span id="payment-currency">&euro;EUR</span></strong>.
            <?php echo e(trans('messages.payment.your_total_charge')); ?>

            <strong><span id="payment-total-charge">&euro;<?php echo e($price_eur); ?></span></strong>.
            <?php echo e(trans('messages.payment.exchange_rate_booking')); ?> &euro; 1 to <?php echo e($result->property_price->currency->org_symbol); ?><?php echo e($price_rate); ?> <?php echo e($result->property_price->currency_code); ?> (your host's listing currency).
          </small>
        </p>
      </div>
    </div>
  </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
$('#payment-method-select').on('change', function(){
  var payment = $(this).val();
  if(payment == 'stripe'){
    $('.cc-div').addClass('display-off');
    $('.paypal-div').addClass('display-off');
  }else {
    $('#paypal-text').html('You will be redirected to PayPal.');
    $('.cc-div').addClass('display-off');
    $('.paypal-div').removeClass('display-off');
  }
});

$('#country-select').on('change', function() {
  var country = $(this).find('option:selected').text();
  //country_ar = <?php echo e($country); ?>;
  $('#country-name-set').html(country);
})
</script>
<?php $__env->stopPush(); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>