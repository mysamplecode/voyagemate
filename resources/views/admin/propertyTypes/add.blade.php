@php 
$form_data = [
    'page_title'=> 'Add Property Type',
    'page_subtitle'=> '', 
    'form_name' => 'Add Property Type Form',
    'action' => URL::to('/').'/admin/settings/add_property_type',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => ''],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => ''],
      ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],

    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)