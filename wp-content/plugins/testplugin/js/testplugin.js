jQuery(function($){

	$('.deletebutton').click(function(){
		var post_id = jQuery(this).data('id');
		
		$.ajax({
			url: ajaxurl.thang,
			type: 'POST',
			data: {
				action: 'delete_post',
				postid: post_id
			},
			success : function(data){
				window.location.reload();
				//$("'#post"+post_id+"'").remove();
			},
			error : function(error){
				console.log('error');
			}
		});
	});
});