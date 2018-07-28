

<?php $__env->startSection('main'); ?>
  <div class="container margin-top30">
    <div class="col-md-4 col-center">
      <div class="panel panel-default">
        <div class="panel">
          <div class="panel-body">
            <div class="row col-center">
              
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
             
              <div class="col-md-12 cls-or">
                <label><?php echo e(trans('messages.login.or')); ?></label>
              </div>
            </div>
            
            <form method="post" action="<?php echo e(url('create')); ?>" class='signup-form login-form' accept-charset='UTF-8'>    
              <div class="row">
                <input type="hidden" name='email_signup' id='form'>
                <div class="col-sm-12">
                  <?php if($errors->has('first_name')): ?> <p class="error-tag"><?php echo e($errors->first('first_name')); ?></p> <?php endif; ?>
                  <input type="text" class='form-control' name='first_name' id='first_name' placeholder='<?php echo e(trans('messages.sign_up.first_name')); ?>'>
                </div>
                <div class="col-sm-12">
                  <?php if($errors->has('last_name')): ?> <p class="error-tag"><?php echo e($errors->first('last_name')); ?></p> <?php endif; ?>
                  <input type="text" class='form-control' name='last_name' id='last_name' placeholder='<?php echo e(trans('messages.sign_up.last_name')); ?>'>
                </div>
                <div class="col-sm-12">
                  <?php if($errors->has('email')): ?> <p class="error-tag"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
                  <input type="text" class='form-control' name='email' id='email' placeholder='<?php echo e(trans('messages.login.email')); ?>'>
                </div>
                <div class="col-sm-12">
                  <?php if($errors->has('password')): ?> <p class="error-tag"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
                  <input type="password" class='form-control' name='password' id='password' placeholder='<?php echo e(trans('messages.login.password')); ?>'>
                </div>
                <div class="col-sm-12">
                  <label class="l-pad-none"><?php echo e(trans('messages.sign_up.birth_day')); ?></label>
                </div>
                <div class="col-sm-12">
                  <?php if($errors->has('birthday_month') || $errors->has('birthday_day') || $errors->has('birthday_year')): ?> <p class="error-tag"><?php echo e($errors->has('birthday_month') ? $errors->first('birthday_month') : ($errors->has('birthday_day')) ? $errors->first('birthday_day') : ($errors->has('birthday_year')) ? $errors->first('birthday_year') : ''); ?></p> <?php endif; ?>
                </div>
                <div class="col-sm-12">
                  <div class="col-sm-4 l-pad-none r-pad-none">
                    <select name='birthday_month' class='form-control' id='user_birthday_month'>
                      <option value=''><?php echo e(trans('messages.sign_up.month')); ?></option>
                      <?php for($m=1; $m<=12; ++$m): ?>
                        <option value="<?php echo e($m); ?>"><?php echo e(date('F', mktime(0, 0, 0, $m, 1))); ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-sm-4 l-pad-none r-pad-none">
                    <select name='birthday_day' class='form-control' id='user_birthday_day'>
                      <option value=''><?php echo e(trans('messages.sign_up.day')); ?></option>
                      <?php for($m=1; $m<=31; ++$m): ?>
                        <option value="<?php echo e($m); ?>"><?php echo e($m); ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-sm-4 l-pad-none r-pad-none">
                    <select name='birthday_year' class='form-control' id='user_birthday_year'>
                      <option value=''><?php echo e(trans('messages.sign_up.year')); ?></option>
                      <?php for($m=date('Y'); $m > date('Y')-100; $m--): ?>
                        <option value="<?php echo e($m); ?>"><?php echo e($m); ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-sm-12 pad-t-5">
                  <input type='submit' value='<?php echo e(trans('messages.sign_up.sign_up')); ?>' class='btn ex-btn btn-block btn-large'>
                </div>
              </div>
            </form>

            <div class="col-sm-12 mrg-top-25">
              <?php echo e(trans('messages.sign_up.already')); ?> <?php echo e($site_name); ?> <?php echo e(trans('messages.sign_up.member')); ?>?
              <a href="<?php echo e(URL::to('/')); ?>/login?" class="modal-link link-to-login-in-signup" data-modal-href="/login_modal?" data-modal-type="login">
                <?php echo e(trans('messages.sign_up.login')); ?>

            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>