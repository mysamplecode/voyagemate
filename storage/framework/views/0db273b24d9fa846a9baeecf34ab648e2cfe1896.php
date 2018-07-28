<?php  
$form_data = [
    'page_title'=> 'Add Role',
    'page_subtitle'=> '', 
    'form_name' => 'Add Role Form',
    'action' => URL::to('/').'/admin/add_role',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => ''],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Display Name', 'name' => 'display_name', 'value' => ''],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => ''],
      ['type' => 'checkbox', 'boxes' => $permissions, 'class' => 'validate_field', 'label' => 'Permissions', 'name' => 'permission[]'],
    ]
  ];
 ?>
<?php echo $__env->make("admin.common.form.primary", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>