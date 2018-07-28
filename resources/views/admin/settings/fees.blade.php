@php 
$form_data = [
		'page_title'=> 'Fees Setting Form',
		'page_subtitle'=> 'Fees Setting Page', 
		'form_name' => 'Fees Setting Form',
		'action' => URL::to('/').'/admin/settings/fees',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Cancelation fees before seven days', 'name' => 'more_then_seven', 'value' => @$result['more_then_seven'], 'hint' => 'If host cancel booking more then 7 day before arrival this fee will apply.'],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Cancelation fees after seven days', 'name' => "less_then_seven", 'value' => @$result['less_then_seven'], 'hint' => 'If host cancel booking less then 7 day before arrival this fee will apply.'],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Guest service charge (%)', 'name' => "guest_service_charge", 'value' => @$result['guest_service_charge'], 'hint' => 'service charge of guest for booking'],
		]
	];
@endphp
@include("admin.common.form.setting", $form_data)