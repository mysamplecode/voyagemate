

<?php $__env->startSection('main'); ?>
            
    <div class="container margin-top30 mb30">
      <div class="error_width">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="error_word"><?php echo e(trans('messages.error.oops')); ?></div>
            <div class="clearfix"></div>
            <div class="error_small_word"><?php echo e(trans('messages.error.error_data_1')); ?><br><?php echo e(trans('messages.error.error_data_2')); ?></div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="img_cen_ter"><img src="<?php echo e(url('public/front/img/error-page.png')); ?>" class="img-responsive"></div>
        </div>
      </div>
    </div>  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>