<?php
if (!isset($_SESSION)) {
    session_start();
}

// require_once('../funksione/kontrolloEshteLogin.php');
require_once('./porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

    <?php include './header.php' ?>

    <div class="containerDashboardP">

        <?php
        if (isset($_SESSION['userID'])) {
            $porosiaCRUD->setUserID($_SESSION['userID']);
            ?>
            <h2>Te gjitha porosit e tua</h2>
            <?php
            $porosia = $porosiaCRUD->shfaqPorositEKlientit();
        }

        ?>

    </div>

    <?php
    include './footer.php'; ?>
</body>

</html>