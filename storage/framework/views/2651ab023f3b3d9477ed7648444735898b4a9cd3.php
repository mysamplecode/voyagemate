

<?php $__env->startSection('main'); ?>
    <div class="container margin-top30">
      <div class="col-md-3">
        <div class="panel panel-default">
          <a href="<?php echo e(url('users/show/'.Auth::guard('users')->user()->id)); ?>" title="<?php echo e(trans('messages.dashboard.view_profile')); ?>">
          	<img src="<?php echo e(@Auth::user()->profile_src); ?>" class="img-responsive" alt="" width="300" title ="<?php echo e(Auth::guard('users')->user()->first_name); ?>">
          </a>
          
          <div class="add-photo"><a href="<?php echo e(url('users/profile/media')); ?>"><?php echo e(trans('messages.users_dashboard.add_profile_photo')); ?></a></div>
          <h2 class="text-center mb20"><?php echo e(Auth::guard('users')->user()->first_name); ?></h2>
          <div class="text-center mb20">
            <p><a href="<?php echo e(url('users/show/'.Auth::guard('users')->user()->id)); ?>"><?php echo e(trans('messages.users_dashboard.view_profile')); ?></a></p>
            <a href="<?php echo e(url('users/profile')); ?>" class="btn ex-btn"><?php echo e(trans('messages.users_dashboard.complete_profile')); ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-body h4">
           <?php echo e(trans('messages.users_dashboard.welcome_to')); ?>  <?php echo e($site_name); ?>, <?php echo e(Auth::guard('users')->user()->first_name); ?>!
          </div>
        </div>   
        <div class="panel panel-default">
          <div class="panel-body h4">
           <?php echo e(trans('messages.users_dashboard.message')); ?>  (<?php echo e(@$all_message->count()); ?> <?php echo e(trans('messages.users_dashboard.new')); ?>)
          </div>
          <div class="panel-footer ">
            <ul class="list-layout">
              <?php $__currentLoopData = @$all_message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li id="thread_<?php echo e($all->id); ?>" class="panel-body thread-read thread">
                <div class="row">
                  <div class="col-md-3">
                    <div class="col-5">          
                      <a href="#"><img height="50" width="50" title="<?php echo e($all->sender->first_name); ?>" src="<?php echo e($all->sender->profile_src); ?>" alt="<?php echo e($all->sender->first_name); ?>"></a>
                    </div>
                    <div class="col-7">
                      <?php echo e($all->sender->first_name.' '.$all->bookings->status); ?>

                      <br>
                      <?php echo e(@$all->created_time); ?>

                    </div>
                  </div>
                  <?php if($all->host_user ==1 && $all->bookings->status == 'Pending'): ?>
                  <a href="<?php echo e(url('booking')); ?>/<?php echo e($all->booking_id); ?>">
                  <?php elseif($all->host_user ==1 && $all->bookings->status != 'Pending'): ?>
                  <a class="link-reset text-muted" href="<?php echo e(url('messaging/host')); ?>/<?php echo e($all->booking_id); ?>">
                  <?php elseif($all->guest_user !=0): ?>
                  <a class="link-reset text-muted" href="<?php echo e(url('messaging/guest')); ?>/<?php echo e($all->booking_id); ?>">
                  <?php endif; ?>
                    <div class="col-md-7">
                       <span style="color:black"><b><?php echo e(@$all->message); ?></b></span>
                      <br>
                      <span class="text-muted">
                          <span class="street-address"><?php echo e(@$all->properties->property_address->address_line_1); ?> <?php echo e(@$all->properties->property_address->address_line_2); ?></span>, <span class="locality"><?php echo e(@$all->properties->property_address->city); ?></span>, <span class="region"><?php echo e(@$all->properties->property_address->state); ?></span>
                        (<?php echo e((date('M d', strtotime( @$all->bookings->start_date)))); ?>, <?php echo e((date('M d, Y', strtotime( @$all->bookings->end_date)))); ?>)
                      </span>       
                    </div>
                  </a>
                  <div class="col-md-2">
                    <span class="label label-<?php echo e(@$all->bookings->label_color); ?>"><?php echo e($all->bookings->status); ?></span>
                    <br><?php echo e($all->bookings->currency->symbol); ?><?php echo e($all->bookings->total); ?></span>
                  </div>
                </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <div class="panel-body">
            <a href="<?php echo e(url('inbox')); ?>"><?php echo e(trans('messages.users_dashboard.all_messages')); ?></a>
          </div>
        </div> 
      </div>
    </div>

<?php $__env->stopSection(); ?>    
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>