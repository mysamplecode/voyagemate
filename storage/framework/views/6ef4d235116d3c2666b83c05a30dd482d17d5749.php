<?php $__env->startSection('content'); ?>
	<div class="card blue-grey darken-1">
		<div class="card-content white-text">
			<p class="card-title center-align"><?php echo e(trans('installer.end.title')); ?></p>
			<div class="card-action center-align">
				<a class="btn waves-effect waves-light" href="<?php echo e(url(config('installer.login-url'))); ?>">
					<?php echo e(trans('installer.end.button')); ?>

				</a>
			</div>
			<div class="card-action center-align">
				<a class="btn waves-effect waves-light" href="<?php echo e(url(config('installer.front-end-url'))); ?>">
					<?php echo e(trans('installer.end.front_button')); ?>

				</a>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>