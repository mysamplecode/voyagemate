<div class="box box-info box_info">
    <div class="panel-body">
    <h4 class="all_settings">Manage Settings</h4>
        <ul class="nav navbar-pills nav-tabs nav-stacked no-margin" role="tablist">
          <?php if(Permission::has_permission(Auth::user()->id, 'general_settings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/settings/general') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/general')); ?>" data-group="profile">General</a>
          </li>
          <?php endif; ?>
          <?php if(Permission::has_permission(Auth::user()->id, 'general_settings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/settings/photos') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/photos')); ?>" data-group="profile">Photos</a>
          </li>
          <?php endif; ?>
          <?php if(Permission::has_permission(Auth::user()->id, 'email_settings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/settings/email') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/email')); ?>" data-group="profile">Email</a>
          </li>
          <?php endif; ?>
          <?php if(Permission::has_permission(Auth::user()->id, 'payment_settings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/settings/payment') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/payment')); ?>" data-group="profile">Payment</a>
          </li>
          <?php endif; ?>
          <?php if(Permission::has_permission(Auth::user()->id, 'meta_settings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/settings/metas') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/metas')); ?>" data-group="profile">Metas</a>
          </li>
          <?php endif; ?>
          <?php if(Permission::has_permission(Auth::user()->id, 'role_settings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/settings/roles') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/roles')); ?>" data-group="profile">Roles & Permissions</a>
          </li>
          <?php endif; ?>
          <?php if(Permission::has_permission(Auth::user()->id, 'backup_settings')): ?>
          <li class="<?php echo e((Route::current()->uri() == 'admin/settings/backup') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/backup')); ?>" data-group="profile">Database Beckups</a>
          </li>
          <?php endif; ?>
        </ul>
    </div>
</div>