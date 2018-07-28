<?php $__env->startSection('style'); ?>
	<style>
		input { margin-bottom: 2px !important };
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card blue-grey darken-1 white-text">
		 <form method="post" action="<?php echo e(url('install/register')); ?>">	
		    <div class="card-content">
				<p class="card-title center-align"><?php echo e(trans('installer.register.title')); ?></p>
				<p class="center-align"><?php echo e(trans('installer.register.sub-title')); ?></p>
				<hr>
				<?php echo csrf_field(); ?>

				<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="input-field">
						<input type="<?php echo e($value); ?>" id="<?php echo e($key); ?>" name="<?php echo e($key); ?>" value="<?php echo e(old($key)); ?>">
						<label for="<?php echo e($key); ?>">
							<?php echo e(trans('installer.register.base-label') . trans('installer.register-fields.' . $key)); ?>

						</label>
 						<?php if($errors->has($key)): ?>
                            <small class="red-text text-lighten-2"><?php echo e($errors->first($key)); ?></small>
                       	<?php endif; ?>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="card-action">
				<p><em><?php echo e(trans('installer.register.message')); ?></em></p>
				<button class="btn waves-effect waves-light" type="submit">
					<?php echo e(trans('installer.register.button')); ?>

					<i class="material-icons right">send</i>
				</button>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>