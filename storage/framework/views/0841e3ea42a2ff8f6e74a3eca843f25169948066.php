<div class="box box-info box_info">
    <div class="panel-body">
    <h4 class="all_settings">Manage Settings</h4>
        <ul class="nav navbar-pills nav-tabs nav-stacked no-margin" role="tablist">
          <?php if(Permission::has_permission(Auth::guard('admin')->user()->id, 'general_settings')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/settings')); ?>" data-group="profile">General</a>
            </li>
          <?php endif; ?>

          <?php if(Permission::has_permission(Auth::guard('admin')->user()->id, 'manage_banners')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/banners') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/settings/banners')); ?>" data-group="profile">Banners</a>
            </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'starting_cities_settings')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/starting_cities') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/settings/starting_cities')); ?>" data-group="home_cities">Starting Cities</a>
            </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_property_type')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/property_type' || Route::current()->uri() == 'admin/settings/add_property_type') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/settings/property_type')); ?>" data-group="property_type">Property Type</a>
            </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'space_type_setting')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/space_type') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/space_type')); ?>" data-group="space_type">Space Type</a>
            </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_bed_type')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/bed_type') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/bed_type')); ?>" data-group="bed_type">Bed Type</a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_currency')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/currency') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/currency')); ?>" data-group="currency">Currency</a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_country')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/country') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/country')); ?>">Country</a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_amenities_type')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/amenities_type') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/amenities_type')); ?>">Amenities Type</a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'email_settings')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/email') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/email')); ?>">Email Settings</a>
            </li>
          <?php endif; ?>

           <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'general_settings')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/fees') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/fees')); ?>">Fees</a>
            </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_language')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/language') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/language')); ?>" data-group="language">Language</a>
            </li>
          <?php endif; ?>

          <?php if(Permission::has_permission(Auth::guard('admin')->user()->id, 'role_settings')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/roles') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/roles')); ?>" data-group="profile">Roles & Permissions</a>
            </li>
          <?php endif; ?>

          <?php if(Permission::has_permission(Auth::guard('admin')->user()->id, 'backup_settings')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/settings/backup') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/backup')); ?>" data-group="profile">Database Beckups</a>
            </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_metas')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/metas') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/metas')); ?>" data-group="metas">Metas</a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'api_informations')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/api_informations') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/api_informations')); ?>" data-group="api_informations">Api Credentials</a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'payment_settings')): ?>

              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/payment_methods') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/payment_methods')); ?>" data-group="payment_methods">Payment Methods</a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'social_links')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/social_links') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/social_links')); ?>" data-group="social_links">Social Links</a>
              </li>
          <?php endif; ?>
          
          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_admin')): ?>
              <li class="<?php echo e((Route::current()->uri() == 'admin/settings/roles' || Route::current()->uri() == 'admin/permissions') ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('admin/settings/roles')); ?>"><span>Roles & Permissions</span></a>
              </li>
          <?php endif; ?>

          <?php if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'database_backup')): ?>
            <li class="<?php echo e((Route::current()->uri() == 'admin/backup') ? 'active' : ''); ?>">
              <a href="<?php echo e(url('admin/settings/backup')); ?>"><span>Database Backup</span></a>
            </li>
          <?php endif; ?>

        </ul>
    </div>
</div>