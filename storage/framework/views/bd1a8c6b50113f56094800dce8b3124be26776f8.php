<?php $__env->startSection('main'); ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
          <div class="row">
                  <div class="col-md-3 settings_bar_gap">
                      <?php echo $__env->make('admin.common.settings_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  </div>
                  <div class="col-md-9">

                          <div class="box box_info">
                                <div class="box-header">
                                  <h3 class="box-title">Currency type Management</h3>
                                  <div style="float:right;"><a class="btn btn-success" href="<?php echo e(url('admin/settings/add_currency')); ?>">Add Currency</a></div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $dataTable->table(); ?>

                                </div>
                          </div>
                  </div>
          </div>
      </section>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(url('public/js/buttons.server-side.js')); ?>"></script>
<script src="<?php echo e(url('public/backend/dist/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
<?php echo $dataTable->scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>