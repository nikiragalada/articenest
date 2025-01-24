<?php
require("db.php");

$password = $_POST['password'];
$id = $_POST['id'];
$user = selectOne(table:'user', params:['id' => $id]);

if(password_verify($password, $user['password'])){
    $result = true;
}else{
    $result = false;  
}

$answer = [
    'result' => $result
];

echo json_encode($answer);

?>