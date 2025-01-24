function getCookie(name) {
    let match = document.cookie
       .split('; ')
       .find(row => row.startsWith(`${name}=`));
    
    return match ? match.split('=')[1] : undefined;
}
  function reload(){
    location.reload();
}
let id = getCookie('id');
let username = getCookie('username');
let email = getCookie('email');
let description = getCookie('description');

function editusername(){
        $('#user-info').css({
            'display' : 'none'
        });
        $('.your-posts').css({
            'display' : 'none'
        });
        $('.edit-username-form').css({
            'display' : 'block'
        });
        $('.edit-username-form').html('<p class="profile-error-message"></p><p>Имя пользователя</p><input maxlength="30" value="' + username + '" name="username"><button type="submit">Изменить</button><button onclick="reload()">Отменить</button>');
    
   
}
function editemail(){
    $('.verify-div').css({
        'display' : 'block'
    });
    $('.verify').submit(function(event){
    event.preventDefault();
    var $inputs = $('.verify').serializeArray();
    var $id = {name: 'id', value:id};
    $inputs[1] = $id;
    console.log($inputs);
    $.ajax({
        url: '/assets/php/verify.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
            data = JSON.parse(data);
			console.log(data);
			if(data.result == 1){
                $('.verify-div').css({
                    'display' : 'none'
                });
                $('#user-info').css({
                    'display' : 'none'
                });
                $('.your-posts').css({
                    'display' : 'none'
                });
                $('.edit-email-form').css({
                    'display' : 'block'
                });
                $('.edit-email-form').html('<p class="profile-error-message"></p><p>Электронная почта</p><input maxlength="40" value="' + email + '" name="email"><button type="submit">Изменить</button><button onclick="reload()">Отменить</button>');
            }else{
                $('.error-verify').css({
                    'display' : 'block'
                });
            }
			}
            
    });
    if(1){
        
    }
    else{
        alert('Неверный пароль!');
    }
})
}

function editdescription(){
    $('#user-info').css({
        'display' : 'none'
    });
    $('.your-posts').css({
        'display' : 'none'
    });
    $('.edit-description-form').css({
        'display' : 'block'
    });
    $('.edit-description-form').html('<p class="profile-error-message"></p><p>Описание</p><textarea class="description" maxlength="149" rows="4" name="description">' + description + '</textarea><button type="submit">Изменить</button><button onclick="reload()">Отменить</button>'); 
}

$('.edit-username-form').submit(function(event){
    event.preventDefault();
    var $inputs = $('.edit-username-form').serializeArray();
    $inputs[1] = {name: 'id', value: id};
    console.log($inputs);
    $.ajax({
		url: '/assets/php/editusername.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
            data = JSON.parse(data);
			console.log(data);
            $('.profile-error-message').html(data.error);
			if(data.result == 1){
                document.cookie = "username=" + data.username + ";max-age=86400";
                reload();
            }
			}
	});
});

$('.edit-email-form').submit(function(event){
    event.preventDefault();
    var $inputs = $('.edit-email-form').serializeArray();
    $inputs[1] = {name: 'id', value: id};
    console.log($inputs);
    $.ajax({
		url: '/assets/php/editemail.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
            data = JSON.parse(data);
			console.log(data);
            $('.profile-error-message').html(data.error);
			if(data.result == 1){
                document.cookie = "email=" + data.email + ";max-age=86400";
                reload();
            }
			}
	});
});

$('.edit-description-form').submit(function(event){
    event.preventDefault();
    var $inputs = $('.edit-description-form').serializeArray();
    $inputs[1] = {name: 'id', value: id};
    console.log($inputs);
    $.ajax({
		url: '/assets/php/editdescription.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
			data = JSON.parse(data);
			console.log(data);
            $('.profile-error-message').html(data.error);
			if(data.result == 1){
                document.cookie = "description=" + data.description + ";max-age=86400";
                reload();
            }
			}
	});
});
