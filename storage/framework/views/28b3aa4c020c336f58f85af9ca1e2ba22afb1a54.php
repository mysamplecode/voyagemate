<?php $__env->startSection('content'); ?>
	<div class="card red lighten-1">
		<div class="card-content white-text">
			<p class="card-title center-align"><?php echo e(trans('installer.permission-error.title')); ?></p>
			<hr>
			<p><?php echo e(trans('installer.permission-error.sub-title')); ?> <strong> <?php echo e($permissionCheck . '.'); ?> </strong></p>
			<br>
			<p><em><?php echo e(trans('installer.permission-error.message')); ?><em></p>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>