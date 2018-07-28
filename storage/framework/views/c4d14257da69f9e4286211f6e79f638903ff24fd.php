<?php $__env->startSection('main'); ?>
<div class="container" style="min-height:400px;">
    <div class="row">
        <h2>Upload Photo</h2>
        <div class="col-md-12">
        	<div id="mydiv"  style="width: 300px; height: 300px; margin: 0 auto;" class="dropzone"></div>
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
			thumbnailWidth: 300,
			thumbnailHeight: 300,
			dictDefaultMessage: "Drop or click here to upload files"
		});

		myDropzone.on("complete", function(file) {
		  var fl=0;
		  if(file.height < 300){
		  	alert("Image height must be greater then or equal to 300px;");
		  	myDropzone.removeFile(file);
		  	fl = 1;
		  }
		  if(fl == 0 && file.width < 300){
		  	alert("Image width must be greater then or equal to 300px;");
		  	myDropzone.removeFile(file);
		  }
		  
		});
	</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>