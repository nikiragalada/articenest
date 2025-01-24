<?php
require("db.php");
$error = '';

$id = $_POST['id'];
$username = trim($_POST['username']);
$isHaveUsername = selectOne(table:'user', params:['username' => $username]);

if($username == ''){
    $error = 'Поле должно быть заполненым!';
    $result = false;
}
elseif(mb_strlen($username) < 4){
    $error = 'Имя пользователя должно быть длиннее 3 символов!';
    $result = false;
}
elseif(mb_strlen($username) > 30){
    $error = 'Слишком длинное значение!';
    $result = false;
}

elseif($isHaveUsername){
    $error = 'Имя пользователя ' . $username . ' уже занято!';
    $result = false;
}
else{
updateById(table:'user', id:$id, params: ['username' => $username]);
$result = true;
}

$answer = [
    'error' => $error,
    'result' => $result,
    'username' => $username
];

echo json_encode($answer);
?>