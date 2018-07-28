@php 
$form_data = [
    'page_title'=> 'Add Customer',
    'page_subtitle'=> 'Add Customer', 
    'form_name' => 'Add Customer',
    'action' => URL::to('/').'/admin/add_customer',
    'fields' => [
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'First Name', 'name' => 'first_name', 'value' => ''],
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'Last Name', 'name' => 'last_name', 'value' => ''],
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'Email', 'name' => 'email', 'value' => ''],
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'Password', 'name' => 'password', 'value' => ''],
          ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],
    ]
  ];
@endphp
@include("admin.common.form.primary", $form_data)