<?php

// ini_set('display_errors', 1);

// session_start();

require_once __DIR__.'/../connect.php';

$sUserId = $_SESSION['sUserId'];
$sUserName = $_SESSION['sUser'];

try {
    // $stmt = $db->prepare("SELECT cart.cart_id, '$sUserId', '$sUserName', cart.quantity, cart.date, products.product, products.price_fk FROM users
    // INNER JOIN cart ON users.user_id = cart.user_fk
    // INNER JOIN products ON cart.product_fk = products.product_id
    // ORDER BY cart.cart_id ASC");
    // $stmt->execute();

    $stmt = $db->prepare("CALL joinCartWithUserAndProducts( :id, :name)");
    $stmt->bindParam(':id', $sUserId);
    $stmt->bindParam(':name', $sUserName);
    $stmt->execute();

} catch (PDOException $e) {
    echo $e;
    exit;
}