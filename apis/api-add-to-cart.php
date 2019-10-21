<?php

ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$sUserId = $_SESSION['sUserId'];
$sUserName = $_SESSION['sUser'];
// $iQuantity = $_GET['quantity'];
$productId = $_GET['id'];


// join orders and users and order_details with products
try {

    include __DIR__.'/api-join-cart-with-user-and-products.php';

    // $stmt = $db->prepare("INSERT INTO cart VALUES (null, :userId, :productId, null, 1)");
    $stmt = $db->prepare("INSERT INTO `cart`(`user_fk`, `product_fk`, `quantity`) VALUES (:userId, :productId, 1)");
    $stmt->bindValue(":userId", $sUserId);
    $stmt->bindValue(":productId", $productId);
    $stmt->execute();

    // header('Location: ../shop.php');

} catch ( PDOException $e){
    echo $e;
    exit;
}
    





    