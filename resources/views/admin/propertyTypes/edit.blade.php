@php 
$form_data = [
    'page_title'=> 'Edit Property Type',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Property Type Form',
    'action' => URL::to('/').'/admin/settings/edit_property_type/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => $result->name],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => $result->description],
      ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],

    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)