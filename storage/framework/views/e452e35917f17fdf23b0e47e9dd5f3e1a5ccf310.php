<?php $__env->startSection('content'); ?>
	<div class="card red lighten-1">
		<div class="card-content white-text">
			<p class="card-title center-align"><?php echo e(trans('installer.database-error.title')); ?></p>
			<hr>
			<p><?php echo e(trans('installer.database-error.sub-title')); ?></p>
			<ol>
				<?php for($i = 1; $i < 4; $i++): ?>
					<li><?php echo e(trans('installer.database-error.item' . $i)); ?></li>
				<?php endfor; ?>
			</ol>
			<p><?php echo e(trans('installer.database-error.message')); ?></p>
			<hr>
			<p class="card-title"><b>Error Description:</b></p>
			<p><?php echo e($error_message); ?></p>
		</div>
		<div class="card-action">
			<a class="btn waves-effect waves-light" href="<?php echo e(url('install/database')); ?>">
				<?php echo e(trans('installer.database-error.button')); ?>

			</a>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>