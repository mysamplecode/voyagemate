
<?php $__env->startSection('main'); ?>
  <div class="content-wrapper">
         <!-- Main content -->
  <section class="content-header">
          <h1>
          Pricing
          <small>Pricing</small>
        </h1>
        <ol class="breadcrumb">
    <li><a href="<?php echo e(url('/')); ?>/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
  </section>
<section class="content">
<div class="row">
        <div class="col-md-3 settings_bar_gap">
          <?php echo $__env->make('admin.common.property_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

   <div class="col-md-9">
    <form method="post" action="<?php echo e(url('admin/listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
      <div class="box box-info">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
           <h4><?php echo e(trans('messages.listing_price.base_price')); ?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label for="listing_price_native" class="label-large"><?php echo e(trans('messages.listing_price.night_price')); ?></label>
            <div class="input-addon">
              <span class="input-prefix pay-currency"><?php echo e(@$result->property_price->currency->org_symbol); ?></span>
              <input type="text" data-suggested="" id="price-night" value="<?php echo e((@$result->property_price->original_price == 0) ? '' : @$result->property_price->original_price); ?>" name="price" class="money-input form-control">
            </div>
            <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
          </div>
          <div class="col-md-8">
            <label class="label-large"><?php echo e(trans('messages.listing_price.currency')); ?></label>
            <select id='price-select-currency_code' name="currency_code" class='form-control'>
              <?php $__currentLoopData = @$currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>" <?php echo e(@$result->property_price->currency_code == $key?'selected':''); ?>><?php echo e($value); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="col-md-8">
            <?php if(@$result->property_price->weekly_discount == 0 && @$result->property_price->monthly_discount == 0): ?>
              <p id="js-set-long-term-prices" class="row-space-top-6 text-center text-muted set-long-term-prices">
               <?php echo e(trans('messages.listing_price.access_offer')); ?>  <a data-prevent-default="" href="#" id="show_long_term"><?php echo e(trans('messages.listing_price.week_month')); ?></a> <?php echo e(trans('messages.listing_price.price')); ?>.
              </p>
              <hr class="row-space-top-6 row-space-5 set-long-term-prices">
            <?php endif; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h4><?php echo e(trans('messages.listing_price.long_term_price')); ?></h4>
          </div>
        </div>
        <div class="row <?php echo e((@$result->property_price->weekly_discount == 0 && @$result->property_price->monthly_discount == 0)? 'display-off':''); ?>" id="long-term-div">
          
          <div class="col-md-8">
            <label for="listing_price_native" class="label-large"><?php echo e(trans('messages.listing_price.week_price')); ?></label>
            <div class="input-addon">
              <span class="input-prefix pay-currency"><?php echo e(@$result->property_price->currency->org_symbol); ?></span>
              <input type="text" data-suggested="" id="price-week" value="<?php echo e(@$result->property_price->weekly_discount); ?>" name="weekly_discount" data-saving="long_price" class="money-input form-control">
            </div>
          </div>
          <div class="col-md-8">
            <label for="listing_price_native" class="label-large"><?php echo e(trans('messages.listing_price.monthly_price')); ?></label>
            <div class="input-addon">
              <span class="input-prefix pay-currency"><?php echo e(@$result->property_price->currency->org_symbol); ?></span>
              <input type="text" data-suggested="₹16905" id="price-month" class="money-input  form-control" value="<?php echo e(@$result->property_price->monthly_discount); ?>" name="monthly_discount" data-saving="long_price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <h4><?php echo e(trans('messages.listing_price.additional_price')); ?></h4>
          </div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <label for="listing_cleaning_fee_native_checkbox" class="label-large label-inline">
              <input type="checkbox" data-extras="true" class="pricing_checkbox" data-rel="cleaning" <?php echo e((@$result->property_price->original_cleaning_fee == 0)?'':'checked="checked"'); ?>>&nbsp
             <?php echo e(trans('messages.listing_price.cleaning_fee')); ?> 
            </label>
          </div>
          <div id="cleaning" class="<?php echo e((@$result->property_price->original_cleaning_fee == 0)?'display-off':''); ?>">
            <div class="col-md-12">
              <div class="col-md-4 l-pad-none">
                <div class="input-addon">
                  <span class="input-prefix pay-currency"><?php echo e(@$result->property_price->currency->org_symbol); ?></span>
                  <input type="text" data-extras="true" id="price-cleaning" value="<?php echo e(@$result->property_price->original_cleaning_fee); ?>" name="cleaning_fee" class="money-input" data-saving="additional-saving">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <label for="listing_cleaning_fee_native_checkbox" class="label-large label-inline">
              <input type="checkbox" class="pricing_checkbox" data-rel="additional-guests" <?php echo e(($result->property_price->original_guest_fee == 0)?'':'checked="checked"'); ?>>&nbsp
             <?php echo e(trans('messages.listing_price.additional_guest')); ?> 
            </label>
          </div>
          <div id="additional-guests" class="<?php echo e((@$result->property_price->original_guest_fee == 0)?'display-off':''); ?>">
            <div class="col-md-12">
              <div class="col-md-4 l-pad-none">
                <div class="input-addon">
                  <span class="input-prefix pay-currency"><?php echo e(@$result->property_price->currency->org_symbol); ?></span>
                  <input type="text" data-extras="true" value="<?php echo e(@$result->property_price->original_guest_fee); ?>" id="price-extra_person" name="guest_fee" class="money-input" data-saving="additional-saving">
                </div>
              </div>
              <div class="col-md-4 txt-right">
                <label class="label-large"><?php echo e(trans('messages.listing_price.guest_after')); ?></label>
              </div>
              <div class="col-md-4">
                <select id="price-select-guests_included" name="guest_after" data-saving="additional-saving" class="form-control">
                  <?php for($i=1;$i<=16;$i++): ?>
                      <option value="<?php echo e($i); ?>" <?php echo e((@$result->property_price->guest_after == $i) ? 'selected' : ''); ?>>
                      <?php echo e(($i == '16') ? $i.'+' : $i); ?>

                      </option>
                  <?php endfor; ?> 
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <label for="listing_cleaning_fee_native_checkbox" class="label-large label-inline">
              <input type="checkbox" class="pricing_checkbox" data-rel="security" <?php echo e((@$result->property_price->original_security_fee == 0)?'':'checked="checked"'); ?>>
              &nbsp
             <?php echo e(trans('messages.listing_price.security_deposit')); ?> 
            </label>
          </div>
          <div id="security" class="<?php echo e((@$result->property_price->original_security_fee == 0)?'display-off':''); ?>">
            <div class="col-md-12">
              <div class="col-md-4 l-pad-none">
                <div class="input-addon">
                  <span class="input-prefix pay-currency"><?php echo e(@$result->property_price->currency->org_symbol); ?></span>
                  <input type="text" class="money-input" data-extras="true" value="<?php echo e(@$result->property_price->original_security_fee); ?>" id="price-security" name="security_fee" class="autosubmit-text input-stem input-large" data-saving="additional-saving">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <label for="listing_cleaning_fee_native_checkbox" class="label-large label-inline">
              <input type="checkbox" class="pricing_checkbox" data-rel="weekend" <?php echo e((@$result->property_price->original_weekend_price == 0)?'':'checked="checked"'); ?>> &nbsp
              <?php echo e(trans('messages.listing_price.weekend_price')); ?>

            </label>
          </div>
          <div id="weekend" class="<?php echo e((@$result->property_price->original_weekend_price == 0)?'display-off':''); ?>">
            <div class="col-md-12">
              <div class="col-md-4 l-pad-none">
                <div class="input-addon">
                  <span class="input-prefix pay-currency"><?php echo e(@$result->property_price->currency->org_symbol); ?></span>
                  <input type="text" data-extras="true" value="<?php echo e(@$result->property_price->original_weekend_price); ?>" id="price-weekend" name="weekend_price" class="money-input" data-saving="additional-saving">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-left">
            <a data-prevent-default="" href="<?php echo e(url('admin/listing/'.@$result->id.'/photos')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
          </div>
          <div class="col-md-6 text-right">
            <button type="submit" class="btn btn-large btn-primary next-section-button">
              <?php echo e(trans('messages.listing_basic.next')); ?>

            </button>
          </div>
        </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </section>
  </div>

<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
    $(document).on('change', '.pricing_checkbox', function(){
      if(this.checked){
        var name = $(this).attr('data-rel');
        $('#'+name).show();
      }else{
        var name = $(this).attr('data-rel');
        $('#'+name).hide();
        $('#price-'+name).val(0);
      }
    });
    $(document).on('click', '#show_long_term', function(){
      $('#js-set-long-term-prices').hide();
      $('#long-term-div').show();
    });
    $(document).on('change', '#price-select-currency_code', function(){
      var currency = $(this).val();
      var dataURL = '<?php echo e(url("currency-symbol")); ?>';
      //console.log(currency);
      $.ajax({
        url: dataURL,
        data: {'currency': currency},
        type: 'post',
        async: false,
        dataType: 'json',
        success: function (result) {
          if(result.success == 1)
            $('.pay-currency').html(result.symbol);
        },
        error: function (request, error) {
          // This callback function will trigger on unsuccessful action
          console.log(error);
        }
      });
    });
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>