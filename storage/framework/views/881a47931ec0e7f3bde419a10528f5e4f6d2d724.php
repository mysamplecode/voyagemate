

<?php $__env->startSection('main'); ?>
  <div class="container margin-top40 mb30">
      <?php echo $__env->make('listing.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <form method="post" action="<?php echo e(url('listing/'.$result->id.'/'.$step)); ?>" class='signup-form login-form' accept-charset='UTF-8'>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-8">
              <label class="label-large"><?php echo e(trans('messages.listing_description.listing_name')); ?></label>
              <input type="text" name="name" class="form-control" value="<?php echo e($description->properties->name); ?>" placeholder="" maxlength="35">
              <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <label class="label-large"><?php echo e(trans('messages.listing_description.summary')); ?></label>
              <textarea class="form-control" name="summary" rows="6" placeholder="" maxlength="500" ng-model="summary"><?php echo e($description->summary); ?></textarea>
              <span class="text-danger"><?php echo e($errors->first('summary')); ?></span>
            </div>
          </div>
          <p class="row-space-top-6 not-post-listed">
            <?php echo e(trans('messages.listing_description.add_more')); ?> <a href="<?php echo e(url('listing/'.$result->id.'/details')); ?>" id="js-write-more"><?php echo e(trans('messages.listing_description.detail')); ?></a> <?php echo e(trans('messages.listing_description.detail_data')); ?>.
          </p>
          <div class="row mrg-top-25">
            <div class="col-md-6 text-left">
                <a data-prevent-default="" href="<?php echo e(url('listing/'.$result->id.'/basics')); ?>" class="btn btn-large btn-primary"><?php echo e(trans('messages.listing_description.back')); ?></a>
            </div>
            <div class="col-md-6 text-right">
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