function getCookie(name) {
    let match = document.cookie
       .split('; ')
       .find(row => row.startsWith(`${name}=`));
    
    return match ? match.split('=')[1] : undefined;
}
let id_user = getCookie('id');
let id_post = $('#title-post').html();

$('.write').submit(function(event) {
    event.preventDefault();
    var $inputs = $('.write').serializeArray();
    $inputs[1] = {name:'id_user', value: id_user};
    $inputs[2] = {name:'id_post', value: id_post};
    console.log($inputs);
    $.ajax({
		url: '/assets/php/create-comm.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
            data = JSON.parse(data);
			console.log(data);
            if(data.result == 1){
                location.reload();	    
            }else{
                $('.error-comm').html(data.error);
            }
			
		}
	});
});