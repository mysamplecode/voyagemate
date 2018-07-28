<?php $__env->startSection('style'); ?>
	<style>
		.card-panel { display: none; }
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card blue-grey darken-1">
		 <form method="post" action="<?php echo e(url('install/database')); ?>">	
		    <div class="card-content white-text">
				<p class="card-title center-align"><?php echo e(trans('installer.database.title')); ?></p>
				<p class="center-align"><?php echo e(trans('installer.database.sub-title')); ?></p>
				<hr>
				<?php echo csrf_field(); ?>

				<div class="input-field">
					<i class="material-icons prefix">settings</i>
					<input type="text" id="dbname" name="dbname" value="<?php echo e($database); ?>" required>
		        	<label for="dbname"><?php echo e(trans('installer.database.dbname-label')); ?></label>
		        </div>
		        <div class="input-field">
		        	<i class="material-icons prefix">perm_identity</i>
		        	<input type="text" id="username" name="username" value="<?php echo e($username); ?>" required>
		        	<label for="username"><?php echo e(trans('installer.database.username-label')); ?></label>
		        </div>
		        <div class="input-field">
		        	<i class="material-icons prefix">vpn_key</i>
		        	<input type="text" id="password" name="password" value="<?php echo e($password); ?>">
		        	<label for="password"><?php echo e(trans('installer.database.password-label')); ?></label>
		        </div>
		        <div class="input-field">
		        	<i class="material-icons prefix">language</i>
		        	<input type="text" id="host" name="host" value="<?php echo e($host); ?>" required>
		        	<label for="host"><?php echo e(trans('installer.database.host-label')); ?></label>
		        </div>
			</div>
			<div class="card-action">
				<button class="btn waves-effect waves-light" type="submit">
					<?php echo e(trans('installer.database.button')); ?>

					<i class="material-icons right">send</i>
				</button>
			</div>
		</form>				
	</div>	
	<div class="card-panel teal blue-grey darken-1">
		<div class="card-content white-text">
			<?php echo e(trans('installer.database.wait')); ?>

			<br>
			<div class="progress">
				<div class="indeterminate"></div>
			</div>
		</div>
	</div>	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
		$(function(){
			$(document).on('submit', 'form', function(e) {  
				$('.card').hide();
				$('.card-panel').show();
			});
		})		
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>