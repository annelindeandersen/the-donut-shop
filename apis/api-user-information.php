<?php

// ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$sUserId = $_SESSION['sUserId'];
$sUserName = $_SESSION['sUser'];

$stmt = $db->prepare('SELECT * FROM users WHERE user_id LIKE :sUserId');
$stmt->bindValue(':sUserId', $sUserId);
$stmt->execute();
$sUserInfo = $stmt->fetch();

echo "
<div><h3>Full name: </h3><p>$sUserInfo->full_name</p></div><br>
<div><h3>E-mail: </h3><p>$sUserInfo->email</p></div><br>
<div><h3>Phone: </h3><p>$sUserInfo->phone</p></div><br>
";

?>

<!-- <div><h3>Full name: </h3><p>$sUserId->full_name</p></div><br>
<div><h3>E-mail: </h3><p>$sUserId->email</p></div><br> -->