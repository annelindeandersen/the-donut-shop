<?php

// ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';
// require_once __DIR__.'/../top.php';

if(isset($_GET['submit'])){
    $selected_val = $_GET['category'];  // Storing Selected Value In Variable
    // echo "You have selected :" .$selected_val;  // Displaying Selected Value

    $stmt = $db->prepare("SELECT products.product, products.img, products.product_id, products.price_fk, prices.price, prices.price_id 
    FROM products 
    INNER JOIN prices ON products.price_fk = prices.price_id 
    WHERE category_fk LIKE :val");
    $stmt->bindValue(':val', $selected_val);
    $stmt->execute();
    $products = $stmt->fetchAll();

    foreach ($products as $product) {
        echo "<div onclick='viewProduct($product->product_id)' class='product'>
        <img class='productImg' src='img/$product->img'>
        <div><p>$product->product</p><p>$product->price DKK</div></div>
        ";
    }
}