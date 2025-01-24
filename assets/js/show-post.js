id_post = $('#title-post').html();
console.log(id_post);
$.ajax({
    url: '/assets/php/show.php',
    method: 'post',
    dataType: 'html',
    data: [{name:'id_post', value:id_post}],
    success: function(data){
        data = JSON.parse(data);
        if(data.result == 1){
        console.log(data); 
        $('.post-div h2').html(data.title);
        $('.post-content').html(data.content);
        $('.post-username span').html(' ' + data.username);
        $('.post-topic span').html(' ' + data.topic);
        $('.post-created span').html(' ' + data.created);
        $('.post-views span').html(' ' + data.views);
        }
        else{
            window.location.href = 'index.php';
        }
        
    }
});