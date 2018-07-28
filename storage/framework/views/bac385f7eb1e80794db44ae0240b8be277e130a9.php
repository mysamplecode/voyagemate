<?php $__env->startSection('main'); ?>
    <div class="container">
	  <div class="setcover">
	   <div class="form_styling">
	  	<div class="form_headingBg">
		    <ul class="nav nav-pills">
				<li ><a href="<?php echo e(url('settings')); ?>"><?php echo e(trans('messages.utility.profile')); ?></a></li>
				<li><a class="active2" href="javascript:void(0)"><?php echo e(trans('messages.utility.account')); ?></a></li>
				<li><a href="<?php echo e(url('settings/payment')); ?>"><?php echo e(trans('messages.utility.payments')); ?></a></li>
			</ul>
		 </div>
		 <div class="form_filler">
		    <form method="post" action="<?php echo e(url('settings/account')); ?>">
			  <div class="form-group">
				<label for="email"><?php echo e(trans('messages.account.email')); ?></label>
				<input type="text" name="email" class="form-control" id="email" value="<?php echo e(\Auth::user()->email); ?>">
				<span class="text-danger"><?php echo e($errors->first('email')); ?></span>
			  </div>
			  <h4><?php echo e(trans('messages.account.not_change_leave_empty')); ?></h4>
			  <div class="form-group">
				<label for="pwd"><?php echo e(trans('messages.account.previous_password')); ?></label>
				<input type="password" name="previous_password" id="previous_password" class="form-control">
			  </div>
			  <div class="form-group">
				<label for="pwd"><?php echo e(trans('messages.login.password')); ?></label>
				<input type="password" name="password" id="password" class="form-control">
			  	<span class="text-danger"><?php echo e($errors->first('password')); ?></span>
			  </div>
			  <div class="form-group">
				<label for="email"><?php echo e(trans('messages.login.confirm_password')); ?></label>
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
			  	<span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
			  </div>
			<!--  <div class="form-group">
				<label for="email">Copyright name</label><span class="grayColor"> &nbsp;This will be added to all your photos</span>
				<input type="email" class="form-control" id="email">
			  </div>
			  <div class="form-group">
				<label for="email">Your unique Photocrowd web address</label><span class="grayColor"> &nbsp;The url of your Photocrowd profile</span>
				<input type="email" class="form-control" id="email">
			  </div>-->
			  <button type="submit" class="btn btn-pinkbg"><?php echo e(trans('messages.utility.save_changes')); ?></button>
			</form>
		 </div>
		</div>
	  </div><!--setcover end-->
	  <div class="pinkColor mtop20 mb30 text-center h4"><a href="<?php echo e(url('profile')); ?>"><?php echo e(trans('messages.utility.view_profile')); ?></a></div>
	</div>
 	<div class="clearfix"></div>
 <?php $__env->startPush('scripts'); ?>
 <script type="text/javascript">	
	$(window).resize(function () 
	{
		if( $(window).width() <=767 ){
			$('.mx-pod').css('margin-left','6px');
		}else{
			$('.mx-pod').css('margin-left','0px');
		}
	});
 </script>
 <?php $__env->stopPush(); ?>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>