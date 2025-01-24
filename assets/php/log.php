<?php
//Подключение к БД
require("db.php");
$error = '';
$result = '';

//Получение значений от пользователя
$inputemail = trim($_POST['email']);
$password = $_POST['password'];

//Переменная с данными о пользователе
$user = selectOne(table:'user', params:['email' => $inputemail]);
//Проверки
if($inputemail == '' || $password == ''){
    $error = 'Необходимо заполнить все поля!';
    $result = false;
}
elseif(!$user){
    $error = 'Неверный адрес или пароль!';
    $result = false;   
}
elseif(password_verify($password, $user['password'])){
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $description = $user['description'];
    $created = $user['created'];
    $result = true;
}
else{
    $error = 'Неверный адрес или пароль!';
    $result = false;
}

//Вывод ошибки, если она существует
$answer = [
    'error' => $error,
    'result' => $result
];
if($result == true){
    $answer['id'] = $id;
    $answer['username'] = $username;
    $answer['email'] = $email;
    $answer['description'] = $description;
    $answer['created'] = $created;
}
echo json_encode($answer);
?>

