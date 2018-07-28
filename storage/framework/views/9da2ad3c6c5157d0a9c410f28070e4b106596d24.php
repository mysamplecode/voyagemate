<?php 
$form_data = [
		'page_title'=> 'Category Edit Form',
		'page_subtitle'=> 'Edit Category', 
		'form_name' => 'Category Edit Form',
		'action' => URL::to('/').'/admin/edit_category/'.$result->id,
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => @$result->name],
      		['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>