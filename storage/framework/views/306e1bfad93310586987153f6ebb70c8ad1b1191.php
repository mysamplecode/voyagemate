<?php  
$form_data = [
		'page_title'=> 'Member Add Form',
		'page_subtitle'=> 'Add Member', 
		'form_name' => 'Member Add Form',
		'action' => URL::to('/').'/admin/add_member',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => ''],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Email', 'name' => 'email', 'value' => ''],
			['type' => 'select', 'options' => $country_ar, 'class' => 'validate_field', 'label' => 'Country', 'name' => 'country', 'value' => ''],
			['type' => 'password', 'class' => 'validate_field', 'label' => 'Password', 'name' => 'password'],
			['type' => 'password', 'class' => 'validate_field', 'label' => 'Retype your password', 'name' => 'password_confirmation'],
			['type' => 'select', 'options' => ['User' => 'User', 'Admin' => 'Admin'], 'class' => 'validate_field', 'label' => 'Type', 'name' => 'type'],
			['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status'],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>