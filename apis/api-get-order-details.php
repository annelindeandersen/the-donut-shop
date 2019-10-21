<?php 
        ini_set('display_errors', 1);

        session_start();
        
        // require_once __DIR__.'/../top.php';
        require_once __DIR__.'/../connect.php';

        $orderId = $_GET['id'];

        $stmt = $db->prepare("SELECT order_details.user_fk, order_details.order_fk, order_details.product_fk, products.img FROM order_details
        INNER JOIN products ON order_details.user_fk = products.product_id
        WHERE order_details.order_fk = $orderId");
        $stmt->execute();
        $aOrders = $stmt->fetchAll();

        foreach ($aOrders as $aOrder) {

            echo "
                <tr>
                    <td><img class='cartImg' src='img/$aOrder->img'></td>
                    <td>$aOrder->order_fk</td>
                    <td>$aOrder->user_fk</td>
                    <td>$aOrder->product_fk</td>
                </tr>
                ";
        }

    ?>