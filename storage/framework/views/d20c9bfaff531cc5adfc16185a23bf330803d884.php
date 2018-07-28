<?php 
$form_data = [
		'page_title'=> 'Amenity Edit Form',
		'page_subtitle'=> 'Edit Amenity', 
		'form_name' => 'Amenity Edit Form',
		'action' => URL::to('/').'/admin/edit_amenities/'.$result->id,
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'title', 'value' => @$result->title],
      		['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => @$result->description],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Symbol', 'name' => 'symbol', 'value' =>@$result->symbol],
      		['type' => 'select', 'options' =>$am, 'class' => 'validate_field', 'label' => 'Type', 'name' => 'type_id', 'value' =>@$result->type_id],
			['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>