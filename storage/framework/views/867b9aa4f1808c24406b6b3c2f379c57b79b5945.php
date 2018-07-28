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
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/categories')); ?>">
            <i class="fa fa-list-ul"></i> <span>Categories</span>
          </a>
        </li>
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/campaigns')); ?>">
            <i class="ion ion-speakerphone"></i> <span>Campaigns</span>
          </a>
        </li>
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/roported')); ?>">
            <i class="ion ion-alert-circled"></i> <span>Campaigns Reported</span>
          </a>
        </li>
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/withdrawals')); ?>">
            <i class="fa fa-university"></i> <span>Withdrawals</span>
          </a>
        </li>
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/donations')); ?>">
            <i class="ion ion-cash"></i> <span>Donations</span>
          </a>
        </li>
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/members')); ?>">
            <i class="fa fa-users"></i> <span>Members</span>
          </a>
        </li>
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/pages')); ?>">
            <i class="glyphicon glyphicon-file"></i> <span>Pages</span>
          </a>
        </li>
        <li class="<?php echo e((Route::current()->uri() == 'admin/users')? 'active':''); ?>">
          <a href="<?php echo e(url('admin/social')); ?>">
            <i class="fa fa-share-alt"></i> <span>Profiles Social</span>
          </a>
        </li>
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