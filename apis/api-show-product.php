<?php

ini_set('display_errors', 1);

session_start();

// require_once __DIR__.'/../top.php';
require_once __DIR__.'/../connect.php';
// require_once __DIR__.'/../bottom.php';

$productId = $_GET['id'];

try {
    
    $stmt = $db->prepare("SELECT products.product, products.img, products.product_id, 
    products.description, products.price_fk, prices.price, prices.price_id 
    FROM products  
    INNER JOIN prices ON products.price_fk = prices.price_id
    WHERE product_id LIKE :productId");
    $stmt->bindValue(":productId", $productId);
    $stmt->execute();
    $products = $stmt->fetchAll();

    foreach ( $products as $product ) {

    echo "
        
        <img class='modalImg' src='img/$product->img'>
        <div class=''>
        <div class='productName'><h1>$product->product</h1></div><br>
        <div class='productDescription'><p>$product->description</p></div><br>
        <div class='productPrice'><h2>$product->price KR,-</h2></div><br>
        <button onclick='addToCart($product->product_id)'>ADD TO CART</button><br>
        <h1 id='closeProduct' onclick='closeProduct()'>X</h1>
        </div>
        
    ";
    // <input type='number' name='quantity'>
    }

    } catch (PDOException $e) {
        echo $e;
        exit;
    }

?>

