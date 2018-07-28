<div class="form-group">
  <label for="inputEmail3" class="col-sm-3 control-label"><?php echo e(@$field['label']); ?></label>
  <div class="col-sm-6">
    <textarea name="<?php echo e(@$field['name']); ?>" placeholder="<?php echo e(@$field['label']); ?>" rows="3" class="form-control <?php echo e(@$field['class']); ?>" <?php echo e(@$field['disabled']=='true'?'disabled':''); ?>><?php echo e(isset($_POST[$field['name']])?@$_POST[$field['name']]:@$field['value']); ?></textarea>
    <span class="text-danger"><?php echo e($errors->first(@$field['name'])); ?></span>
  </div>
  <div class="col-sm-3">
    <small><?php echo e(isset($field['hint']) ? $field['hint'] : ""); ?></small>
  </div>
</div>