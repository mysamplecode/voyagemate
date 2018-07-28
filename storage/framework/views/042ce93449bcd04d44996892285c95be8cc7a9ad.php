<?php $__env->startSection('main'); ?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile Edit Form
        <small>Edit your profile</small>
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

            <?php echo $__env->make('admin.common.member_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="tab-content">
              <div id="editProfile" class="tab-pane fade in <?php echo e(isset($tab) && ( $tab == 'profile' ) ? 'active' : ''); ?>">
                        <div class="box-header with-border">
                          <h3 class="box-title">Profile Edit Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form id="editMember" method="post" action="<?php echo e(URL::to('/').'/admin/edit_member/'.$result->id); ?>" class="form-horizontal">
                          <?php echo e(csrf_field()); ?>

                          <div class="box-body">

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                  <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control validate_field" id="name" value="<?php echo e($result->name); ?>" placeholder="Name">
                                    <span class="text-danger"><?php echo e($errors->first($result->name)); ?></span>
                                  </div>
                                  <div class="col-sm-4">
                                    <small></small>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control validate_field" id="email" value="<?php echo e($result->email); ?>" placeholder="Email" readonly="true">
                                    <span class="text-danger"><?php echo e($errors->first($result->email)); ?></span>
                                  </div>
                                  <div class="col-sm-4">
                                    <small></small>
                                  </div>
                                </div>


                              <?php
                              $types = ['User','Admin'];
                              $statuses = ['Active','Inactive'];
                              ?>
                              
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-6">
                                  <select class="form-control validate_field" id="type" name="type">
                                      <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value='<?php echo e($type); ?>' <?php echo e((@$_POST['type'] == $type || @$result->type ==  @$type)?'selected':''); ?>><?php echo e($type); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                  <span class="text-danger"><?php echo e($errors->first($result->type)); ?></span>
                                </div>
                                <div class="col-sm-4">
                                  <small></small>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-6">
                                  <select class="form-control validate_field" id="status" name="status">
                                      <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value='<?php echo e($status); ?>' <?php echo e((@$_POST['status'] == $status || @$result->status ==  @$status)?'selected':''); ?>><?php echo e($status); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                  <span class="text-danger"><?php echo e($errors->first($result->status)); ?></span>
                                </div>
                                <div class="col-sm-4">
                                  <small></small>
                                </div>
                              </div>


                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
              </div>
            </div>
          </div>
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