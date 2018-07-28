@php 
$form_data = [
		'page_title'=> 'Amenitie Add Form',
		'page_subtitle'=> 'Add Amenitie', 
		'form_name' => 'Amenitie Add Form',
		'action' => URL::to('/').'/admin/add_amenities',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'title', 'value' => ''],
			['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => ''],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Symbol', 'name' => 'symbol', 'value' => ''],
      		['type' => 'select', 'options' =>$am, 'class' => 'validate_field', 'label' => 'Type', 'name' => 'type_id', 'value' => ''],
			['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],
		]
	];
@endphp
@include("admin.common.form.primary", $form_data)