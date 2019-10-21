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
    <title>The Donut Shop</title>
</head>
<body>

    <nav>
        <div>
            <a href="shop.php"><img id="logo" src="img/logo.png" alt=""></a>
            <div><a href="shop.php">Donuts</a></div>
            <div><a href="profile.php">Profile</a></div>
            <div><img src="img/icon-cart.png" alt=""><a href="cart.php">Cart</a></div>
            <div><a href="index.php">Log out</a></div>
        </div>
    </nav>