@php 
$form_data = [
    'page_title'=> 'Add Staritng City',
    'page_subtitle'=> '', 
    'form_name' => 'Add Staritng City Form',
    'action' => URL::to('/').'/admin/settings/add_starting_cities',
    'form_type' => 'file',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => ' Staring City Name', 'name' => 'name', 'value' => ''],
      ['type' => 'file', 'class' => 'validate_field', 'label' => 'Image', 'name' => 'image', 'value' => ''],
      ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],


    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)