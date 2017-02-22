$(document).ready(function(){
	$('.result_msg, .error_msg').delay(2000).slideUp();

	$('a.del').click(function(){
		if(!window.confirm('Bạn có muốn xóa không?')){
			return false;
		}
	})
});

