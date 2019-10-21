<?php

ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

// $iQuantity = $_GET['quantity'];
$productId = $_GET['id'];

try {

    include __DIR__.'/api-join-cart-with-user-and-products.php';

    $stmt = $db->prepare("DELETE FROM cart WHERE product_fk LIKE :productId LIMIT 1");
    $stmt->bindValue(":productId", $productId);
    $stmt->execute();

} catch ( PDOException $e){
    echo $e;
    exit;
}