<?php $__env->startSection('main'); ?>
  <div class="container margin-top30">
    <div class="col-md-4 col-center">
      <div class="panel panel-default">
        <div class="panel">
          <div class="panel-body">
            <a href="<?php echo e(@$facebook_url); ?>" class="btn btn-facebook">
              <div class="responsive-content"><i class="fa fa-facebook pad-r-3"></i><?php echo e(trans('messages.sign_up.sign_up_with_facebook')); ?></div>
            </a>
            <!--<div class="clearfix"></div>-->
            <a href="<?php echo e(URL::to('googleLogin')); ?>" class="btn btn-google">
              <div class="responsive-content">
                <i class="fa fa-google-plus pad-r-4"></i>
                <?php echo e(trans('messages.sign_up.sign_up_with_google')); ?>

              </div>
            </a>
            
            <div class="col-md-12 cls-or" style="margin-top:10px;">
              <label><?php echo e(trans('messages.login.or')); ?></label>
            </div>
              <form method="post" action="<?php echo e(url('authenticate')); ?>" class='signup-form login-form' accept-charset='UTF-8'>  
                <div class="col-sm-12">
                  <?php if($errors->has('email')): ?> <p class="error-tag"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
                  <input type="text" class="form-control" name="email" placeholder = "<?php echo e(trans('messages.login.email')); ?>">
                </div>
                <div class="col-sm-12">
                  <?php if($errors->has('password')): ?> <p class="error-tag"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
                  <input type="password" class="form-control" name="password" placeholder = "<?php echo e(trans('messages.login.password')); ?>">
                </div>
                <div class="col-sm-12">
                  <div class="col-sm-6 txt-left l-pad-none">
                    <input type="checkbox" class='remember_me' id="remember_me2" name="remember_me" value="1">
                     <?php echo e(trans('messages.login.remember_me')); ?>

                  </div>
                  <div class="col-sm-6 txt-right r-pad-none">
                    <a href="<?php echo e(URL::to('/')); ?>/forgot_password" class="forgot-password pull-right"><?php echo e(trans('messages.login.forgot_pwd')); ?></a>
                  </div>
                </div>
              <div class="col-sm-12 mrg-top-25">
                <input type="submit" class="btn ex-btn btn-block btn-large" value="<?php echo e(trans('messages.login.login')); ?>" id='user-login-btn'>
              </div>
            </form>
              <div class="col-sm-12 mrg-top-25">
               <?php echo e(trans('messages.login.do_not_have_an_account')); ?> 
                <a href="<?php echo e(URL::to('/')); ?>/signup" class="link-to-signup-in-login">
                  <?php echo e(trans('messages.sign_up.sign_up')); ?>

                </a>
              </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>