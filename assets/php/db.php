<?php
$driver = 'mysql';
$host = 'localhost';
$db_name = 'articlenest';
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'uft8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try{
    $pdo = new PDO(
        dsn:"$driver:host=$host;dbname=$db_name;charset = $charset",username:$db_user, password:$db_pass, options:$options
);

}catch(PDOException $i){
    die("Ошибка при подключении к базе данных");
}

//Красиво выводить значение
function pt($value){
   echo '<pre>';
    print_r($value);
    echo '</pre>';
}

//Проверка выполнения запроса
function checkError($query){

    $errorinfo = $query->errorInfo();

    if($errorinfo[0] !== PDO::ERR_NONE){
        echo $errorinfo[2];
        exit();
    }
}

//Запрос на получение данных из выбранной таблицы
function selectAll($table, $params = []){
    //Необходимо добавлять при работе с пдо
    global $pdo;

    //Запись запроса в переменную
    $sql = "SELECT * FROM $table";

     //Добавление кавычек в нечисловые элементы и добавление WHERE и AND к запросу 
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'$value'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    
    //Подготовка и выполнение запроса
    $query = $pdo->prepare($sql);
    $query->execute();
    checkError($query);
    return $query->fetchAll();
}

//Тот же самый запрос на получение данных из таблицы,но только 1 пользователя
function selectOne($table, $params = []){
    //Необходимо добавлять при работе с пдо
    global $pdo;

    //Запись запроса в переменную
    $sql = "SELECT * FROM $table";

    //Добавление кавычек в нечисловые элементы и добавление WHERE и AND к запросу 
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'$value'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";   
    
    //Подготовка и выполнение запроса
    $query = $pdo->prepare($sql);
    $query->execute();
    checkError($query);
    return $query->fetch();
}

//Запись в таблицу БД
function insert($table, $values){
    
global $pdo;

$str1 = "";
$str2 = "";
$i = 0;

foreach($values as $key => $value){
    if($i === 0){
    $str1 = $str1 . "$key";
    $str2 = $str2 . "'$value'";
    }
    else{
    $str1 = $str1 . ", $key";
    $str2 = $str2 . ", '$value'";
    }
    
    $i++;
};
//Запрос
$sql = "INSERT INTO $table ($str1) VALUES ($str2)";

$query = $pdo->prepare($sql);
$query->execute();
checkError($query);

return $pdo->lastInsertId();
}

function updateById($table,$id,$params = []){
    global $pdo; 
    $i = 0;
    $str = "";
    foreach($params as $key => $value){
        if($i === 0){
            $str = "$key = '$value'";
        }
        else{
            $str = $str . ", $key = '$value'";
        }
        
        $i++;
    };

    $sql = "UPDATE $table SET $str WHERE id = $id";
   
    $query = $pdo->prepare($sql);
    $query->execute();
    checkError($query);
}

//Функция удаления строки из таблицы через обращение по id
function deleteById($table, $id){
    
    global $pdo;
    
    //Запрос
    $sql = "DELETE FROM $table WHERE id = $id";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    checkError($query);
    
    };
//Функция аунтефикации пользователя

?>