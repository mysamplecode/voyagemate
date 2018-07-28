<?php $__env->startSection('main'); ?>
<div class="container margin-top30">
  <form class="<?php echo e((Auth::guard('users')->user()->password) ? 'show' : 'hide'); ?>" method='post' action="<?php echo e(url('users/security')); ?>">
    <input id="id" name="id" type="hidden" value="33661974">
    <input id="redirect_on_error" name="redirect_on_error" type="hidden" value="/users/security">
    <input id="user_password_ok" name="user[password_ok]" type="hidden" value="true">
    <div class="col-md-3">
      <div class="panel panel-default">
          <div class="panel-footer">
            <div class="panel">
              <?php echo $__env->make('common.sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
          </div>
      </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-body h5">
            <?php echo e(trans('messages.account_security.change_password')); ?>

          </div>
          <div class="panel-footer">
            <div class="panel">
              <div class="panel-body">
                <div class="row">
                  <label class="text-right col-sm-3" for="user_first_name">
                    <?php echo e(trans('messages.account_security.old_password')); ?>

                  </label>
                  <div class="col-sm-9">
                    <input class="form-control" id="old_password" name="old_password" type="password">
                    <?php if($errors->has('old_password')): ?> <p class="help-block text-danger"><?php echo e($errors->first('old_password')); ?></p> <?php endif; ?>
                  </div>
                </div>

                <div class="row">
                  <label class="text-right col-sm-3" for="user_first_name">
                    <?php echo e(trans('messages.account_security.new_password')); ?>

                  </label>
                  <div class="col-sm-9">
                    <input class="form-control" data-hook="new_password" id="new_password" name="new_password" size="30" type="password">
                    <?php if($errors->has('new_password')): ?> <p class="help-block text-danger"><?php echo e($errors->first('new_password')); ?></p> <?php endif; ?>
                  </div>
                </div>

                <div class="row">
                  <label class="text-right col-sm-3" for="user_first_name">
                    <?php echo e(trans('messages.account_security.confirm_pass')); ?>

                  </label>
                  <div class="col-sm-9">
                    <input class="form-control" id="user_password_confirmation" name="password_confirmation" size="30" type="password">
                    <?php if($errors->has('password_confirmation')): ?> <p class="help-block text-danger"><?php echo e($errors->first('password_confirmation')); ?></p> <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <button type="submit" class="btn ex-btn btn-large">
            <?php echo e(trans('messages.account_security.update_pass')); ?>

          </button>
        </div>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>