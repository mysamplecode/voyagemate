@php 
$form_data = [
		'page_title'=> 'Page Add Form',
		'page_subtitle'=> 'Add Page', 
		'form_name' => 'Page Add Form',
		'action' => URL::to('/').'/admin/add_page',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => ''],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Url', 'name' => 'url', 'value' => ''],
      		['type' => 'editor', 'class' => 'validate_field', 'label' => 'Content', 'name' => 'content', 'value' => ''],
      		['type' => 'select', 'options' => ['first' => 'First Column', 'second' => 'Second Column'], 'class' => 'validate_field', 'label' => 'Position', 'name' => 'position', 'value' => ''],
			['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],
		]
	];
@endphp
@include("admin.common.form.primary", $form_data)