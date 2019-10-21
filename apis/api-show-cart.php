<?php

// ini_set('display_errors', 1);

session_start();

require_once __DIR__.'/../connect.php';

$sUserId = $_SESSION['sUserId'];
$sUserName = $_SESSION['sUser'];

$stmt = $db->prepare("CREATE VIEW productsinuserscart AS
SELECT products.product_id, products.img, products.product, cart.quantity, prices.price, cart.user_fk  FROM cart
INNER JOIN users ON cart.user_fk = users.user_id
INNER JOIN products ON cart.product_fk = products.product_id
INNER JOIN prices ON products.price_fk = prices.price_id
ORDER BY products.img ASC");
$stmt->execute();

try {

    $stmt = $db->prepare("SELECT * FROM productsinuserscart WHERE user_fk = :userId");
    $stmt->bindValue(":userId", $sUserId);
    // $stmt->bindValue(":userName", $sUserName);
    $stmt->execute();
    $aOrders = $stmt->fetchAll();

    
    foreach ( $aOrders as $aOrder ) {
        
        echo "
            <tr>
                <td><img class='cartImg' src='img/$aOrder->img'></td>
                <td>$aOrder->product</td>
                <td>$aOrder->quantity</td>
                <td>$aOrder->price KR,-</td>
                <td><button onClick='deleteProduct($aOrder->product_id)'>DELETE</button></td>
            </tr>
            ";
    }

} catch ( PDOException $e) {
    echo $e;
    exit;
}