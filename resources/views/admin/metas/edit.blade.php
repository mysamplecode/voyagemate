@php 
$form_data = [
    'page_title'=> 'Edit Metas',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Meta Form',
    'action' => URL::to('/').'/admin/settings/edit_meta/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Page Url', 'name' => 'url', 'value' => $result->url],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Page Title', 'name' => 'title', 'value' => $result->title],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Meta Description', 'name' => 'description', 'value' => $result->description],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Keywords', 'name' => 'keywords', 'value' => $result->keywords],
    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)