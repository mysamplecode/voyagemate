<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo e(isset($field['label']) ? $field['label'] : ''); ?></label>
    <div class="col-sm-6">
        <ul style="display: inline-block;list-style-type: none;padding:0; margin:0;">
          <?php $__currentLoopData = $field['boxes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="checkbox" style="display: inline-block; min-width: 155px;">
              <label>
                <input type="checkbox" name="<?php echo e(isset($field['name']) ? $field['name'] : ''); ?>" value="<?php echo e($value); ?>" <?php echo e((isset($field['value']) && in_array($value, $field['value']))?'checked':''); ?>> 
                <?php echo e($name); ?>

              </label>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="col-sm-3">
	    <small><?php echo e(isset($field['hint']) ? $field['hint'] : ""); ?></small>
	</div>
</div>