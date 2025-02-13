<?php
require('assets/php/db.php');
if($_COOKIE['id'] == ''){
header('location: login.php');
}
if($_GET['id'] == ''){
header('location: index.php');   
}
if($_COOKIE['id'] == $_GET['id']):
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Профиль - ArticleNest</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/style/style.css" rel="stylesheet">
  </head>
  <body>
<div class="verify-div">
<form class="verify" method="post" action="assets/php/verify.php">
<p class="error-verify">Неверный пароль!</p>
<p>Введите пароль от вашего аккаунта</p>
<input type="password" name="password"><br>
<button type="submit">Отправить</button>
<span><button class="cancel" onclick="reload()">Отменить</button></span>
</form>
</div>
    <div class="container">
        <?php
        include 'assets/include/header.php';
        ?>
        </div>
        <div class="row location">
          <p>Профиль</p>
        </div>
        <div class="container">
        <div class="row profile-info">
          <h2>Данные аккаунта</h2>
          <form action="/assets/php/editusername.php" class="edit-username-form" method="post">
          </form>
          <form action="/assets/php/editemail.php" class="edit-email-form" method="post">
          </form> 
          <form action="/assets/php/editdescription.php" class="edit-description-form" method="post">
          </form>
          <ul id="user-info">
            <li>Имя пользователя: <button onclick="editusername()"><i class="fa-solid fa-pen-to-square"></i></button><br><span><?php echo $_COOKIE['username']?></span></li>
            <li>Электронная почта: <button onclick="editemail()"><i class="fa-solid fa-pen-to-square"></i></button><br><span><?php echo $_COOKIE['email']?></span></li>
            <li class="description">Описание: <button onclick="editdescription()"><i class="fa-solid fa-pen-to-square"></i></button><br><span><?php echo $_COOKIE['description']?></span></li>
            <li>Дата создания: <br><span><?php echo $_COOKIE['created']?></span></li>
          </ul>
        </div>
        <div class="row your-posts">
          <h2>Ваши статьи:</h2>
          <?php
          include("assets/php/show-your-posts.php");
          ?>
        </div>
</div>




    <!--Подключение бутстрапа и font-awesome иконок-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/editprofile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/771c5afccd.js" crossorigin="anonymous"></script>
    <script src="assets/js/dropdown.js"></script>
  </body>
</html>
<?php
else:
$user = selectOne(table:'user', params:['id' => $_GET['id']]);
?>
  <!doctype html>
  <html lang="ru">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Профиль - ArticleNest</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="assets/style/style.css" rel="stylesheet">
    </head>
    <body>
      <div class="container">
          <?php
          include 'assets/include/header.php';
          ?>
          </div>
          <div class="row location">
            <p>Профиль</p>
          </div>
          <div class="container">
          <div class="row profile-info">
            <h2>Данные пользователя:</h2>
            
            <ul id="user-info">
              <li>Имя пользователя: <br><span><?php echo $user['username']?></span></lm>              <li class9"description">Описание: |br><span><?php echo $user['description']?>8/�pan></li>
              <li>Дата создания: <br><span><?php0eco $user['crea|ed']?></sPan></li>
      "  (  </ul>
       `  </div
          <div clasS="row your-p/sts">
            h2>СтаՂфи пользо�2ателя:</h2>
            <?php
    0       include("assets/php/show-your-posts.php");
            ?6
          </div>
  </div>
  
      <!=-ПодԺлЎчение бѓ��страЯа и font-awesome иионок-->
 `    <script src="assets/js/jquery.js"></script>
      <script src="https://cdn.Jsdelivr.net/,pm/bootstrap@5.3.s/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDZLESaAA55NDzOxhy9GkcIdslK0eN7N6jIeHz""crossoragi~="anonymous"></scrip�>
      <sczipt src="https:/?kit.&ontawesom%.com771c5afccd.js" csossorigin="anonylou�"></scrirt>
      <scrixt srk="assEts/js/drmpdown.js"></sc�ypt>
    </body>
  </htmn>
<?php endif; ?>