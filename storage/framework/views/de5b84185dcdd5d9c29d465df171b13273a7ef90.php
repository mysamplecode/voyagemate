<?php $__env->startSection('main'); ?>
  <div class="container margin-top30">
    <div class="col-md-4 col-center">
      <div class="panel panel-default">
        <div class="panel">
          <div class="panel-body">
            <a href="<?php echo e($facebook_url); ?>" class="btn btn-facebook">
              <div class="responsive-content"><i class="fa fa-facebook pad-r-3"></i> <?php echo e(trans('messages.login.signup_with')); ?> Facebook</div>
            </a>
            <!--<div class="clearfix"></div>-->
            <a href="<?php echo e(URL::to('googleLogin')); ?>" class="btn btn-google">
              <div class="responsive-content">
                <i class="fa fa-google-plus pad-r-4"></i>
                <?php echo e(trans('messages.login.signup_with')); ?> Google
              </div>
            </a>
            <div class="col-md-12 cls-or" style="margin-top:10px;">
              <label>or</label>
            </div>
            <?php echo Form::open(['action' => 'UserController@authenticate', 'class' => 'signup-form login-form', 'data-action' => 'Signin', 'accept-charset' => 'UTF-8' , 'novalidate' => 'true']); ?>

              <?php echo Form::hidden('from', 'email_login', ['id' => 'from']); ?>

              <div class="col-sm-12">
                <?php if($errors->has('email')): ?> <p class="error-tag"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
                <?php echo Form::text('email', '', ['class' => 'form-control', 'placeholder' => trans('messages.login.email')]); ?>

              </div>
              <div class="col-sm-12">
                <?php if($errors->has('password')): ?> <p class="error-tag"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
                <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => trans('messages.login.password')]); ?>

              </div>
              <div class="col-sm-12">
                <div class="col-sm-6 txt-left l-pad-none">
                  <?php echo Form::checkbox('remember_me', '1', false, ['id' => 'remember_me2', 'class' => 'remember_me']); ?>

                  <?php echo e(trans('messages.login.remember_me')); ?>

                </div>
                <div class="col-sm-6 txt-right r-pad-none">
                  <a href="<?php echo e(URL::to('/')); ?>/forgot_password" class="forgot-password pull-right"><?php echo e(trans('messages.login.forgot_pwd')); ?></a>
                </div>
              </div>
              <div class="col-sm-12 mrg-top-25">
                <?php echo Form::submit(trans('messages.header.login'), ['class' => 'btn ex-btn btn-block btn-large', 'id' => 'user-login-btn']); ?>

              </div>
            <?php echo Form::close(); ?>

              <div class="col-sm-12 mrg-top-25">
                <?php echo e(trans('messages.login.dont_have_account')); ?>

                <a href="<?php echo e(URL::to('/')); ?>/signup_login?" class="link-to-signup-in-login">
                  <?php echo e(trans('messages.header.signup')); ?>

                </a>
              </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>