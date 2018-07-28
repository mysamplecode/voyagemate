<?php $__env->startSection('main'); ?>
  <div class="content-wrapper">
         <!-- Main content -->
  <section class="content-header">
          <h1>
          Booking
          <small>Booking</small>
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
          <div class="box box-info">
          <div class="box-body">
          <form method="post" action="<?php echo e(url('admin/listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
              <div class="row">
                  <div class="col-md-12">
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
              <br>
              <div class="col-md-12">
                <div class="col-md-10 col-sm-6 col-xs-6 l-pad-none text-left">
                  <a data-prevent-default="" href="<?php echo e(url('admin/listing/'.$result->id.'/pricing')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 text-right">
                  <button type="submit" class="btn btn-large btn-primary next-section-button">Complete
                  </button>
                </div>
              </div>
          </form>
      </div>
      </div>
      </div>
      </div>
       </section>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>