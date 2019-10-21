<?php

// ini_set('display_errors', 1);

// session_start();

require_once __DIR__.'/../connect.php';

try {
    $stmt = $db->prepare("
    SELECT products.product, products.price_fk, prices.price, prices.price_id FROM products
    INNER JOIN prices ON products.price_fk = prices.price_id
    ");
    $stmt->execute();
    $prices = $stmt->fetchAll();
    // echo 'works';
} catch (PDOException $e) {
    echo $e;
    exit;
}