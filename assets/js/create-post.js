function getCookie(name) {
    let match = document.cookie
       .split('; ')
       .find(row => row.startsWith(`${name}=`));
    
    return match ? match.split('=')[1] : undefined;
}
let id = getCookie('id');
$('.create-post').submit(function(event) {
    event.preventDefault();
    var $inputs = $('.create-post').serializeArray();
    $inputs[3] = {name:'id', value: id};
    console.log($inputs);
    $.ajax({
		url: '/assets/php/create-post.php',
		method: 'post',
		dataType: 'html',
		data: $inputs,
		success: function(data){
            data = JSON.parse(data);
			console.log(data);
            if(data.result == 1){
            
            window.location.href = 'index.php';	    
            }else{
                $('.error').html(data.error);
            }
			
		}
	});
});