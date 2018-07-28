<?php $__env->startSection('main'); ?>
<div class="bannerbg">
  	<div class="h2 text-center pinkColor"><strong><?php echo e(trans('messages.manage_photo.manage_photo')); ?></strong></div>
  	<div class="text-center">
  		<a style="color:white;" href="<?php echo e(url('uploads')); ?>" class="btn btn-pinkbg"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?php echo e(trans('messages.manage_photo.photo_upload')); ?></a>
  	</div>
</div>
<div class="container mtop30 mb40" style="min-height:400px;">
	<div class="inblk">
	     <div class="manage_st-sale-icon inblk"></div>
		 <span class="grayColor inblk foteT"><?php echo e(trans('messages.manage_photo.photo_for_sale', ['sell_count' => $photos->where('sell_photo', 'Yes')->count(), 'total' => count($photos)])); ?>

		 <!--<span class="pinkColor inblk"><strong>Upgrade for more</strong> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>-->
	</div>
	<!--<div class="inblk manage-search">
			<div class="input-group stylish-input-group">
                <input type="text" class="form-control"  placeholder="Search" >
                <span class="input-group-addon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                </span>
            </div>
	</div>-->
	<?php if($photos->count()): ?>
	<div class="row-block mtop20">
		<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <div class="col-md-2 col-sm-2 col-xs-6 mb10" style="margin-right:38px;">
			<div class="manage_box">
			  	<a href="<?php echo e(url('photo-details/'.$photo->id)); ?>" class="media-cover">
				  <div class="center-cropped" style="background-image: url('<?php echo e(url('public/images/uploads/'.$photo->user_id.'/small'.'/'.$photo->image)); ?>'); width: 100%; height: 175px; background-position: center center;background-repeat: no-repeat;"></div>
				</a>
				  <div class="media-left">
				     <div class="media-user">
				       <div class="doller-sign-bg"><i class="fa fa-shopping-cart fa-2" aria-hidden="true"></i><?php echo e(trans('messages.utility.buy')); ?></div>
				    </div>
				  </div>
				  	<div class="media-user"> 
				  		<div class="dropdown">
				       		<a class="dropdown-toggle" id="menu1" data-toggle="dropdown" href="javascript:void(0)"><i class="fa fa-cog fa-2" aria-hidden="true"></i></a>
				   			<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="menu1" style="min-width:150px;">
						      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(url('photo-details/'.$photo->id)); ?>"><?php echo e(trans('messages.manage_photo.edit_details')); ?></a></li>
						      <li role="presentation"><a style="color:red" role="menuitem" tabindex="-1" href="#" onclick="delete_modal_show(<?php echo e($photo->id); ?>)"><?php echo e(trans('messages.manage_photo.delete_photo')); ?></a></li>
						    </ul>
				   		</div>
				   	</div>
				   <div class="fote-set">
				   <!--<div class="star pull-left"><i class="fa fa-star" aria-hidden="true"></i></div>
				   <div class="pull-right">
					   <div class="manage_st-sale-iconBggray"></div>
				   </div>-->
				   <div class="clearfix"></div>
				</div>
				
				<div class="clearfix"></div>
			</div>	
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<?php else: ?>
	<div class="bG_color">  
	    <div class="container ">
		    <div class="h2 text-center mtop50 mb20"><strong><?php echo e(trans('messages.manage_photo.not_have_image')); ?></strong></div>
		</div>
	</div>
	<?php endif; ?>
	
<!-- Modal -->
<div class="modal fade" id="deleteModal" role="dialog" style="z-index:1060;">
    <div class="modal-dialog" >
      <!-- Modal content-->
      <div class="modal-content" style="width:100%;height:100%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center"><?php echo e(trans('messages.manage_photo.delete_an_image')); ?></h3>
          <h4 class="text-center"><?php echo e(trans('messages.manage_photo.delete_loss')); ?></h4>
          <p class="text-center"><button id="delete-btn" type="button" class="btn btn-lg btn-danger" data-rel="" data-dismiss="modal"><?php echo e(trans('messages.manage_photo.delete')); ?></button></p>
        </div>
      </div>
    </div>
</div>
</div>
<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript">
		function delete_modal_show(id){
			$('#delete-btn').attr('data-rel', id);
			$('#deleteModal').modal('show');
		}

		$(document).on('click', '#delete-btn', function(){
			var photo_id = $('#delete-btn').attr('data-rel');
			var dataURL = APP_URL+'/delete-photo';
			$.ajax({
			    url: dataURL,
			    data: {'photo_id': photo_id},
			    type: 'post',
			    async: false,
			    dataType: 'json',
			    success: function (result) {
			    	if(result.success){
			    		window.location.href = "<?php echo e(url('manage-photos')); ?>";
			    	}
			    },
			    error: function (request, error) {
			      
			    }
			});
		});

		$('#next-btn').on('click', function(){
			var pid = $(this).attr('data-rel');
			window.location.href = "<?php echo e(url('photo-details')); ?>/"+pid;
		});
	</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>