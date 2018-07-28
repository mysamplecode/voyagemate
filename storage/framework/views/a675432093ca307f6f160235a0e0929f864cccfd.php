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
        <?php if($listed->count() > 0): ?>
        <div class="panel panel-default">
            <div class="panel-body h4"><?php echo e(trans('messages.property.listed')); ?></div>
            <?php $__currentLoopData = $listed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="panel-footer">
                <div class="col-md-2 col-sm-2 col-xs-12"><img class="img-responsive" style="width:100px, height:80px;" src="<?php echo e($row->cover_photo); ?>"></div>
                <div class="col-md-7 col-sm-7 col-xs-12 margin-top10">
                    <a href="<?php echo e(url('properties/'.$row->id)); ?>" class="text-normal"><div class="h4"><?php echo e(($row->name == '') ? '' : $row->name); ?></div></a>
                    <a href="<?php echo e(url('listing/'.$row->id.'/basics')); ?>"><div class="h6 text-danger"><?php echo e(trans('messages.property.manage_list_cal')); ?></div></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 margin-top30">
                    <?php if($row->steps_count != 0): ?>
                        <a href="<?php echo e(url('manage-listing/'.$row->id.'/basics')); ?>" class="btn ex-btn"><?php echo e($row->steps_count); ?> <?php echo e(trans('messages.property.step_listed')); ?></a>
                    <?php else: ?>
                        <div id="availability-dropdown" data-room-id="div_<?php echo e($row->id); ?>">
                            <i class="dot row-space-top-2 col-top dot-<?php echo e(($row->status == 'Listed') ? 'success' : 'danger'); ?>"></i>
                            <div class="select">
                                <select class="form-control room-list-status" data-room-id="<?php echo e($row->id); ?>">
                                    <option value="Listed" <?php echo e(($row->status == 'Listed') ? 'selected' : ''); ?>><?php echo e(trans('messages.property.listed')); ?></option>
                                    <option value="Unlisted" <?php echo e(($row->status == 'Unlisted') ? 'selected' : ''); ?>><?php echo e(trans('messages.property.unlisted')); ?></option>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        <?php if($unlisted->count() > 0): ?>
        <div class="panel panel-default">
            <div class="panel-body h4"><?php echo e(trans('messages.property.unlisted')); ?></div>
            <?php $__currentLoopData = $unlisted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="panel-footer">
                <div class="col-md-2 col-sm-2 col-xs-12"><img class="img-responsive" style="width:100px, height:80px;" src="<?php echo e($row->cover_photo); ?>"></div>
                <div class="col-md-7 col-sm-7 col-xs-12 margin-top10">
                    <a href="<?php echo e(url('properties/'.$row->id)); ?>" class="text-normal"><div class="h4"><?php echo e(($row->name == '') ? '' : $row->name); ?></div></a>
                    <a href="<?php echo e(url('listing/'.$row->id.'/basics')); ?>"><div class="h6 text-danger"><?php echo e(trans('messages.property.manage_list_cal')); ?></div></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 margin-top30">
                    <?php if($row->steps_completed == 0 && $row->status == NULL): ?>
                    <a class="btn ex-btn" href="<?php echo e(url('listing/'.$row->id.'/basics')); ?>" class="btn ex-btn"><?php echo e(trans('messages.property.pending')); ?></a>
                    <?php elseif($row->steps_completed != 0): ?>
                    <a class="btn ex-btn" href="<?php echo e(url('listing/'.$row->id.'/'.$row->missed_step)); ?>" class="btn ex-btn"><?php echo e($row->steps_completed); ?> <?php echo e(trans('messages.property.step_to_list')); ?> </a>
                    <?php else: ?>
                    <div id="availability-dropdown" data-room-id="div_<?php echo e($row->id); ?>">
                        <i class="dot row-space-top-2 col-top dot-<?php echo e(($row->status == 'Listed') ? 'success' : 'danger'); ?>"></i>&nbsp;
                        <div class="select">
                            <select class="form-control room-list-status" data-room-id="<?php echo e($row->id); ?>">
                                <option value="Listed" <?php echo e(($row->status == 'Listed') ? 'selected=selected' : ''); ?>><?php echo e(trans('messages.property.listed')); ?></option>
                                <option value="Unlisted" <?php echo e(($row->status == 'Unlisted') ? 'selected=selected' : ''); ?>><?php echo e(trans('messages.property.unlisted')); ?></option>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
    
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>