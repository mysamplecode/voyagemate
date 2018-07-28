<?php $__env->startSection('content'); ?>
	<div class="card blue-grey darken-1">
		<div class="card-content white-text">
			<hr>
			<div class="center-align">
				<p class="card-title"><?php echo e(trans('installer.welcome.name')); ?></p>
				<p><em><?php echo e(trans('installer.welcome.version')); ?></em></p>
				<hr>
				<p class="card-title"><?php echo e(trans('installer.welcome.title')); ?></p>
			</div>
			<p><?php echo e(trans('installer.welcome.sub-title')); ?></p>
			<ol>
				<?php for($i = 1; $i < 5; $i++): ?>
					<li><?php echo e(trans('installer.welcome.item' . $i)); ?></li>
				<?php endfor; ?>
			</ol>
			<p><?php echo e(trans('installer.welcome.message')); ?></p>
		</div>
		<div class="card-action">
			<a class="btn waves-effect waves-light" href="<?php echo e(url('install/database')); ?>">
				<?php echo e(trans('installer.welcome.button')); ?>

				<i class="material-icons right">send</i>
			</a>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>