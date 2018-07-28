<?php $__env->startSection('main'); ?>
  <div class="container margin-top30">
    <div class="col-md-4 col-center">
      <div class="panel panel-default">
        <div class="panel-body h4">Reset Your Password</div>
        <div class="panel">
          <div class="panel-body">
            <form method="post" action="<?php echo e(url('users/reset_password')); ?>" id='password-form' class='signup-form login-form' accept-charset='UTF-8'>  
              <input id="id" name="id" type="hidden" value="<?php echo e($result->id); ?>">
              <input id="token" name="token" type="hidden" value="<?php echo e($token); ?>">
              <div class="col-sm-12">
                <input type="password" class="form-control" id='new_password' name="password" placeholder = "New Password">
                <?php if($errors->has('password')): ?> <p class="error-tag"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
              </div>
              <div class="col-sm-12">
                <input type="password" class="form-control" id='password_confirmation' name="password_confirmation" placeholder = "Confirm Password">
                <?php if($errors->has('password_confirmation')): ?> <p class="error-tag"><?php echo e($errors->first('password_confirmation')); ?></p> <?php endif; ?>
              </div>

              <div class="col-sm-12 mrg-top-25">
                <button class="btn ex-btn" type="submit">
                  Reset Password
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