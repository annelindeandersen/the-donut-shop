<?php

// ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$sUserId = $_SESSION['sUserId'];
$sUserName = $_SESSION['sUser'];
$sNewName = $_GET['newName'] ?? '';
$sNewEmail = $_GET['newEmail'] ?? '';
$sNewPhone = $_GET['newPhone'] ?? '';
// $sNewAddress = $_GET['newAddress'] ?? '';
// $sNewCity = $_GET['newCity'] ?? '';

if ( strlen($sNewName) > 0 ) {
    $stmt = $db->prepare('UPDATE users SET full_name = :sNewName WHERE user_id = :sUserId');
    $stmt->bindValue(':sNewName', $sNewName);
    $stmt->bindValue(':sUserId', $sUserId);
    $stmt->execute();
}

if ( strlen($sNewEmail) > 0 ) {
    $stmt = $db->prepare('UPDATE users SET email = :sNewEmail WHERE user_id = :sUserId');
    $stmt->bindValue(':sNewEmail', $sNewEmail);
    $stmt->bindValue(':sUserId', $sUserId);
    $stmt->execute();
}

if ( strlen($sNewPhone) > 0 ) {
    $stmt = $db->prepare('UPDATE users SET phone = :sNewPhone WHERE user_id = :sUserId');
    $stmt->bindValue(':sNewPhone', $sNewPhone);
    $stmt->bindValue(':sUserId', $sUserId);
    $stmt->execute();
}

// if ( strlen($sNewAddress) > 0 ) {
//     $stmt = $db->prepare('UPDATE users SET address = :sNewAddress WHERE user_id = :sUserId');
//     $stmt->bindValue(':sNewAddress', $sNewAddress);
//     $stmt->bindValue(':sUserId', $sUserId);
//     $stmt->execute();
// }

// if ( strlen($sNewCity) > 0 ) {
//     $stmt = $db->prepare('UPDATE users SET city = :sNewCity WHERE user_id = :sUserId');
//     $stmt->bindValue(':sNewCity', $sNewCity);
//     $stmt->bindValue(':sUserId', $sUserId);
//     $stmt->execute();
// }

header('Location: ../profile.php');