@php 
$form_data = [
		'page_title'=> 'Social Setting Form',
		'page_subtitle'=> 'Social Setting Page', 
		'form_name' => 'Social Setting Form',
		'action' => URL::to('/').'/admin/settings/social_links',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Facebook', 'name' => 'facebook', 'value' => @$result['facebook']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Google Plus', 'name' => 'google_plus', 'value' => @$result['google_plus']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Twitter', 'name' => 'twitter', 'value' => @$result['twitter']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Linkedin', 'name' => 'linkedin', 'value' => @$result['linkedin']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Pinterest', 'name' => 'pinterest', 'value' => @$result['pinterest']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Youtube', 'name' => 'youtube', 'value' => @$result['youtube']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Instagram', 'name' => 'instagram', 'value' => @$result['instagram']],

		]
	];
@endphp
@include("admin.common.form.setting", $form_data)