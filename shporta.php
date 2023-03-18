<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['perdit'])) {
    foreach ($_SESSION['shportaBlerjes'] as $key => $produkti) {
        if ($_POST['produktiMID'] == $produkti['produktiMID']) {
            $_SESSION['shportaBlerjes'][$key]['sasia'] = $_POST['sasia'];
        }
    }
}

if (isset($_POST['largo'])) {
    foreach ($_SESSION['shportaBlerjes'] as $key => $produkti) {
        if ($_POST['produktiMID'] == $produkti['produktiMID']) {
            unset($_SESSION["shportaBlerjes"][$key]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css">
</head>

<body>
    <?php include_once('./header.php') ?>
    <div class="containerDashboardP">
        <table>
            <tr>
                <th>Emri i Produktit</th>
                <th>Sasia</th>
                <th>Qmimi</th>
                <th>Qmimi Total</th>
                <th>Fuksione</th>
            </tr>
            <?php
            if (!empty($_SESSION["shportaBlerjes"])) {
                $total = 0;
                foreach ($_SESSION["shportaBlerjes"] as $keys => $produkti) {
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="produktiMID" value="<?php echo $produkti["produktiMID"]; ?>">
                        <tr>
                            <td>
                                <?php echo $produkti["emri"]; ?>
                            </td>
                            <td>
                                <input type="number" name="sasia" value="<?php echo $produkti["sasia"]; ?>" min=1 max=999>
                            </td>
                            <td>
                                <?php echo $produkti["qmimi"]; ?> €
                            </td>
                            <td>
                                <?php echo number_format($produkti["sasia"] * $produkti["qmimi"], 2); ?> €
                            </td>
                            <td>
                                <input class="edito" type="submit" value="Perditeso" name='perdit'>
                                <input class="fshij" type="submit" value="Largo nga Shporta" name='largo'>
                            </td>
                        </tr>
                    </form>
                    <?php
                    $total = $total + ($produkti["sasia"] * $produkti["qmimi"]);
                }
                ?>
                <tr>
                    <td colspan="4" align="right">
                        <h2>Totali i Pergjithshem:</h2>
                    </td>
                    <td>
                        <h2>
                            <?php echo number_format($total, 2); ?> €
                        </h2>
                    </td>
                    <td></td>
                </tr>
                <?php
            } else {
                ?>
                <p>Nuk keni asnje Produkt ne Shporte!</p>
                <?php
            }
            ?>
        </table>

        <div>
            <a href="./menu.php"><button class="button">Vazhdo me Blerjen</button></a>
            <a href="./checkout.php"><button class="button">Kalo tek Pagesa</button></a>
        </div>
    </div>



    </div>

    <?php include_once('./footer.php') ?>
</body>

</html>

<?php
unset($_SESSION['largimiMeSukses']);
unset($_SESSION['perditMeSukses']);
?>