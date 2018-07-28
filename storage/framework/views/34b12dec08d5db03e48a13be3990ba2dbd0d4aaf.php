<?php 
$form_data = [
		'page_title'=> 'Profile Edit Form',
		'page_subtitle'=> 'Edit your profile', 
		'form_name' => 'Profile Edit Form',
		'action' => URL::to('/').'/admin/profile',
		'form_type' => 'file',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => @$result->username],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Email', 'name' => 'email', 'value' => @$result->email, 'readonly' => 'true'],
      		['type' => 'password', 'class' => '', 'label' => 'Password', 'name' => 'password', 'value' => '', 'hint' => 'Enter new password only. Leave blank to use existing password.'],
      		['type' => 'password', 'class' => '', 'label' => 'Password Retype', 'name' => 'password_confirmation', 'value' => '', 'hint' => 'Enter new password only. Leave blank to use existing password.'],
			['type' => 'file', 'class' => '', 'label' => 'Photo', 'name' => 'profile_pic', 'value' => ''],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>