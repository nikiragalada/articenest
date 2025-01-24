<?php



  $idProfile = $_GET['id'];
  $posts = selectAll(table:'post', params:['id_user' => $idProfile]);
  if($posts == []){
    echo '<p>На данный момент статей нет</p>';
  }
  else{
  krsort(array:$posts);
foreach($posts as $key => $value){
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

}
  }
?>