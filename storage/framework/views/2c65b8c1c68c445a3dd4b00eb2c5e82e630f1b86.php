<div class="form-group">
  <label for="inputEmail3" class="col-sm-3 control-label"><?php echo e(isset($field['label']) ? $field['label'] : ''); ?></label>
  <div class="col-sm-6">
    <select class="form-control <?php echo e(isset($field['class']) ? $field['class'] : ''); ?>" id="<?php echo e(isset($field['id']) ? $field['id'] : $field['name']); ?>" name="<?php echo e($field['name']); ?>">
        <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value='<?php echo e($value); ?>' <?php echo e((@$_POST[$field['name']] == $value || @$field['value'] ==  @$value)?'selected':''); ?>><?php echo e($name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span class="text-danger"><?php echo e($errors->first($field['name'])); ?></span>
  </div>
  <div class="col-sm-3">
    <small><?php echo e(isset($field['hint']) ? $field['hint'] : ""); ?></small>
  </div>
</div>