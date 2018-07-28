@php 
$form_data = [
    'page_title'=> 'Edit Banners',
    'page_subtitle'=> 'Edit Banners', 
    'form_name' => 'Edit Banners',
    'action' => URL::to('/').'/admin/settings/edit_banners/'.@$result->id,
    'form_type' => 'file',
    'fields' => [
        ['type' => 'text', 'class' => 'validate_field', 'label' => 'Heading', 'name' => 'heading', 'value' => @$result->heading],
        ['type' => 'text', 'class' => '', 'label' => 'Subheading', 'name' => 'subheading', 'value' => @$result->subheading],
        ['type' => 'file', 'class' => 'validate_field', 'label' => 'Image', 'name' => "image", 'value' => '', 'image' => url('public/front/images/banners/'.$result['image'])],
        ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status]
    ]
  ];
@endphp
@include("admin.common.form.primary", $form_data)