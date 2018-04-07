<?php

try{
    $connect = new PDO('mysql:host=127.0.0.1; dbname=pdodata', 'root', '' );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    //echo $e->getMessage();
    die();
}

//fetch all
$query = $connect->query('SELECT * FROM pdovalues');
while($row = $query->fetch()){
    echo $row['user_name']."<br>";
}

//avoid sql injection (string escape)
$myValue = "John";
$sql = "INSERT INTO pdovalues (user_name) VALUES (:user_name)";
$sql_query = $connect->prepare($sql);
$sql_query->execute(array(
    ':user_name' => $myValue,
));


//pdo fetch - only user_name column values
$query_fetch = $connect->query("SELECT * FROM pdovalues");
while($row = $query_fetch->fetch(PDO::FETCH_OBJ)){
    echo "------------";
    echo $row->user_name."<br>";
}

//get row count
$query_count = $connect->query("SELECT * FROM pdovalues");
if($query_count->rowCount()){
    echo $query_count->rowCount();
}else{
    echo "no result";
}

 //pdo update
    $sql_update = $connect->prepare("UPDATE pdovalues SET user_like=? WHERE id=?");
    $sql_update->execute(array("3","26"));
