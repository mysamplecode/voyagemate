@php 
$form_data = [
    'page_title'=> 'Api Credentials Form',
    'page_subtitle'=> 'Api Credentials Page', 
    'form_name' => 'Api Credentials Form',
    'action' => URL::to('/').'/admin/settings/api_informations',
    'form_type' => 'file',
    'fields' => [
        ['type' => 'text', 'class' => 'validate_field', 'label' => 'Facebook Client ID', 'name' => 'facebook_client_id', 'value' => @$facebook['client_id']],
        ['type' => 'text', 'class' => 'validate_field', 'label' => 'Facebook Client Secret', 'name' => "facebook_client_secret", 'value' => @$facebook['client_secret']],
        ['type' => 'text', 'class' => 'validate_field', 'label' => 'Google Client ID', 'name' => "google_client_id", 'value' => @$google['client_id']],
        ['type' => 'text', 'class' => 'validate_field', 'label' => 'Google Client Secret', 'name' => 'google_client_secret', 'value' => @$google['client_secret']],
        ['type' => 'text', 'class' => 'validate_field', 'label' => 'Google Map Browser Key', 'name' => 'google_map_key', 'value' => @$google_map['key']],
    ]
  ];
@endphp
@include("admin.common.form.setting", $form_data)