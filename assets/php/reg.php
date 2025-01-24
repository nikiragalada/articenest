<?php
date_default_timezone_set('Asia/Vladivostok');
//Подключение к БД
require("db.php");
$error = '';
$isHaveUsername = '';
$isHaveEmail = '';
$description = '';
//Получение значений от пользователя
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

//Переменные для проверки на повторение со значениями в БД
$isHaveUsername = selectOne(table:'user', params:['username' => $username]);
$isHaveEmail = selectOne(table:'user', params:['email' => $email]);

//Проверки
if($username == '' || $email == '' || $password == '' || $confirmPassword == ''){
    $error = 'Необходимо заполнить все поля!';
    $result = false;
}
elseif(mb_strlen($username) < 4 || mb_strlen($email) < 4 || mb_strlen($password) < 4){
    $error = 'Email, имя пользователя и пароль должны быть длиннее 3 символов!';
    $result = false;
}
elseif(mb_strlen($username) > 30 || mb_strlen($email) > 40){
    $error = 'Слишком длинное значение!';
    $result = false;
}
elseif($isHaveUsername){
    $error = 'Имя пользователя ' . $username . ' уже занято!';
    $result = false;
}
elseif($isHaveEmail){
    $error = 'Адрес ' . $email . ' уже занят!';
    $result = false;
}
elseif($password !== $confirmPassword){
    $error = 'Пароли не совпадают!';
    $result = false;
}
else{

//Проверки пройдены, записываем значения в БД

//Дата
$_monthsList = array(".01." => "января", ".02." => "февраля", 
".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", 
".07." => "июля", ".08." => "августа", ".09." => "сентября",
".10." => "октября", ".11." => "ноября", ".12." => "декабря");
$currentDate = date("d.m.Y");
$_mD = date(".m.");
$currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);

//Хэширование пароля
$password = password_hash($password, algo:PASSWORD_DEFAULT);

$values = [
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'description' => $description,
    'created' => $currentDate
];
$id = insert(table:'user', values:$values);
$result = true;
}

//Вывод ошибки, если она существует
$answer = [
    'error' => $error,
    'result' => $result,
];
if($result == true){
    $answer['id'] = $id;
    $answer['username'] = $username;
    $answer['email'] = $email;
    $answer['description'] = $description;
    $answer['created'] = $currentDate;
}
echo json_encode($answer);

?>

