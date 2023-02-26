<?php
require_once('./kontrolloAksesin.php');
require_once('./menujaCRUD.php');

$menuja = new menujaCRUD();

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['shto'])) {
  $menuja->setEmri($_POST['emri']);
  $menuja->setKategoria($_POST['kategoria']);
  $menuja->setFoto($_POST['foto']);
  $menuja->setQmimi($_POST['qmimi']);
  $menuja->shtoNeMenu();
}

$shfaqKat = $menuja->shfaqKat();
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
        <h1>Shtoni Menu</h1>
        <form action='' method="POST">
            <label>Emri:</label>
            <input type="text" name="emri" placeholder="">
            <label>Fotografija:</label>
            <input class="form-input" name="foto" accept="image/*" type="file" value="Foto Produktit" required>
            <label>Kategorija:</label>
            <select class="dropdown1" name="kategoria">
                <option value="te tjera">Zgjedhni Kategorin</option>
                <?php
                foreach ($shfaqKat as $kategoria) {
                    ?>
                    <option value="<?php echo $kategoria['emriKategoris'] ?>">
                        <?php echo $kategoria['emriKategoris'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <label>Qmimi:</label>
            <input type="number" name="qmimi" placeholder="" min="0">

            <input class="button" type="submit" value="Shtoni Menu" name='shto'>
        </form>
    </div>

</body>

</html>