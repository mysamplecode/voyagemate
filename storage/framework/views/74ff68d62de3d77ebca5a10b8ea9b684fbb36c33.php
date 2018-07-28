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
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php  $fl = 0;  ?>
              <?php $__currentLoopData = $tab_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($fl == 0): ?>
                  <li class="active"><a href="#<?php echo e($id); ?>" data-toggle="tab"><?php echo e($name); ?></a></li>
                  <?php  $fl=1;  ?> 
                <?php else: ?>
                  <li><a href="#<?php echo e($id); ?>" data-toggle="tab"><?php echo e($name); ?></a></li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="tab-content">
              <?php  $fl = 0;  ?>
              <?php $__currentLoopData = $tab_forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane <?php echo e(($fl == 0)? 'active':''); ?>" id="<?php echo e($id); ?>">
                  <form id="<?php echo e(isset($form['form_id']) ? $form['form_id'] : ''); ?>" method="post" action="<?php echo e(isset($form['action']) ? $form['action'] : ''); ?>" class="form-horizontal <?php echo e(isset($form['form_class']) ? $form['form_class'] : ''); ?>" <?php echo e(isset($form['form_type']) && $form['form_type'] == 'file'? "enctype=multipart/form-data":""); ?>>
                    <?php echo e(csrf_field()); ?>

                    <div class="box-body">
                      <?php $__currentLoopData = $form['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make("admin.common.fields.".$field['type'], ['field' => $field], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                          <button type="button" class="btn btn-default">Cancel</button>
                          <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </form>
                </div>
                <?php  $fl = 1;  ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>