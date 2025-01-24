<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация - ArticleNest</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/style/style.css" rel="stylesheet">
  </head>
  <body>

    <div class="container-fluid login-container">
        
            <h2>Регистрация</h2>
            <form action="/assets/php/reg.php" class="reg-form container" method="post">
                
                <p class="error-reg-message"></p>
                <label>
                    <p>Имя пользователя</p>
                    <input maxlength="30" name="username" type="text">
                    
        
                </label>
                <label>
                    <p>Электронная почта</p>
                    <input maxlength="40" name="email" type="email">
                    
        
                </label>
                <label>
                    <p>Пароль</p>
                    <input id="password-input" maxlength="40" name="password" type="password">
                    
                    <input type="checkbox" class="password-checkbox"><span>  <i class="fa-regular fa-eye"></i></span>
                </label>
                
                <label>
                    <p>Потверждение пароля</p>
                    <input id="confirm-password-input" maxlength="40" name="confirmPassword" type="password" placeholder="Повторите пароль">
                    
                 <input type="checkbox" class="confirm-password-checkbox"><span>  <i class="fa-regular fa-eye"></i></span>   
                </label>
                
                <button type="submit">Зарегистрироваться</button>
                <p class="succes-reg-message">Успешная регистрация!</p>
                <span class="register-a"><a href="login.php">Войти</a></span>
            </form>

    </div>

    <!--Подключение бутстрапа и font-awesome иконок-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/reg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/771c5afccd.js" crossorigin="anonymous"></script>

  </body>
</html>