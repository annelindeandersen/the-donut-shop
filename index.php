<?php 
require_once __DIR__.'/connect.php';
if(isset($_SESSION['loggedUser'])){
    header("location: shop.php"); // Redirecting To Shop
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>The Donut Shop</title>
</head>
<body>
    <div id="wrapper">
    <div class="layer"></div>

        <div id="logo_frontpage"></div>

        <div id="signup" class="page">
            <form action="apis/api-signup.php" method="POST">
            <h2>SIGN UP</h2>
                <input name="fullname" type="text" placeholder="Full name"><br>
                <input name="email" type="email" placeholder="Email"><br>
                <input name="password" type="password" placeholder="Password"><br>
                <input name="phone" type="number" placeholder="Phone"><br>
                <!-- <input name="city" type="text" placeholder="City"><br> -->
                <button>SIGN UP</button><br><br>
                <p>Already have an account? Log in here.</p>
            </form>
        </div>
        <div id="login" class="page">
            <form action="apis/api-login.php" method="POST">
            <h2>LOG IN</h2>
                <input name="email" type="email" placeholder="Email"><br>
                <input name="password" type="password" placeholder="Password"><br>
                <button>LOG IN</button><br><br>
                <p>Don't have an account? Sign up here.</p>
            </form>
        </div>

    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="js/login.js"></script>

</body>
</html>