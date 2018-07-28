<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label"><?php echo e(@$field['label']); ?></label>
  <div class="col-sm-6">
    <textarea id="<?php echo e(isset($field['id']) ? $field['id'] : $field['name']); ?>" name="<?php echo e(@$field['name']); ?>" placeholder="<?php echo e(@$field['label']); ?>" rows="10" cols="80" class="form-control <?php echo e(@$field['class']); ?>" <?php echo e(@$field['disabled']=='true'?'disabled':''); ?>><?php echo e(@$field['value']); ?></textarea>
    <span class="text-danger"><?php echo e($errors->first(@$field['name'])); ?></span>
  </div>
  <div class="col-sm-4">
    <small><?php echo e(isset($field['hint']) ? $field['hint'] : ""); ?></small>
  </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
	$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace("<?=@$field['name']?>");
  });
</script>
<?php $__env->stopPush(); ?>