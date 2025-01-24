<?php
require("db.php");
$i = 0;
if(isset($_GET['topic'])){
  $idTopic = $_GET['topic'];
  $topicName = selectOne(table:'topic', params:['id' => $idTopic])['name'];
  $posts = selectAll(table:'post', params:['topic' => $idTopic]);
  echo '<h2>Категория: ' . $topicName . '</h2>';
  if($posts == []){
    echo 'Статей с такой категорией пока-что нет!';
  }
}

elseif(isset($_GET['search'])){
  $search = $_GET['search'];
  $posts = selectAll(table:'post', params:['title' => $search]);
  echo '<h2>Результаты по запросу: ' . $search . '</h2>';
  if($posts == []){
    echo 'Ничего не найдено!';
  }
}

else{
$posts = selectAll(table:'post');
echo '<h2>Последние статьи</h2>';
}
krsort(array:$posts);
foreach($posts as $key => $value){
  if($i > 50){
      break;
  }
  $singlepost = $posts[$key];
  $id = $singlepost['id'];
  $id_user = $singlepost['id_user'];
  $title = $singlepost['title'];
  $views = $singlepost['views'];
  $topicId = $singlepost['topic'];
  $views = $singlepost['views'];
  $created = $singlepost['created'];

  $topic = selectOne(table:'topic',params:['id' => $topicId]);
  $topicName = $topic['name'];
  
  $user = selectOne(table:'user', params:['id' => $id_user]);
  $username = $user['username'];

  
      echo 
      '<a class="row last-post" href="single-post.php?id=' . $id . '">
      <div class="col-md-8 col-12">
        <p class="title-last-post">' . $title . '</p>
      </div>
      <div class="col-md-4 col-12">
        <p><i class="fa-solid fa-user"></i> ' . $username . '</p>
        <p><i class="fa-solid fa-list"></i> ' . $topicName . '</p>
        <p><i class="fa-regular fa-calendar"></i> ' . $created . '</p>
        <p><i class="fa-solid fa-eye"></i> ' . $views . '</p>
      </div>
    </a>';
  $i++;
}
?>