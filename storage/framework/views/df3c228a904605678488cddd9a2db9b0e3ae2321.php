<?php $__env->startSection('main'); ?>
<div class="container margin-top30 mb30">
  <div class="col-md-8 col-sm-8 col-xs-12 mb10" style="background-color:#f3f3f3;min-height:500px;">
    <div class="h2 mb25">Stripe Payment</div>
    <form action="<?php echo e(URL::to('payments/stripe-request')); ?>" method="post" id="payment-form">
      <div class="form-row">
        <label for="card-element">
          <?php echo e(trans('messages.payment_stripe.credit_debit_card')); ?>

        </label>
        <div id="card-element">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button class="btn ex-btn" style="margin-top:10px;"><?php echo e(trans('messages.payment_stripe.submit_payment')); ?></button>
    </form>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12 mb10">
      <img src="<?php echo e(@$result->cover_photo); ?>" alt="<?php echo e($result->name); ?>" style="width:100%; height:180px;">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="extra-sizefont"><strong><?php echo e($result->name); ?></strong></div>
          <div class="h6"><?php echo e($result->property_address->city); ?>, <?php echo e($result->property_address->state); ?>, <?php echo e($result->property_address->country_name); ?></div>
          <hr/>
          <div class="h6"><strong><?php echo e($result->room_type_name); ?></strong><?php echo e(trans('messages.payment.for')); ?>  <strong><?php echo e($number_of_guests); ?> <?php echo e(trans('messages.payment.guest')); ?></strong> </div>
          <div class="h6"><strong><?php echo e(date('D, M d, Y', strtotime($checkin))); ?></strong> to <strong><?php echo e(date('D, M d, Y', strtotime($checkout))); ?></strong></div>
          <hr/>
          <div class="">
            <div class="side_tt"><?php echo e(trans('messages.payment.cancel_policy')); ?></div>
            <div class="side_tt"><a href="<?php echo e(url('home/cancellation_policies#').strtolower($result->cancel_policy)); ?>"><?php echo e($result->cancellation); ?></a></div>
          </div>
          <div class="">
            <div class="side_tt"><?php echo e(trans('messages.payment.house_rule')); ?></div>
            <div class="side_tt"><a href="#house-rules-agreement"><?php echo e(trans('messages.payment.read_policy')); ?></a></div>
          </div>
          <div class="">
            <div class="side_tt"><?php echo e(trans('messages.payment.night')); ?></div>
            <div class="side_tt"><?php echo e($nights); ?></div>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <div class="exfont">
            <div class="side_tt"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->property_price); ?> x <?php echo e($nights); ?> <?php echo e(trans('messages.payment.nights')); ?></div>
            <div class="side_tt text-right"><?php echo e($result->property_price->currency->symbol); ?><?php echo e($price_list->total); ?></div>
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
      // Create a Stripe client
      var stripe = Stripe('<?php echo e($publishable); ?>');

      // Create an instance of Elements
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
        base: {
          color: '#32325d',
          lineHeight: '24px',
          fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
          fontSmoothing: 'antialiased',
          fontSize: '16px',
          '::placeholder': {
            color: '#aab7c4'
          }
        },
        invalid: {
          color: '#fa755a',
          iconColor: '#fa755a'
        }
      };

      // Create an instance of the card Element
      var card = elements.create('card', {style: style});

      // Add an instance of the card Element into the `card-element` <div>
      card.mount('#card-element');

      // Handle real-time validation errors from the card Element.
      card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
      });

      // Handle form submission
      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
          if (result.error) {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
          }
        });
      });

      function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
      }
    </script>
<?php $__env->stopPush(); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>