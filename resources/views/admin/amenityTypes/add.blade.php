@php 
$form_data = [
    'page_title'=> 'Add Amenity Type',
    'page_subtitle'=> '', 
    'form_name' => 'Add Amenity Type Form',
    'action' => URL::to('/').'/admin/settings/add_amenities_type',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => ''],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => ''],
    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)