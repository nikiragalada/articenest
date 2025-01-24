<?php
if($_COOKIE['id'] == ''){
header('location: login.php');
}
if($_GET['id'] == ''){
header('location: index.php'); 
}
session_start();
require("assets/php/db.php");
$idusera = selectOne(table:'post', params:['id' => $_GET['id']])['id_user'];
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Статья - ArticleNest</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/style/style.css" rel="stylesheet">
  </head>
  <body>
    <p id="title-post"><?php echo $_GET['id']?></p>
  <div class="container">
        <?php
        include 'assets/include/header.php';
        ?>
  </div>
        <div class="row location">
          <p>Просмотр статьи</p>
        </div>
    <div class="container">
        <div class="row post-div">
            <div class="post-main">
                <h2></h2>
                <p class="post-content"></p>  
            </div>
            <div class="post-info">
              <a title="Посмотреть профиль" href="profile.php?id=<?php echo $idusera; ?>"><p class="post-username"><i class="fa-solid fa-user"></i><span></span></p></a>
              <p class="post-topic"><i class="fa-solid fa-list"></i><span></span></p>
              <p class="post-created"><i class="fa-regular fa-calendar"></i><span></span></p>
              <p class="post-views"><i class="fa-solid fa-eye"></i><span></span></p>
            </div>
            
        </div>
        <div class="row comments">
          <form class="write" action="assets/php/create-comm.php" method="post">
            <p class="error-comm"></p>
            <h2>Написать комментарий</h2>
            <textarea name="content" rows="4"></textarea>
            <button type="submit">Отправить</button>
          </form>
          <div class="other-comments">

            <?php 
            include("assets/php/show-comments.php")
            ?>
            
          </div>
          
        </div>
    </div>
    <!--Подключение бутстрапа и font-awesome иконок-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/show-post.js"></script>
    <script src="assets/js/create-comm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/771c5afccd.js" crossorigin="anonymous"></script>
    <script src="assets/js/dropdown.js"></script>
    <?php
    if(!isset($_SESSION[$_GET['id'] . 'view'])){
      $views = selectOne(table:'post', params:['id' => $_GET['id']])['views'];
      $views = $views + 1;
      updateById(table:'post', id:$_GET['id'], params:['views' => $views]);
      $_SESSION[$_GET['id'] . 'view'] = 1;
    }
    ?>
  </body>
</html>