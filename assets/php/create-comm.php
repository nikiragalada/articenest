<?php
date_default_timezone_set('Asia/Vladivostok'); 
require("db.php");

$id_post = $_POST['id_post'];
$id_user = $_POST['id_user'];
$content = $_POST['content'];
$error = '';
$result = false;

if($content == ''){
$error = 'Поле не может быть пустым!';
}
elseif(mb_strlen($content) > 200){
$error = 'Максимальная длина комментария - 200 символов'; 
}
else{
    //Дата
$_monthsList = array(".01." => "января", ".02." => "февраля", 
".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", 
".07." => "июля", ".08." => "августа", ".09." => "сентября",
".10." => "октября", ".11." => "ноября", ".12." => "декабря");
$currentDate = date("d.m.Y");
$_mD = date(".m.");
$currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);
    $values = [
        'id_post' => $id_post,
        'id_user' => $id_user,
        'content' => $content,
        'created' => $currentDate
    ];
    insert(table:'comment', values:$values);
    $result = true;
}

$answer = [
    'error' => $error,
    'result' => $result
];
echo json_encode($answer);
?>