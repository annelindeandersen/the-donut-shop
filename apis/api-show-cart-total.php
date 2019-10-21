<?php

// ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$sUserId = $_SESSION['sUserId'];

try {

    $stmt = $db->prepare("SELECT cart.user_fk, SUM(cart.quantity) AS total_products, SUM(prices.price) AS total_price 
    FROM users
    LEFT JOIN cart ON users.user_id = cart.user_fk AND users.user_id = :userId
    INNER JOIN products ON cart.product_fk = products.product_id
    INNER JOIN prices ON products.price_fk = prices.price_id
    GROUP BY cart.user_fk
    ");
    $stmt->bindValue(":userId", $sUserId);
    $stmt->execute();
    $result = $stmt->fetch();
    $sum = $result->total_price;
    $quantity = $result->total_products;

    echo "
    <tr>
        <td></td>
        <td>TOTAL :</td>
        <td>$quantity</td>
        <td>$sum KR,-</td>
        <td></td>
    </tr>
    ";

} catch ( PDOException $e) {
    echo $e;
    exit;
}