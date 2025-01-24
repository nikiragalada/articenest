$('body').on('click', '.password-checkbox', function(){
	if ($(this).is(':checked')){
		$('#password-input').attr('type', 'text');
	} else {
		$('#password-input').attr('type', 'password');
	}
});

$('.log-form').submit(function(event) {
    event.preventDefault();
    var $inputs = $('.log-form').serializeArray();
    console.log($inputs);
    $.ajax({
		url: '/assets/php/log.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
			data = JSON.parse(data);
			console.log(data);
			$('.error-log-message').html(data.error);
			if(data.result == 1){
			$(".succes-log-message").fadeIn();
			document.cookie = "id=" + data.id + ";max-age=604800";
			document.cookie = "username=" + data.username + ";max-age=604800";
			document.cookie = "email=" + data.email + ";max-age=604800";
			document.cookie = "description=" + data.description + ";max-age=604800";
			document.cookie = "created=" + data.created + ";max-age=604800";
			window.location.href = 'index.php';	
			}
		}
	});
});