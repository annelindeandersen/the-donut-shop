<?php

ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$sUserId = $_SESSION['sUserId'];
$sUserName = $_SESSION['sUser'];
$sTime = $_GET['pickup_time'];
$orderId = $_GET['id'];

$db->beginTransaction();

// insert the order
$stmt = $db->prepare('INSERT INTO orders VALUES (null, :sUserId, null, :sTime )');
$stmt->bindValue(':sUserId', $sUserId);
$stmt->bindValue(':sTime', $sTime);


if ( !$stmt->execute() ) {
    echo 'Cannot complete order. Error code: '.__LINE__;
    $db->rollBack();
    exit;
}

$lastInsertId = $db->lastInsertId();

// insert the correct order number in order_details by changing in the cart
$stmt = $db->prepare('UPDATE cart
SET cart.quantity = :lastInsertId
WHERE cart.user_fk = :sUserId');
$stmt->bindValue(':lastInsertId', $lastInsertId);
$stmt->bindValue(':sUserId', $sUserId);

if ( !$stmt->execute() ) {
    echo 'Cannot complete order. Error code: '.__LINE__;
    $db->rollBack();
    exit;
}

// insert cart products into order details
$stmt = $db->prepare('INSERT INTO order_details
SELECT cart.quantity, cart.cart_id, cart.user_fk, cart.product_fk FROM cart
WHERE cart.user_fk = :sUserId');
$stmt->bindValue(':sUserId', $sUserId);

if ( !$stmt->execute()) {
    echo 'Cannot complete order. Error code: '.__LINE__;
    $db->rollBack();
    exit;
}

// $stmt = $db->prepare('UPDATE order_details, orders
// SET order_details.order_fk = orders.order_id 
// WHERE orders.pickup_time LIKE :sTime');
// $stmt->bindValue(':sTime', $sTime);


// delete cart products
$stmt = $db->prepare('DELETE FROM cart WHERE user_fk = :sUserId');
$stmt->bindValue(':sUserId', $sUserId);

if ( !$stmt->execute() ) {
    echo 'Cannot complete order. Error code: '.__LINE__;
    $db->rollBack();
    exit;
}


$db->commit();


header('Location: ../cart.php');

// echo "
// <div><h3>Full name: </h3><p>$sUserInfo->full_name</p></div><br>
// <div><h3>E-mail: </h3><p>$sUserInfo->email</p></div><br>
// <div><h3>Phone: </h3><p>$sUserInfo->phone</p></div><br>
// ";

?>