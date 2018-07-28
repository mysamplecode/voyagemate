<?php  
$form_data = [
    'page_title'=> 'Edit Staritng City',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Staritng City Form',
    'action' => URL::to('/').'/admin/settings/edit_starting_cities/'.@$result->id,
    'form_type' => 'file',
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => ' Staring City Name', 'name' => 'name', 'value' => $result->name],
      ['type' => 'file', 'class' => 'validate_field', 'label' => 'Image', 'name' => 'image', 'value' =>'','image' => url('public/front/images/starting_cities/'.$result['image'])],
      ['type' => 'select', 'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'class' => 'validate_field', 'label' => 'Status', 'name' => 'status', 'value' => $result->status],


    ]
  ];
 ?>
<?php echo $__env->make("admin.common.form.setting", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>