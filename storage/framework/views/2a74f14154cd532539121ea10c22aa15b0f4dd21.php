<?php $__env->startSection('main'); ?>
  <div class="container margin-top40 mb30">
      <?php echo $__env->make('listing.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <form method="post" action="<?php echo e(url('listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
        <div class="col-md-9">
          <div class="row">
              <h3><?php echo e(trans('messages.listing_book.booking_title')); ?></h3>
              <p class="text-muted"><?php echo e(trans('messages.listing_book.booking_data')); ?>.</p>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="col-md-12 min-height-div">
                <label class="label-large"><?php echo e(trans('messages.listing_book.booking_type')); ?></label>
                <select name="booking_type" id="select-booking_type" class="form-control">
                    <option value="request" <?php echo e(($result->booking_type == 'request') ? 'selected' : ''); ?>><?php echo e(trans('messages.listing_book.review_request')); ?></option>
                    <option value="instant" <?php echo e(($result->booking_type == 'instant') ? 'selected' : ''); ?>><?php echo e(trans('messages.listing_book.guest_instant')); ?></option>
                </select>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="col-md-12 row mrg-top-25 l-pad-none">
            <div class="col-md-10 col-sm-6 col-xs-6 l-pad-none text-left">
              <a data-prevent-default="" href="<?php echo e(url('listing/'.$result->id.'/pricing')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 text-right">
              <button type="submit" class="btn btn-large btn-primary next-section-button">
                <?php echo e(trans('messages.listing_basic.next')); ?>

              </button>
            </div>
          </div>
        </div>
      </form>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>