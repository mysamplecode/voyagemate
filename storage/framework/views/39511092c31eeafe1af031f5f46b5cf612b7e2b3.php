<?php $__env->startSection('main'); ?>
    <div class="container" style="min-height:380px;">
	  <div class="setcover">
	   <div class="form_styling">
	  	<div class="form_headingBg">
		    <ul class="nav nav-pills">
				<li ><a href="<?php echo e(url('settings')); ?>"><?php echo e(trans('messages.utility.profile')); ?></a></li>
				<!--<li><a href="">Social</a></li>-->
				<li><a href="<?php echo e(url('settings/account')); ?>"><?php echo e(trans('messages.utility.account')); ?></a></li>
				<li><a class="active2" href="javascript:void(0)"><?php echo e(trans('messages.utility.payments')); ?></a></li>
				<!--<li><a href="">Discounts</a></li>
				<li><a href="">Emails</a></li>-->
			</ul>
		 </div>
		 <div class="form_filler">
		    <form method="post" action="<?php echo e(url('settings/payment')); ?>">
			   <div class="form-group">
				<label for="email"><?php echo e(trans('messages.utility.paypal_email')); ?></label>
				<input type="text" name="paypal_email" value="<?php echo e(@$details['paypal_email']); ?>" class="form-control" id="email">
				<span class="text-danger"><?php echo e($errors->first('paypal_email')); ?></span>
			  </div>
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