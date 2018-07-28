@php 
$form_data = [
    'page_title'=> 'Add Role',
    'page_subtitle'=> '', 
    'form_name' => 'Add Role Form',
    'action' => URL::to('/').'/admin/settings/add_role',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => old('name')],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Display Name', 'name' => 'display_name', 'value' => old('display_name')],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => old('description')],
      ['type' => 'checkbox', 'boxes' => $permissions, 'class' => 'validate_field', 'label' => 'Permissions', 'name' => 'permission[]'],
    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)