$(document).ready(function(){
	var base_url = '/api/';

	$(".change-lang").click(function(){
		var lang = $(this).attr('value');
		$.ajax({
			method:'get',
			url:base_url+'setLocale/'+lang,
			success:function(){
				window.location.href=window.location.pathname;
			}
		});

	});
});