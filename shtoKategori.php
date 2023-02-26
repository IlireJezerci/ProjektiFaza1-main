<?php
require_once('./kontrolloAksesin.php');
require_once('./menujaCRUD.php');

$menuja = new menujaCRUD();

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['shto'])) {
  $menuja->setEmriKategoris($_POST['emri']);
  $menuja->setPershkrimiKategoris($_POST['pershkrimi']);
  $menuja->setFotoKategoris($_POST['foto']);
  $menuja->shtoKat();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shtoni Menu</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <?php include_once('./header.php'); ?>
    <?php include './nav.php' ?>
    <div class="login-box">
        <h1>Shtoni Kat</h1>
        <form action='' method="POST">
            <label>Emri:</label>
            <input type="text" name="emri" placeholder="">
            <label>Pershkrimi Kategoris:</label>
            <input type="text" name="pershkrimi" placeholder="">
            <label>Fotografija:</label>
            <input class="form-input" name="foto" accept="image/*" type="file" value="Foto Produktit" required>

            <input class="button" type="submit" value="Shtoni Kategori" name='shto'>
        </form>
    </div>

</body>

</html>