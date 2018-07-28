<?php  
$page = [
	'page_title' => 'Payment Setting',
	'tab_names' => ['paypal' => 'Paypal', 'stripe' => 'Stripe'],
	'tab_forms' => [
		'paypal' => [
			'action' => URL::to('/').'/admin/settings/payment',
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
			'action' => URL::to('/').'/admin/settings/payment',
			'form_class' => 'form-submit-jquery',
			'fields' => [
				['type' => 'hidden', 'class' => '', 'label' => '', 'name' => 'gateway', 'value' => 'stripe'],
	      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Stripe Secret Key', 'name' => 'secret_key', 'value' => @$stripe['secret_key']],
	      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Stripe Publishable Key', 'name' => 'publishable_key', 'value' => @$stripe['publishable_key']]
			]
		]
	]
]
 ?>
<?php echo $__env->make("admin.common.form.setting-multi-tab", $page, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>