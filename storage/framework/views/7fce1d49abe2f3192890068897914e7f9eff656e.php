<?php  
$form_data = [
	'page_title'=> 'Photo Setting Form',
	'page_subtitle'=> 'Photo Setting Page', 
	'form_name' => 'Photo Setting Form',
	'action' => URL::to('/').'/admin/settings/photos',
	'fields' => [
		['type' => 'text', 'class' => 'validate_field', 'label' => 'Min Height', 'name' => 'photo_min_height', 'value' => @$result['photo_min_height'], 'hint' => 'PX'],
  		['type' => 'text', 'class' => 'validate_field', 'label' => 'Min Width', 'name' => "photo_min_width", 'value' => @$result['photo_min_width'], 'hint' => 'PX'],
  		['type' => 'text', 'class' => 'validate_field', 'label' => 'Max Size', 'name' => "photo_max_size", 'value' => @$result['photo_max_size'], 'hint' => 'MB']
	]
];
 ?>
<?php echo $__env->make("admin.common.form.setting", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>