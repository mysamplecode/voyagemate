<div class="form-group">
  <label for="inputEmail3" class="col-sm-3 control-label"><?php echo e(isset($field['label']) ? $field['label'] : ''); ?></label>
  <div class="col-sm-6">
    <input type="text" name="<?php echo e(isset($field['name']) ? $field['name'] : ''); ?>" class="form-control <?php echo e(isset($field['class']) ? $field['class'] : ''); ?>" id="<?php echo e(isset($field['id']) ? $field['id'] : $field['name']); ?>" value="<?php echo e(isset($_POST[$field['name']])?@$_POST[$field['name']]:@$field['value']); ?>" placeholder="<?php echo e(@$field['label']); ?>" <?php echo e(isset($field['readonly']) && $field['readonly']=='true'?'readonly':''); ?>>
    <span class="text-danger"><?php echo e($errors->first($field['name'])); ?></span>
  </div>
  <div class="col-sm-3">
    <small><?php echo e(isset($field['hint']) ? $field['hint'] : ""); ?></small>
  </div>
</div>