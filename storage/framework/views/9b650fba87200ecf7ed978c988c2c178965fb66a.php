<?php  
$form_data = [
    'page_title'=> 'Add Currency',
    'page_subtitle'=> '', 
    'form_name' => 'Add Currency Form',
    'action' => URL::to('/').'/admin/settings/add_currency',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => old('name')],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Code', 'name' => 'code', 'value' => old('code')],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Symbol', 'name' => 'symbol', 'value' => old('symbol')],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Rate', 'name' => 'rate', 'value' => old('rate')],
      ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => ''],

    ]
  ];
 ?>
<?php echo $__env->make("admin.common.form.setting", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>