<?php

require_once('env.php');

// /**
//  * データベースコネクション
//  * @return $pdo -> 接続成功
//  */
function dbh(){

    $dbhost = DB_HOST;
    $dbname = DB_NAME;
    $dbuser = DB_USER;
    $dbpassword = DB_PASS;
    $dbn = "mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4";

    try{
        $pdo = new PDO($dbn,$dbuser,$dbpassword,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        // return $pdo;
        return $pdo;

    } catch(PDOexception $e){
        echo $e->getMessage();
        exit();
    }

}
?>