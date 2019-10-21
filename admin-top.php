<?php 
require_once __DIR__.'/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Admin page</title>
</head>
<body>

    <nav>
        <div>
            <a href="admin.php"><img id="logo" src="img/logo.png" alt=""></a>
            <div><a href="admin.php">Accounts</a></div>
            <div><a href="orders.php">Orders</a></div>
            <div><a href="stock.php">Stock</a></div>
        </div>
    </nav>