
$('body').on('click', '.password-checkbox', function(){
	if ($(this).is(':checked')){
		$('#password-input').attr('type', 'text');
	} else {
		$('#password-input').attr('type', 'password');
	}
});

$('body').on('click', '.confirm-password-checkbox', function(){
	if ($(this).is(':checked')){
		$('#confirm-password-input').attr('type', 'text');
	} else {
		$('#confirm-password-input').attr('type', 'password');
	}
});

$('.reg-form').submit(function(event) {
    event.preventDefault();
    var $inputs = $('.reg-form').serializeArray();
    console.log($inputs);
    $.ajax({
		url: '/assets/php/reg.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
			data = JSON.parse(data);
			console.log(data);
			$('.error-reg-message').html(data.error);
			if(data.result == 1){
			$(".succes-reg-message").fadeIn();
			document.cookie = "email=" + data.email + ";max-age=604800";
			window.location.href = 'login.php';	
			}
			
			
			
		}
	});
});
