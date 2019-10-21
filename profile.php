<?php 
session_start();

if (!isset($_SESSION['sUserId'])) {
    echo '<h1>Create a user to access the shop !!</h1>';
    exit;
}
require_once __DIR__.'/top.php';
?>

<h3 id="welcomeBar">Here you can edit your information, <?php echo $_SESSION['sUser'] ?>.</h3>

<div id="profileWrapper">
    <div class="grid-2-columns">
        <div>
            <h2>Current information</h2><br>
            <?php include __DIR__.'/apis/api-user-information.php'; ?>
        </div>
        <div>
            <h2>Edit information</h2><br>
            <form action="apis/api-edit-user-information.php" method="GET">
                <h3>Full name: </h3><input name="newName" type="text"><br>
                <h3>E-mail: </h3><input name="newEmail" type="email"><br>
                <h3>Phone: </h3><input name="newPhone" type="number"><br><br>
                <!-- <h3>Address: </h3><input name="newAddress" type="text"><br>
                <h3>City: </h3><input name="newCity" type="text"><br><br> -->
                <button>Update info</button>
            </form>
        </div>
    </div>
</div>


<?php 
require_once __DIR__.'/bottom.php';
?>