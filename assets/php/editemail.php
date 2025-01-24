<?php
require("db.php");
$error = '';

$id = $_POST['id'];
$email = trim($_POST['email']);
$isHaveEmail = selectOne(table:'user', params:['email' => $email]);

if($email == ''){
    $error = 'Поле должно быть заполненым!';
    $result = false;
}
elseif(mb_strlen($email) < 4){
    $error = 'Адрес электронной почты должен быть длиннее 3 символов!';
    $result = false;
}
elseif(mb_strlen($email) > 40){
    $error = 'Слишком длинное значение!';
    $result = false;
}

elseif($isHaveEmail){
    $error = 'Адрес ' . $email . ' уже занят!';
    $result = false;
}
else{
updateById(table:'user', id:$id, params: ['email' => $email]);
$result = true;
}

$answer = [
    'error' => $error,
    'result' => $result,
    'email' => $email
];

echo json_encode($answer);
?>