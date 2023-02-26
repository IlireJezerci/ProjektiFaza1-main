<?php
include_once './userCRUD.php';
if (!isset($_SESSION)) {
    session_start();
}
$user = new userCRUD();

$user->setUserID($_SESSION['userID']);
$tedhenat = $user->shfaqUserSipasID();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php include_once('./header.php') ?>
    <?php include_once('./nav.php') ?>

    <p><strong>Emri: </strong><?php echo $tedhenat['emri'] ?></p>
    <p><strong>Mbiemri: </strong><?php echo $tedhenat['mbiemri'] ?></p>
    <p><strong>Username: </strong><?php echo $tedhenat['username'] ?></p>
    <p><strong>Email: </strong><?php echo $tedhenat['email'] ?></p>
    <p><strong>Nr Kontaktit: </strong><?php echo $tedhenat['nrTel'] ?></p>
    <p><strong>Adresa: </strong><?php echo $tedhenat['Adresa'] ?></p>
</body>

</html>