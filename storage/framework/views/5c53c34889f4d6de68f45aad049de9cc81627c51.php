<?php $__env->startSection('main'); ?>
<div class="container margin-top30">
  <div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-footer">
          <div class="panel">
            <?php echo $__env->make('common.sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        </div>
    </div>
  </div>
  <div class="col-md-9 min-height-div">
    <?php if($previous_trips->count() == 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading">Previous Trips</div>
      <div class="panel-body">
        <p>You have no previous trips.</p>
      </div>
    </div>
    <?php endif; ?>
    <?php if($previous_trips->count() > 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading">Previous Trips</div>
      <div class="panel-body">
        <table class="table panel-body panel-light">
          <tbody>
            <tr>
              <th>Status</th>
              <th>Location</th>
              <th>Host</th>
              <th>Dates</th>
              <th>Options</th>
            </tr>
            <?php $__currentLoopData = $previous_trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $previous_trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <span class="label label-orange label-<?php echo e($previous_trip->label_color); ?>">
                  <?php echo e($previous_trip->status); ?>

                </span>
                <br>
              </td>
              <td>
                <a href="<?php echo e(url('/')); ?>/properties/<?php echo e(@$previous_trip->property_id); ?>"><?php echo e(@$previous_trip->properties->name); ?></a>
                <br>
                <?php echo e(@$previous_trip->properties->property_address->city); ?>

              </td>
              <td><a href="<?php echo e(url('/')); ?>/users/show/<?php echo e(@$previous_trip->host_id); ?>"><?php echo e(@$previous_trip->properties->users->full_name); ?></a></td>
              <td><?php echo e(@$previous_trip->dates); ?></td>
              <td>
                <ul class="unstyled list-unstyled">
                  <?php if($previous_trip->status != "Cancelled" && $previous_trip->status != "Declined" && $previous_trip->status != "Expired"): ?>
                  <li>
                    <a href="<?php echo e(url('/')); ?>/booking/receipt?code=<?php echo e($previous_trip->code); ?>">View Receipt</a>
                  </li>
                  <?php endif; ?>
                </ul>
              </td>         
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php endif; ?>
  </div>
  
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>