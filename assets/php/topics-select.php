<?php
require("db.php");

$topics = selectAll(table:'topic');

foreach($topics as $key => $value){
    $topic = $topics[$key];
    $id = $topic['id'];
    $name = $topic['name'];
    
    echo '<option value="' . $id . '">' . $name . '</option>';
}
?>