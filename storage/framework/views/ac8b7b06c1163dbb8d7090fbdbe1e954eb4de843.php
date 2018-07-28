<?php  
$form_data = [
    'page_title'=> 'Edit Language',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Language Form',
    'action' => URL::to('/').'/admin/settings/edit_language/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => $result->name ],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Short Name', 'name' => 'short_name', 'value' => $result->short_name],
      ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => $result->status],
    ]
  ];
 ?>
<?php echo $__env->make("admin.common.form.setting", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>