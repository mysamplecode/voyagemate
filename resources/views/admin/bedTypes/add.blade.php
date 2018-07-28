@php 
$form_data = [
    'page_title'=> 'Add Bed Type',
    'page_subtitle'=> '', 
    'form_name' => 'Add Bed Type Form',
    'action' => URL::to('/').'/admin/settings/add_bed_type',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => ''],
    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)