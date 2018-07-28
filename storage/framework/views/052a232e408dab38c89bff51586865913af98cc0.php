<?php 
$form_data = [
		'page_title'=> 'Page Edit Form',
		'page_subtitle'=> 'Edit Page', 
		'form_name' => 'Page Edit Form',
		'action' => URL::to('/').'/admin/edit_page/'.$result->id,
		'fields' => [
			['type' => 'text', 'class' => 'validate_field', 'label' => 'Title', 'name' => 'title', 'value' => @$result->title],
      		['type' => 'text', 'class' => 'validate_field', 'label' => 'Slug', 'name' => 'slug', 'value' => @$result->slug],
      		['type' => 'editor','class' => 'validate_field', 'label' => 'Content', 'name' => 'content', 'value' => @$result->content],
			['type' => 'select', 'options' => ['first' => 'First Column', 'second' => 'Second Column'], 'class' => 'validate_field', 'label' => 'Fotter Position', 'name' => 'footer_position', 'value' => @$result->footer_position],
			['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => @$result->status],
		]
	];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>