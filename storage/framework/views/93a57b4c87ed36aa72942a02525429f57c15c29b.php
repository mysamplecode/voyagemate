<?php 
$form_data = [
		'page_title'=> 'Category Edit Form',
		'page_subtitle'=> 'Edit Category', 
		'form_name' => 'Category Edit Form',
		'action' => URL::to('/').'/admin/edit_category/'.$result->id,
		'form_type' => 'file',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => @$result->name],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Slug', 'name' => 'slug', 'value' => @$result->slug],
      		['type' => 'file', 'class' => 'validate_field', 'label' => 'Thumbnail (Optional)', 'name' => 'image', 'value' => ''],
      		['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>