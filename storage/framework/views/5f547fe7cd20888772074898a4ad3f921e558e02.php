
<?php $__env->startSection('main'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e(@$total_users_count); ?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(url('admin/admin_users')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo e(@$total_property_count); ?></h3>

              <p>Total Property</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
            <a href="<?php echo e(url('admin/properties')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo e(@$total_reservations_count); ?></h3>

              <p>Total Reservations</p>
            </div>
            <div class="icon">
              <i class="fa fa-plane"></i>
            </div>
            <a href="<?php echo e(url('admin/bookings')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo e(@$today_users_count); ?></h3>

              <p>Today Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(url('admin/admin_users')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo e(@$today_property_count); ?></h3>

              <p>Today Property</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
            <a href="<?php echo e(url('admin/properties')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo e(@$today_reservations_count); ?></h3>

              <p>Today Reservations</p>
            </div>
            <div class="icon">
              <i class="fa fa-plane"></i>
            </div>
            <a href="<?php echo e(url('admin/bookings')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- /.content -->
      <div class="row">
        <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Property</h3>
            </div>
            <div class="box-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Host Name</th>
                    <th>Space type</th>
                    <th width="15%">Date</th>
                    <th width="5%">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!empty($propertiesList)): ?>
                  <?php $__currentLoopData = $propertiesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><a href="<?php echo e(url('admin/listing/'.$property->properties_id).'/basics'); ?>" ><?php echo e($property->property_name); ?></a></td>
                      <td><?php echo e($property->first_name.' '.$property->last_name); ?></td>
                      <td><?php echo e($property->property_name); ?></td>
                      <td><?php echo e($property->property_created_at); ?></td>
                      <td><?php echo e($property->property_status); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- /.content -->
      <div class="row">
        <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Bookings</h3>
            </div>
            <div class="box-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Host Name</th>
                    <th>Guest Name</th>
                    <th>Property Name</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th width="5%">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!empty($bookingList)): ?>
                  <?php $__currentLoopData = $bookingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><a href="<?php echo e(url('admin/bookings/detail/'.$booking->id)); ?>" ><?php echo e($booking->host_name); ?></a></td>
                      <td><?php echo e($booking->guest_name); ?></td>
                      <td><?php echo e($booking->property_name); ?></td>
                      <td><?php echo e($booking->total_amount); ?></td>
                      <td><?php echo e($booking->created_at); ?></td>
                      <td><?php echo e($booking->status); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>