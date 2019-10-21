<?php 
session_start();

if (!isset($_SESSION['sUserId'])) {
    echo '<h1>Create a user to access the shop !!</h1>';
    exit;
}
if ($_SESSION['sUser'] == admin) {
    header('Location: admin.php');
}
require_once __DIR__.'/top.php';
?>

<h3 id="welcomeBar">Welcome to our Donut Shop, <?php echo $_SESSION['sUser'] ?>!</h3>
<div id="forms">
    <!-- <p>Category: </p> -->
    <form id="filterByCategory" method="GET">
        <select name="category" id="category">
            <option name="1" value="1">Single Donuts</option>
            <option name="3" value="3">Many Donuts</option>
            <option name="2" value="2">Beverages</option>
        </select>
        <input type="submit" value="GO" name="submit">
    </form>
    <form action="" method="GET">
        <input id="donutSearch" type="text" placeholder="SEARCH">
        <!-- <button>GO</button> -->
    </form>
</div>

<div id="modalWrapper">
    <div>
        <div id="modalContent"></div>
    </div>
</div>


<div id="productContainer">
    <div id="filtered">
        <?php include __DIR__.'/apis/api-search.php'; ?>
        <?php include __DIR__.'/apis/api-show-all-products.php'; ?>
        <?php include __DIR__.'/apis/api-filter-by-category.php'; ?>
    </div>
</div>

<?php 
require_once __DIR__.'/bottom.php';
?>


