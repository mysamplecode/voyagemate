$(document).ready(function(){
	$("#dataTableBuilder").on("click", ".edit_meta", function(){
	  	var id          = this.id;
	  	var url         = APP_URL+'/admin/edit_meta';
		$.ajax({
      		type: "POST",
      		url: url,
      		data: {'id':id,method:'get_meta'},
      		dataType:'JSON',
      		async: false,
	      	success: function(msg) {
		         if(msg.status_check==1){
		            $('.edit_id').val(msg.id);
		            $('#input_url').val(msg.url);
		            $('#input_title').val(msg.title);
		            $('#input_description').val(msg.description);
		            $('#input_keywords').val(msg.keywords);
		         }
	      	},
	      	error: function(request, error) {
	        	console.log(error);
	      	}
	  	});
	});
	$("#update_meta").on("click", function(){

	  var edit_id     = $('.edit_id').val();
	  var page_url    = $('#input_url').val();
	  var title       = $('#input_title').val();
	  var description = $('#input_description').val();
	  var keywords    = $('#input_keywords').val();
	  var url         = APP_URL+'/admin/edit_meta';
	  $.ajax({
	      type: "POST",
	      url: url,
	      data: {'edit_id':edit_id,'url':page_url,'title':title,'description':description,'keywords':keywords,method:'update_meta'},
	      dataType:'JSON',
	      async: false,
	      success: function(msg) {
	         if(msg.status_check==1){
	            $('.edit_id').val(msg.id);
	            $('#input_url').val(msg.url);
	            $('#input_title').val(msg.title);
	            $('#input_description').val(msg.description);
	            $('#input_keywords').val(msg.keywords);
	            $('#meta_message').css({'display':'block','text-align':'center'});
	            $('#meta_message').html(msg.message);
	         }else{
	            $('#meta_message').css({'display':'none','text-align':'center'});
	            $('.input_url').html(msg.url);
	            $('.input_title').html(msg.title);
	            $('.input_description').html(msg.description);
	            $('.input_keywords').html(msg.keywords);
	            
	         }
	      },
	      error: function(request, error) {
	          console.log(error);
	      }
	  });
	});
});