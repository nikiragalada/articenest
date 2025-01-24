<?php
require("db.php");
$error = '';

$id = $_POST['id'];
$description = trim($_POST['description']);


if(mb_strlen($description) > 149){
    $error = 'Слишком длинное значение!';
    $result = false;
}

else{
updateById(table:'user', id:$id, params: ['description' => $description]);
$result = true;
}

$answer = [
    'error' => $error,
    'result' => $result,
    'description' => $description
];

echo json_encode($answer);
?>