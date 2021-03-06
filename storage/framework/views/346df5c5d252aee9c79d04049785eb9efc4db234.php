<?php  
$form_data = [
    'page_title'=> 'Edit Role',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Role Form',
    'action' => URL::to('/').'/admin/edit_role/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => $result->name],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Display Name', 'name' => 'display_name', 'value' => $result->display_name],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => $result->description],
      ['type' => 'checkbox', 'boxes' => $permissions, 'class' => 'validate_field', 'label' => 'Permissions', 'name' => 'permission[]', 'value' => $stored_permissions ],
    ]
  ];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>