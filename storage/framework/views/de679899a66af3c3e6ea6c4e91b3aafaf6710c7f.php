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
              <h3 class="box-title">Report Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="report_form" method="post" action="<?php echo e(url('admin/display_report/'.$result->id)); ?>" class="form-horizontal">
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
                <div class="form-group">
                  <p><?php echo e(@$result->message); ?></p>
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="report_status" name="status">
                      <option value='unsolved' <?php echo e((@$result->status ==  'unsolved')?'selected':''); ?>>Unsolved</option>
                      <option value='solved' <?php echo e((@$result->status ==  'solved')?'selected':''); ?>>Solved</option>
                    </select>
                    <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                    
                    <button type="submit" style="margin-top:15px;" class="btn btn-info">Submit</button>
                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
             
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