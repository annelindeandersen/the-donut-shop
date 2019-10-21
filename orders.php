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

<h1>Orders</h1>

<table>
    <thead>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Order date</th>
        <th>Pickup time</th>
    </thead>
    <tbody>

    <?php 

        $stmt = $db->prepare('SELECT * FROM orders');
        $stmt->execute();
        $aOrders = $stmt->fetchAll();

        foreach ($aOrders as $aOrder) {

            echo "
                <tr>
                    <td>$aOrder->order_id</td>
                    <td>$aOrder->user_fk</td>
                    <td>$aOrder->date</td>
                    <td>$aOrder->pickup_time</td>
                    <td><button onClick='orderDetails($aOrder->order_id)'>DETAILS</button></td>
                </tr>
                ";
        }

    ?>

    </tbody>
</table>

    <div class="popUp">
        <h1 style="text-align:center;">Order details</h1><br>
        <table>
            <thead>
                <th></th>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Product</th>
            </thead>
            <tbody class="productDetails">

            </tbody>
        </table>

    </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script>
            function orderDetails(order_id) {
            console.log(order_id, 'show order details')
            
            $.ajax({
                method: 'GET',
                url: 'apis/api-get-order-details.php',
                data: {
                    id: order_id
                }
            }).done(function(id){
                console.log(id)
                $('.productDetails').html(id);
                // $('#modalWrapper').show();
                // $('#productContainer').hide();
            }).fail(function(){
                console.log('error')
            })
            }
        </script>

</body>
</html>