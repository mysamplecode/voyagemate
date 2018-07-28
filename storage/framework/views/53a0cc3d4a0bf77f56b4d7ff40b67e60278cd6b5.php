
<?php $__env->startSection('main'); ?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo e(isset($page_title) ? $page_title : ''); ?>

        <small><?php echo e(isset($page_subtitle) ? $page_subtitle : ''); ?></small>
      </h1>
      <?php echo $__env->make('admin.common.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
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
                <button type="reset" class="btn btn-default">Reset</button>
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