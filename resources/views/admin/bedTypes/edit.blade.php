@php 
$form_data = [
    'page_title'=> 'Edit Bed Type',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Bed Type Form',
    'action' => URL::to('/').'/admin/settings/edit_bed_type/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => $result->name],
    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)