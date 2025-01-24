<?php

$topics = selectAll(table:'topic');
$i = 0;
foreach($topics as $key => $value){
    if($i === 0){
        
    }
    else{
    $topic = $topics[$key];
    $id = $topic['id'];
    $name = $topic['name'];
    
    echo '<a href="index.php?topic=' . $id . '"><li>' . $name . '</li></a>';    
    }
    $i++;
}
?>