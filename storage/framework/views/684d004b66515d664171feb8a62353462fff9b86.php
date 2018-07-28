<?php  
$form_data = [
    'page_title'=> 'Edit Amenity Type',
    'page_subtitle'=> '', 
    'form_name' => 'Edit Amenity Type Form',
    'action' => URL::to('/').'/admin/settings/edit_amenities_type/'.$result->id,
    'fields' => [
      ['type' => 'text', 'class' => 'validate_field', 'label' => 'Name', 'name' => 'name', 'value' => $result->name],
      ['type' => 'textarea', 'class' => 'validate_field', 'label' => 'Description', 'name' => 'description', 'value' => $result->description],
    ]
  ];
 ?>
<?php echo $__env->make("admin.common.form.setting", $form_data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>