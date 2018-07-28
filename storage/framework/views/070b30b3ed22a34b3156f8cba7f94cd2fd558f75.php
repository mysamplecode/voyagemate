

<?php $__env->startSection('main'); ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 settings_bar_gap">
          <?php echo $__env->make('admin.common.settings_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <!-- right column -->
        <div class="col-md-9">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo e(isset($form_name) ? $form_name : ''); ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="<?php echo e(isset($form_id) ? $form_id : ''); ?>" method="post" action="<?php echo e(isset($action) ? $action : ''); ?>" class="form-horizontal <?php echo e(isset($form_class) ? $form_class : ''); ?>" <?php echo e(isset($form_type) && $form_type == 'file'? "enctype=multipart/form-data":""); ?>>
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo $__env->make("admin.common.fields.".$field['type'], ['field' => $field], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>