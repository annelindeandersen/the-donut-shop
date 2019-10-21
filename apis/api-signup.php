<?php

ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$sFullName = $_POST['fullname'];
$sEmail = $_POST['email'];
$sPassword = $_POST['password'];
$sPasswordHash = password_hash($sPassword, PASSWORD_DEFAULT);
$sPhone = $_POST['phone'];


try {

    // check if username is already in database
    $stmt = $db->prepare(" SELECT * FROM users WHERE email='$sEmail' ");
    $stmt->execute();

    $aRows = $stmt->fetchAll();
    // if rows returned are more than 0, then we know the username already exist
    if( count($aRows) > 0 ){
        foreach($aRows as $aRow){
            echo 'Sorry email already exists in database.';
            // header('location:../index.php');
            exit;
        }
        
    }else{

    $stmt = $db->prepare("INSERT INTO users VALUES (null, :fullName, :email, :phone, :password, '0')");
    $stmt->bindValue(':fullName', "$sFullName");
    $stmt->bindValue(':email', "$sEmail");
    $stmt->bindValue(':password', "$sPasswordHash");
    $stmt->bindValue(':phone', "$sPhone");
    $stmt->execute();

    echo 'successfull sign up';
    
    }

} catch( PDOEXception $ex){
    echo $ex;
}