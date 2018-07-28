@php 
$form_data = [
    'page_title'=> 'Add Banners',
    'page_subtitle'=> 'Add Banners', 
    'form_name' => 'Add Banners',
    'action' => URL::to('/').'/admin/settings/add_banners',
    'form_type' => 'file',
    'fields' => [
          ['type' => 'text', 'class' => 'validate_field', 'label' => 'Heading', 'name' => 'heading', 'value' => ''],
          ['type' => 'text', 'class' => '', 'label' => 'Subheading', 'name' => 'subheading', 'value' => ''],
          ['type' => 'file', 'class' => 'validate_field', 'label' => 'Image', 'name' => "image", 'value' => '','hint'=>'(Width:1920px and Height:860px)'],
          ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],
    ]
  ];
@endphp
@include("admin.common.form.primary", $form_data)