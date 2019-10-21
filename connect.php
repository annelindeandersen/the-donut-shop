<?php

try{

    $sUserName = 'lindedesign_dk';
    $sPassword = 'pmz49asd';
    $sConnection = "mysql:host=mysql50.unoeuro.com; dbname=lindedesigns_dk_db; charset=utf8mb4";

    $aOptions = array(
        // PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        // FETCH OBJ gets the json object instead of associative array
    );
    $db = new PDO( $sConnection, $sUserName, $sPassword, $aOptions );
}catch( PDOException $e){
    echo $e;
    echo '{"status":0,"message":"cannot connect to database"}';
    exit();
}
