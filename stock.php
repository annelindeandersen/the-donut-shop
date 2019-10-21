<?php

session_start();

if (!isset($_SESSION['sUserId'])) {
    echo '<h1>Create a user to access the shop !!</h1>';
    exit;
    if ($_SESSION['sUser'] != admin) {
        echo '<h1>Only admin can enter this page!!</h1>';
        exit;
    }
}

require_once __DIR__.'/admin-top.php';
?>

<div id="cartWrapper">

<h1>Stock</h1>

<table>
    <thead>
        <th></th>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Stock up</th>
    </thead>
    <tbody>

    <?php 

        // include 'apis/api-join-cart-with-user-and-products.php';

        $stmt = $db->prepare('SELECT * FROM products
        INNER JOIN prices ON prices.price_id = products.price_fk
        INNER JOIN categories ON categories.category_id = products.category_fk');
        $stmt->execute();
        $aOrders = $stmt->fetchAll();

        foreach ($aOrders as $aOrder) {

            echo "
                <tr>
                    <td><img class='cartImg' src='img/$aOrder->img'></td>
                    <td>$aOrder->product_id</td>
                    <td>$aOrder->product</td>
                    <td>$aOrder->price</td>
                    <td>$aOrder->category</td>
                    <td>$aOrder->stock</td>
                    <td><button onClick(stockUp())>STOCK UP</button></td>
                </tr>
                ";
        }

    ?>

    </tbody>
</table>

</div>

</body>
</html>