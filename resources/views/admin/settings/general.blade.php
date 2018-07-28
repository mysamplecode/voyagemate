@php 
$form_data = [
		'page_title'=> 'General Setting Form',
		'page_subtitle'=> 'General Setting Page', 
		'form_name' => 'General Setting Form',
		'action' => URL::to('/').'/admin/settings',
		'form_type' => 'file',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => @$result['name']],
      		['type' => 'file', 'class' => 'validate_field', 'label' => 'Logo', 'name' => "photos[logo]", 'value' => '', 'image' => url('public/images/logos/'.$result['logo'])],
      		['type' => 'file', 'class' => 'validate_field', 'label' => 'Favicon', 'name' => "photos[favicon]", 'value' => '', 'image' => url('public/images/logos/'.$result['favicon'])],
      		['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Head Code', 'name' => 'head_code', 'value' => @$result['head_code']],
      		['type' => 'select', 'options' => $currency, 'class' => 'validate_field', 'label' => 'Default Currency', 'name' => 'default_currency', 'value' => @$result['default_currency']],
      		['type' => 'select', 'options' => $language, 'class' => 'validate_field', 'label' => 'Default Language', 'name' => 'default_language', 'value' => @$result['default_language']],
		]
	];
@endphp
@include("admin.common.form.setting", $form_data)