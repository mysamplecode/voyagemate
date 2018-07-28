

<?php $__env->startSection('main'); ?>
  <div class="container margin-top30">
    <div class="col-md-4 col-center">
      <div class="panel panel-default">
        <div class="panel-body h4"><?php echo e(trans('messages.forgot_pass.reset_pass')); ?></div>
        <div class="panel">
          <div class="panel-body">
            <form method="post" action="<?php echo e(url('forgot_password')); ?>" class='signup-form login-form' accept-charset='UTF-8'>  
              <div class="col-sm-12">
                <p><?php echo e(trans('messages.forgot_pass.please_enter_email')); ?></p>
              </div>
              <div class="col-sm-12">
                <?php if($errors->has('email')): ?> <p class="error-tag"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
                <input type="text" class="form-control" name="email" placeholder = "Email">
              </div>
              
              <div class="col-sm-12 mrg-top-25">
                <button class="btn ex-btn" type="submit">
                  <?php echo e(trans('messages.forgot_pass.reset_link')); ?>

                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>