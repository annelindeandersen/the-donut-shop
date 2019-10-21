<?php

// ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';


if(isset($_GET['donutSearch'])) {
    $sName = $_GET['donutSearch'] ?? '';

    $stmt = $db->prepare( "SELECT products.product, products.img, products.product_id, products.price_fk, prices.price, prices.price_id 
    FROM products 
    INNER JOIN prices ON products.price_fk = prices.price_id
    WHERE product LIKE '%' :sName '%'" );
    // sanitizing: bind/assign the values
    $stmt->bindValue(':sName', $sName);
    // execute runs it
    $stmt->execute();
    $products = $stmt->fetchAll();

    if ( count($products) == 0 ) {
        echo 'Sorry, no product match';
        exit;
    }

    foreach ($products as $product) {
        echo "<div onclick='viewProduct($product->product_id)' class='product'>
        <img class='productImg' src='img/$product->img'>
        <div><p>$product->product</p><p>$product->price DKK</div></div>
        ";
    }
}

if(empty($_GET['donutSearch'])) {
    echo '';
}