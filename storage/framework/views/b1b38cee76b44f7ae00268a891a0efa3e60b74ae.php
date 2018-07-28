<?php  
$form_data = [
	'page_title'=> 'Payment Setting Form',
	'page_subtitle'=> 'Payment Setting Page',
	'tab_names' => ['paypal' => 'Paypal', 'stripe' => 'Stripe'],
	'tab_forms' => [
		'paypal' => [
			'action' => URL::to('/').'/admin/settings/payment_methods',
			'form_class' => 'form-submit-jquery',
			'fields' => [
				['type' => 'hidden', 'class' => '', 'label' => '', 'name' => 'gateway', 'value' => 'paypal'],
				['type' => 'text', 'class' => 'validate_field', 'label' => 'PayPal Username', 'name' => 'username', 'value' => @$paypal['username']],
	      		['type' => 'text', 'class' => 'validate_field', 'label' => 'PayPal Password', 'name' => 'password', 'value' => @$paypal['password']],
	      		['type' => 'text', 'class' => 'validate_field', 'label' => 'PayPal Signature', 'name' => 'signature', 'value' => @$paypal['signature']],
	      		['type' => 'select', 'options' => ['sandbox' => 'Sandbox', 'live' => 'Live'], 'class' => 'validate_field', 'label' => 'PayPal Mode', 'name' => 'mode', 'value' => @$paypal['mode']],
			]
		],
		'stripe' => [
			'action' => URL::to('/').'/admin/settings/payment_methods',
			'form_class' => 'form-submit-jquery',
			'fields' => [
				['type' => 'hidden', 'class' => '', 'label' => '', 'name' => 'gateway', 'value' => 'stripe'],
	      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Stripe Secret Key', 'name' => 'secret_key', 'value' => @$stripe['secret']],
	      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Stripe Publishable Key', 'name' => 'publishable_key', 'value' => @$stripe['publishable']]
			]
		]
	]
];
 ?>

<?php echo $__env->make("admin.common.form.setting-multi-tab", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>