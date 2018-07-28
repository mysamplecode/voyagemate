<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="<?php echo e((Route::current()->uri() == 'admin/dashboard')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/dashboard')); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php if(Helpers::has_permission(Auth::user()->id, 'view_category')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/categories')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/categories')); ?>">
            <i class="fa fa-list-ul"></i> <span>Categories</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if(Helpers::has_permission(Auth::user()->id, 'view_photo')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/photos')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/photos')); ?>">
            <i class="ion ion-speakerphone"></i> <span>Photos</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if(Helpers::has_permission(Auth::user()->id, 'manage_report')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/reports')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/reports')); ?>">
            <i class="ion ion-alert-circled"></i> <span>Photos Reported</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if(Helpers::has_permission(Auth::user()->id, 'manage_payment')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/payments')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/payments')); ?>">
            <i class="ion ion-cash"></i> <span>Payments</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if(Helpers::has_permission(Auth::user()->id, 'manage_withdraw')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/withdrawals')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/withdrawals')); ?>">
            <i class="fa fa-university"></i> <span>Withdrawals</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if(Helpers::has_permission(Auth::user()->id, 'view_member')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/members')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/members')); ?>">
            <i class="fa fa-users"></i> <span>Members</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if(Helpers::has_permission(Auth::user()->id, 'manage_page')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/pages')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/pages')); ?>">
            <i class="glyphicon glyphicon-file"></i> <span>Pages</span>
          </a>
        </li>
        <?php endif; ?>
        <?php if(Helpers::has_permission(Auth::user()->id, 'manage_join_us')): ?>
        <li class="<?php echo e((Route::current()->uri() == 'admin/join_us') ? 'active' : ''); ?>">
          <a href="<?php echo e(url('admin/join_us')); ?>">
            <i class="fa fa-share-alt"></i><span>Join Us Links</span>
          </a>
        </li>
        <?php endif; ?>
        <li class="treeview ">
          <a href="<?php echo e(url('admin/settings/general')); ?>">
            <i class="fa fa-cogs"></i>
            <span>Settings</span>
          </a>
        </li>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>