<?php $__env->startSection('main'); ?>
<div class="controls">
	<div class="upload-section" style="width:100%;">
	    <div style="width:60%;margin:0 auto;">
	    	<div class="upload-images">
				<img src="<?php echo e(url('public/images/uploads').'/'.@$result->user_id.'/medium'.'/'.@$result->image); ?>" alt="" class="img-responsive"/>
			</div>
			<div style="text-align:center;">
				<form method="post" action="<?php echo e(url('photos/download').'/'.$result->id); ?>">
					<input name="download" style="width:60%;" type="submit" class="btn btn-pinkbg" value="<?php echo e(trans('messages.utility.download')); ?>">
				</form>
			</div>
	    </div>
	</div>
</div><!--controls end-->	
<div class="container">
	<div class="clearfix"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>