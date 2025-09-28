<?php
if($_COOKIE['id'] == ''){
header('location: login.php');
}
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная - ArticleNest</title>
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
          <p>Главная</p>
        </div>
  <div class="container main">
    <div class="row">
        <div class="col-md-8 col-12">


          <?php include('assets/php/show-last-posts.php')?>

        </div>
        <div class="col-md-4 col-12 sidebar">
          <div class="section search">
            <h2>Поиск</h2>
            <form class="search">
              <input value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" name="inputsearch" placeholder="Введите заголовок статьи">
            </form>
          </div>
          <div class="section topics">
          <h2>Категории</h2>
            <ul>
            <?php include("assets/php/topics-sidebar.php")?>
            </ul>
          </div>
        </div>  
</div>
  </div>
<?php include('assets/include/footer.php'); ?>
    <!--Подключение бутстрапа и font-awesome иконок-->
    <script src="assets/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/771c5afccd.js" crossorigin="anonymous"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/search.js"></script>
  </body>
</html>

