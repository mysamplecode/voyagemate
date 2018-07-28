<?php  
$form_data = [
		'page_title'=> 'Email Setting Form',
		'page_subtitle'=> 'Email Setting Page', 
		'form_name' => 'Email Setting Form',
		'action' => URL::to('/').'/admin/settings/email',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Driver', 'name' => 'driver', 'value' => @$result['driver']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Host', 'name' => 'host', 'value' => @$result['host']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Port', 'name' => 'port', 'value' => @$result['port']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'From Address', 'name' => 'from_address', 'value' => @$result['from_address']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'From Name', 'name' => 'from_name', 'value' => @$result['from_name']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Encryption', 'name' => 'encryption', 'value' => @$result['encryption']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Username', 'name' => 'username', 'value' => @$result['username']],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Password', 'name' => 'password', 'value' => @$result['password']],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.setting", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>