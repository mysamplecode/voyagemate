@php 
$form_data = [
    'page_title'=> 'Edit Currency',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Currency Form',
    'action' => URL::to('/').'/admin/settings/edit_currency/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => $result->name],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Code', 'name' => 'code', 'value' => $result->code],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Symbol', 'name' => 'symbol', 'value' => $result->org_symbol],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Rate', 'name' => 'rate', 'value' => $result->rate],
      ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],

    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)