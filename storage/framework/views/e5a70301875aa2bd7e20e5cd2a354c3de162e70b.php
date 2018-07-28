<?php  
	$breadcrumb = Route::current()->uri();
	$breadcrumbs = array(
						'admin/dashboard' => array( 'admin/dashboard' => 'Dashboard' ),
						'admin/profile' => array( 'admin/profile' => 'Profile' ),
						'admin/users' => array( 'admin/users' => 'Users' ),
						'admin/add_user' => array( 'admin/users' => 'Users', 'admin/add_user' => 'Add User'),
						'admin/edit_user' => array( 'admin/users' => 'Users', 'admin/edit_user' => 'Edit User'),
					);
		
	$breadcrumb = isset($breadcrumbs[$breadcrumb])? $breadcrumbs[$breadcrumb]:'';
 ?>
<ol class="breadcrumb">
	<li><a href="<?php echo e(URL::to('admin/dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<?php if(is_array($breadcrumb)): ?>
		<?php  $i=1; $cnt = count($breadcrumb);  ?>
		<?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($cnt==$i): ?>
				<li class="active"><?php echo e($value); ?></li>
			<?php else: ?>
				<li><a href="<?php echo e(URL::to($key)); ?>"><?php echo e($value); ?></a></li>
			<?php endif; ?>
			<?php  $i++;  ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
</ol>