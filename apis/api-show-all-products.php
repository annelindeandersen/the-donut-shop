<?php

// ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

// include __DIR__.'/api-filter-by-category.php';

try {

    if(!isset($_GET['submit']) && !isset($_GET['donutSearch'])) {
        $stmt = $db->prepare('SELECT products.product, products.img, products.product_id, products.price_fk, prices.price, prices.price_id FROM products
        INNER JOIN prices ON products.price_fk = prices.price_id');
        $stmt->execute();
        $products = $stmt->fetchAll();
            
        foreach ( $products as $product ) {
            echo "<div onclick='viewProduct($product->product_id)' class='product'>
            <img class='productImg' src='img/$product->img'>
            <div><p>$product->product</p><p>$product->price DKK</p></div></div>
            ";
        }
    }
} catch ( PDOException $e) {
    echo $e;
}