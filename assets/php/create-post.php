<?php 
date_default_timezone_set('Asia/Vladivostok');
require("db.php");
$error = '';

$id_user = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$topic = $_POST['topic'];

if($title == '' || $content == ''){
    $error = 'Заполните все поля!';
    $result = false;
}
elseif(mb_strlen($title) < 4 || mb_strlen($content) < 4){
    $error = 'Поля должны содержать более трёх символов!';
    $result = false;
}
elseif(mb_strlen($title) > 45){
    $error = 'Максимальная длина заголовка - 45 символов';
    $result = false;
}
else{
    $_monthsList = array(".01." => "января", ".02." => "февраля", 
".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", 
".07." => "июля", ".08." => "августа", ".09." => "сентября",
".10." => "октября", ".11." => "ноября", ".12." => "декабря");
$currentDate = date("d.m.Y");
$_mD = date(".m.");
$currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);

    insert(table:'post', values:[
        'id_user' => $id_user,
        'title' => $title,
        'content' => $content,
        'topic' => $topic,
        'views' => 0,
        'created' => $currentDate
    ]);
$result = true;
}
$answer = [
'error' => $error,
'result' => $result
];
echo json_encode($answer);
?>