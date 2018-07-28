<?php  
$form_data = [
    'page_title'=> 'Add Country',
    'page_subtitle'=> '', 
    'form_name' => 'Add Country Form',
    'action' => URL::to('/').'/admin/settings/add_country',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Short Name', 'name' => 'short_name', 'value' => ''],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Long Name', 'name' => 'name', 'value' => ''],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'ISO3', 'name' => 'iso3', 'value' => ''],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Num Code', 'name' => 'number_code', 'value' => ''],
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Phone Code', 'name' => 'phone_code', 'value' => ''],

    ]
  ];
 ?>
<?php echo $__env->make("admin.common.form.setting", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>