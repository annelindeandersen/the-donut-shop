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

<h1>Accounts</h1>

<table>
    <thead>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Edit</th>
    </thead>
    <tbody>

    <?php 

        $stmt = $db->prepare('SELECT * FROM users');
        $stmt->execute();
        $aUsers = $stmt->fetchAll();

        foreach ($aUsers as $aUser) {

            echo "
                <tr>
                    <td>$aUser->user_id</td>
                    <td>$aUser->full_name</td>
                    <td>$aUser->email</td>
                    <td>$aUser->phone</td>
                    <td>$aUser->status</td>
                    <td><button>BLOCK</button></td>
                </tr>
                ";
        }

    ?>

    </tbody>
</table>

</div>

</body>
</html>