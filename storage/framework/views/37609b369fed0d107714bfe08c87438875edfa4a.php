<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="<?php echo e((Route::current()->uri() == 'admin/dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/dashboard')); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
        
        <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'customers')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/customers') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/customers')); ?>"><i class="fa fa-users"></i><span>Customers</span></a></li>
        <?php endif; ?>

        <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'properties')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/properties') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/properties')); ?>"><i class="fa fa-home"></i><span>Properties</span></a></li>
        <?php endif; ?>

        <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_bookings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/bookings') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/bookings')); ?>"><i class="fa fa-home"></i><span>Bookings</span></a></li>
        <?php endif; ?>
        
        <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_penalty')): ?>
          <li class="treeview <?php echo e((Route::current()->uri() == 'admin/guest_penalty' || Route::current()->uri() == 'admin/host_penalty') ? 'active' : ''); ?>">
            <a href="#">
              <i class="fa fa-plane"></i> <span>Penalty</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e((Route::current()->uri() == 'admin/guest_penalty') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/guest_penalty')); ?>"><span>Guest Penalty</span></a></li>
              <li class="<?php echo e((Route::current()->uri() == 'admin/host_penalty') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/host_penalty')); ?>"><span>Host Penalty</span></a></li>
            </ul>
          </li>
        <?php endif; ?>

  
        <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_amenities')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/amenities') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/amenities')); ?>"><i class="fa fa-bullseye"></i><span>Amenities</span></a></li>
        <?php endif; ?>
       
        <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_pages')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/pages') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/pages')); ?>"><i class="fa fa-newspaper-o"></i><span>Static Pages</span></a></li>
        <?php endif; ?>

        <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_admin')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/admin_users') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('admin/admin_users')); ?>">
              <i class="fa fa-user-plus"></i> <span>Users</span>
            </a>
          </li>
        <?php endif; ?>
    
        <li class="<?php echo e((Route::current()->uri() == 'admin/settings') ? 'active' : ''); ?>"><a href="<?php echo e(url('admin/settings')); ?>"><i class="fa fa-gears"></i><span>Settings</span></a></li>


      </ul>
    </section>
    <!-- /.sidebar -->
</aside>