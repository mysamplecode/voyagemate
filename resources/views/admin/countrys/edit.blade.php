@php 
$form_data = [
    'page_title'=> 'Edit Country',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Country Form',
    'action' => URL::to('/').'/admin/settings/edit_country/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Short Name', 'name' => 'short_name', 'value' => $result->short_name],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Long Name', 'name' => 'name', 'value' => $result->name],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'ISO3', 'name' => 'iso3', 'value' => $result->iso3],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Num Code', 'name' => 'number_code', 'value' => $result->number_code],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Phone Code', 'name' => 'phone_code', 'value' => $result->phone_code],
    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)