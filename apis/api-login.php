<?php

ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$errorMessage = "Email and/or password invalid";

if ( isset($_POST['submit']) ) {
    
    if (empty ($_POST['email']) || empty ($_POST['password']) ) {
        echo $errorMessage; 
        exit;
    }
}

$sEmail = $_POST['email'] ?? '';
$sPassword = $_POST['password'] ?? '';

$stmt = $db->prepare("SELECT * FROM users WHERE email=:sEmail");
$stmt->bindValue(':sEmail', $sEmail);
$stmt->execute();

$aRow = $stmt->fetch();

if ( count($aRow) > 0 ) {
    
        if( password_verify($sPassword, $aRow->password) ){
            // set user session data
            $_SESSION['sUserId'] = $aRow->user_id;
            $_SESSION['sUser'] = $aRow->full_name;
            $_SESSION['sPassword'] = $aRow->password;
            $_SESSION['sEmail'] = $aRow->email;

            $_SESSION['loginMessage'] = "Logged in as $aRow->full_name";
            header('location:../shop.php');
            exit;
        }

    echo '<h1>Password incorrect</h1>';
    exit;
    
}

echo '<h1>No user with that email</h1>';
