<?php
require("db.php");
$result = false;
$id_post = $_POST['id_post'];
$post = selectOne(table:'post', params:['id' => $id_post]);
if($post == []){
    $result = false;
}
else{

$title = $post['title'];
$content = $post['content'];
$topicId = $post['topic'];
$userId = $post['id_user'];
$views = $post['views'];
$created = $post['created'];
$topic = selectOne(table:'topic', params:['id' => $topicId])['name'];
$username = selectOne(table:'user', params:['id' => $userId])['username'];
    $result = true;
}



$answer = [
'result' => $result
];
if($result){
$answer['title'] = $title;
$answer['content'] = $content;  
$answer['username'] = $username;  
$answer['topic'] = $topic;
$answer['views'] = $views; 
$answer['created'] = $created; 
}

echo json_encode($answer);

?>