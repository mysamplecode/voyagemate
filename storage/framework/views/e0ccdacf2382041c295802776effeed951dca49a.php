<div class="box box-info box_info">
    <div class="panel-body">
    <h4 class="all_settings">Property Settings</h4>
        <?php
        $requestUri = request()->segment(4);
        ?>
        <ul class="nav navbar-pills nav-tabs nav-stacked no-margin" role="tablist">

            <li class="<?php echo e(($requestUri == 'basics') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/basics")); ?>' data-group="profile">Basics</a>
            </li>
      
            <li class="<?php echo e(($requestUri == 'description') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/description")); ?>' data-group="profile">Description</a>
            </li>

            <li class="<?php echo e(($requestUri == 'location') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/location")); ?>' data-group="profile">Location</a>
            </li>

            <li class="<?php echo e(($requestUri == 'amenities') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/amenities")); ?>' data-group="profile">Amenities</a>
            </li>

            <li class="<?php echo e(($requestUri == 'photos') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/photos")); ?>' data-group="profile">Photos</a>
            </li>

            <li class="<?php echo e(($requestUri == 'pricing') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/pricing")); ?>' data-group="profile">Pricing</a>
            </li>

            <li class="<?php echo e(($requestUri == 'booking') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/booking")); ?>' data-group="profile">Booking</a>
            </li>

            <!--
            <li class="<?php echo e(($requestUri == 'calendar') ? 'active' : ''); ?>">
                <a href='<?php echo e(url("admin/listing/$result->id/calendar")); ?>' data-group="profile">Calendar</a>
            </li>  -->         

        </ul>
    </div>
</div>