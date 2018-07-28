@php
$form_data = [
		'page_title'=> 'Page Edit Form',
		'page_subtitle'=> 'Edit Page', 
		'form_name' => 'Page Edit Form',
		'action' => URL::to('/').'/admin/edit_page/'.$result->id,
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => @$result->name],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Url', 'name' => 'url', 'value' => @$result->url],
      		['type' => 'editor','class' => 'validate_field', 'label' => 'Content', 'name' => 'content', 'value' => @$result->content],
			['type' => 'select', 'options' => ['first' => 'First Column', 'second' => 'Second Column'], 'class' => 'validate_field', 'label' => 'Position', 'name' => 'position', 'value' => @$result->position],
			['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],
		]
	];
@endphp
@include("admin.common.form.primary", $form_data)