<?php $__env->startSection('main'); ?>
    <div class="container">
	  <div class="setcover">
	   <div class="form_styling">
	  	<div class="form_headingBg">
		    <ul class="nav nav-pills">
				<li ><a class="active2" href="javascript:void(0)"><?php echo e(trans('messages.utility.profile')); ?></a></li>
				<!--<li><a href="">Social</a></li>-->
				<li><a href="<?php echo e(url('settings/account')); ?>"><?php echo e(trans('messages.utility.account')); ?></a></li>
				<li><a href="<?php echo e(url('settings/payment')); ?>"><?php echo e(trans('messages.utility.payments')); ?></a></li>
				<!--<li><a href="">Discounts</a></li>
				<li><a href="">Emails</a></li>-->
			</ul>
		 </div>
		 <div class="form_filler">
		    <form method="post" action="<?php echo e(url('settings')); ?>">
			  <div class="form-group">
				<label for="email"><?php echo e(trans('messages.settings.name')); ?></label>
				<input type="text" name="name" class="form-control" id="name" value="<?php echo e(Auth::user()->name); ?>">
				<span class="text-danger"><?php echo e($errors->first('name')); ?></span>
			  </div>
			  <div class="form-group">
				<label for="pwd"><?php echo e(trans('messages.settings.about_you')); ?></label>
				<textarea name="about_you" id="about_you" class="form-control" rows="3"><?php echo e(@$details['about_you']); ?></textarea>
			  </div>
			  <div class="form-group">
				<label for="email"><?php echo e(trans('messages.settings.your_location')); ?></label>
				<input type="text" name="location" id="location" class="form-control" value="<?php echo e(@$details['location']); ?>">
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