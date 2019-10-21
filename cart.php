<?php 
session_start();

if (!isset($_SESSION['sUserId'])) {
    echo '<h1>Create a user to access the shop !!</h1>';
    exit;
}
require_once __DIR__.'/top.php';
?>
<div id="cartWrapper">
<!-- <h3 id="welcomeBar">Review your orders here before placing them, <?php echo $_SESSION['sUser'] ?>.</h3> -->

    <h1>Your Shopping Cart</h1>

    <table>
    <thead>
    <tr>
        <th>Product</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
        
    <?php include __DIR__.'/apis/api-show-cart.php'; ?>
    <?php include __DIR__.'/apis/api-show-cart-total.php'; ?>

    </tbody>
    </table>
    <h3>Ready to place order?</h3><br>
    <form method="GET" action="apis/api-place-order.php">
        <p>Select pick up time: <input type="time" name="pickup_time" id="pickup_time"></p>
        <button onClick='orderProducts()' id='placeOrderButton'>ORDER NOW</button>

    </form>
</div>

<?php 
require_once __DIR__.'/bottom.php';
?>