<?php  
$form_data = [
		'page_title'=> 'Page Add Form',
		'page_subtitle'=> 'Add Page', 
		'form_name' => 'Page Add Form',
		'action' => URL::to('/').'/admin/add_page',
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Title', 'name' => 'title', 'value' => ''],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Slug', 'name' => 'slug', 'value' => ''],
      		['type' => 'editor', 'class' => 'validate_field', 'label' => 'Content', 'name' => 'content', 'value' => ''],
      		['type' => 'select', 'options' => ['No' => 'No', 'Yes' => 'Yes'], 'class' => 'validate_field', 'label' => 'Show In Navbar', 'name' => 'navbar_show', 'value' => ''],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>