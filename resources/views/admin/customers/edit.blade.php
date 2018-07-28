@php 
$form_data = [
    'page_title'=> 'Edit Customer',
    'page_subtitle'=> 'Edit Customer', 
    'form_name' => 'Edit Customer',
    'action' => URL::to('/').'/admin/edit_customer/'.@$result->id,
    'fields' => [
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'First Name', 'name' => 'first_name', 'value' => @$result->first_name],
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'Last Name', 'name' => 'last_name', 'value' => @$result->last_name],
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'Email', 'name' => 'email', 'value' => @$result->email, 'readonly' => true],
          ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],
    ]
  ];
@endphp
@include("admin.common.form.primary", $form_data)