<?php  
$form_data = [
		'page_title'=> 'Category Add Form',
		'page_subtitle'=> 'Add Category', 
		'form_name' => 'Category Add Form',
		'action' => URL::to('/').'/admin/add_category',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => ''],
      		['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>