<?php 

$id = $_GET['id'];

$comments = selectAll(table:'comment', params:['id_post' => $id]);
krsort(array:$comments);
$lenght = count($comments);
echo '<h2>Комментарии(' . $lenght . ')</h2>';
foreach($comments as $key => $value){
    $comment = $comments[$key];
    $userId = $comment['id_user'];
    $username = selectOne(table:'user', params:['id' => $userId])['username'];
    $created = $comment['created'];
    $content = $comment['content'];
    echo '
    <div class="single-comm row">

              <p class="title-last-post">' . $content . '</p>
              <a class= title="Перейти в профиль" href="profile.php?id=' . $userId . '"><i class="fa-solid fa-user"></i> ' . $username . '</a>
              
              <p><i class="fa-regular fa-calendar"></i> ' . $created . '</p>

            </div>
    ';

}
?>