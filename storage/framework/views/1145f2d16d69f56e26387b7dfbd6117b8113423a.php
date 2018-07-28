<?php $__env->startSection('main'); ?>
<div class="controls">
	<div class="upload-section">
	    <div class="upload-images">
			<img src="<?php echo e(url('public/images/uploads').'/'.@$result->user_id.'/medium'.'/'.@$result->image); ?>" alt="" class="img-responsive"/>
		</div>
	</div>
	<div class="load-section">
		<form method="post" action="<?php echo e(url('payments/create_booking')); ?>">
			<input name="id" type="hidden" value="<?php echo e(@$result->id); ?>">
			<div class="panel-body mtop20">
				<div class="sell"><h3><?php echo e(trans('messages.utility.price')); ?></h3></div>
				<div class="sell-btn"><h3><?php echo e(Session::get('symbol').' '.@$result->price); ?> </h3></div>
			</div>
			<div class="dot mtop20">
				<div class="form-group ">
					<label for="exampleInputEmail1"><?php echo e(trans('messages.utility.payment_gateway')); ?></label>
					<select name="payment_method" class="form-control">
						<?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($payment_method->id); ?>"><?php echo e($payment_method->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
			</div>
			<hr>
			<div class="clearfix"></div>
			<hr>
			<div class="finish-b">
				<button type="submit" class="btn btn-lg btn-pinkbg"><?php echo e(trans('messages.utility.buy')); ?></button>
			</div>
		</form>
	</div>
</div><!--controls end-->	
<div class="container">
	<div class="clearfix"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>