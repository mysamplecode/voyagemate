<?php $__env->startSection('main'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Metas
        <small>Control panel</small>
      </h1>
      <?php echo $__env->make('admin.common.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 settings_bar_gap">
          <?php echo $__env->make('admin.common.settings_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-9">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Metas Management</h3>
              <!--<div style="float:right;"><a class="btn btn-success" href="<?php echo e(url('admin/add_page')); ?>">Add Page</a></div>-->
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

  <!--Modal For Currency Edit-->
  <div class="modal fade" id="meta_edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <button type="button" class="close meta_edit_close" data-dismiss="modal">
                         <span aria-hidden="true">&times;</span>
                         <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                      Update Metas
                  </h4>
              </div>
              <div id="meta_message" class="alert alert-success" style="display:none">
             </div>
            <!-- Modal Body -->
            <div class="modal-body">
              <form class="form-horizontal" role="form">
                  <input type="hidden" class="edit_id">
                  <div class="form-group">
                    <label for="input_url" class="col-sm-2 control-label">Page URL</label>
                    <div class="col-sm-10">
                      <input type="text" name="url" class="form-control" id="input_url" placeholder="Page URL" readonly>
                      <span class="text-danger" class="input_url"><?php echo e($errors->first('url')); ?></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="input_title" class="col-sm-2 control-label">Page Title<em class="text-danger">*</em></label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="input_title" placeholder="Page Title">
                      <span class="text-danger" class="input_title"><?php echo e($errors->first('title')); ?></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="input_description" class="col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-10">
                      <textarea name="description" placeholder="Meta Description" rows="3" id="input_description" class="form-control"></textarea>
                      <span class="text-danger" class="input_description"><?php echo e($errors->first('description')); ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="input_keywords" class="col-sm-2 control-label">Keywords</label>
                    <div class="col-sm-10">
                      <textarea name="keywords" placeholder="Meta Keywords" rows="3" id="input_keywords" class="form-control" placeholder="Meta Keywords"></textarea>
                      <span class="text-danger" class="input_keywords"><?php echo e($errors->first('keywords')); ?></span>
                    </div>
                  </div>
              </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" id="update_meta" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
  </div>
  <!--Modal For Currency Edit Ends here-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(url('public/js/buttons.server-side.js')); ?>"></script>
<script src="<?php echo e(url('public/backend/dist/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
<?php echo $dataTable->scripts(); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>