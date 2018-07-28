<?php $__env->startSection('main'); ?>
<div class="container" style="min-height:400px;">
    <div class="row">
        <h2><?php echo e(trans('messages.utility.upload_photo')); ?></h2>
        <div class="col-md-12">
        	<div id="mydiv"  style="width: 300px; height: 300px; margin: 0 auto;" class="dropzone"></div>
        </div>
        <div id="next-div" class="col-md-12" style="margin-top:10px;margin-bottom:7px;display:none;">
        	<div class="col-md-7">&nbsp;</div>
        	<div class="col-md-5"><button id="next-btn" data-rel="" class="btn btn-pinkbg"><?php echo e(trans('messages.utility.next')); ?></button></div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(url('public/front/js/dropzone.js')); ?>"></script>
	<script type="text/javascript">
		/*$("div#mydiv").dropzone({ 
			url: "<?php echo e(url('uploads')); ?>",
			maxFiles: 1,
			thumbnailWidth: 300,
			thumbnailHeight: 300,
			dictDefaultMessage: "Drop or click here to upload files",
			//maxFilesize: 5,
			//addRemoveLinks: true,
			//directRemoveData: '12',
			accept: function(file, done) {
				//dropzone.removedfile(file);
			    if (file.name == "just.jpg") {
			      done("Naha, you don't.");
			    }
			    else { 
			    	//console.log(file);
			    	done(); 
			    }
			}
		});*/

		var myDropzone = new Dropzone("div#mydiv", { 
			url: "<?php echo e(url('uploads')); ?>",
			maxFiles: 1,
			thumbnailWidth: "<?php echo e($photo_min_width); ?>",
			thumbnailHeight: "<?php echo e($photo_min_height); ?>",
			maxFilesize: "<?php echo e($photo_max_size); ?>",
			dictDefaultMessage: "<?php echo e(trans('messages.upload.drop_or_click_to_upload')); ?>"
		});

		myDropzone.on("complete", function(file) {
		  var fl=0;
		  if(file.height < "<?php echo e($photo_min_height); ?>"){
		  	alert("Image height must be greater then or equal to <?php echo e($photo_min_height); ?>px;");
		  	myDropzone.removeFile(file);
		  	fl = 1;
		  }
		  if(fl == 0 && file.width < "<?php echo e($photo_min_width); ?>"){
		  	alert("Image width must be greater then or equal to <?php echo e($photo_min_width); ?>px;");
		  	myDropzone.removeFile(file);
		  }
		  
		});

		myDropzone.on("success", function(first, second) {
			//console.log(second);
		  response = JSON.parse(second);
		  var photo_id = 0;
		  if(response.success == 1){
		  	photo_id = response.photo_id;
		  	$('#next-btn').attr('data-rel', photo_id);
		  	$('#next-div').show();
		  }
	
		});

		$('#next-btn').on('click', function(){
			var pid = $(this).attr('data-rel');
			window.location.href = "<?php echo e(url('photo-details')); ?>/"+pid;
		})
	</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>