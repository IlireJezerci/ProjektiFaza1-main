<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["shportaBlerjes"]) || $_SESSION["shportaBlerjes"] == null) {
    echo '<script>document.location="./shporta.php"</script>';
}
if (!isset($_SESSION['userID'])) {
    echo '<script>document.location="./login.php"</script>';
}

include_once('./userCRUD.php');

$userCRUD = new userCRUD();

$userCRUD->setUserID($_SESSION['userID']);
$teDhenatKlientit = $userCRUD->shfaqUserSipasID();
$total = 0;
$nentotali = 0;
$produktetNeShport = array_column($_SESSION["shportaBlerjes"], "produktiMID");

foreach ($_SESSION["shportaBlerjes"] as $keys => $values) {
    $total = $total + ($values["sasia"] * $values["qmimi"]);
    $nentotali = $total;
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Checkout </title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css">
    <link rel="stylesheet" href="../../css/mesazhetStyle.css">
</head>

<body>
    <?php include('./header.php'); ?>
        <h1>Konfirmimi Porosis</h1>

        <table>
            <tr>
                <th colspan="2" style="text-align:center;text-transform: uppercase;">Te dhenat e Transportit</th>
            </tr>
            <h2></h2>
            <tr>
                <th>Klienti</th>
                <td>
                    <?php echo ucfirst($teDhenatKlientit["emri"]) . " " . ucfirst($teDhenatKlientit["mbiemri"]); ?>
                </td>
            </tr>
            <tr>
                <th>Adresa</th>
                <td id='adresa'>
                    <?php echo $teDhenatKlientit["Adresa"]; ?>
                </td>
            </tr>
            <tr>
                <th>Numri Kontaktues</th>
                <td id='nrKontaktit'>
                    <?php echo $teDhenatKlientit["nrTel"]; ?>
                </td>
            </tr>
                <tr>
                    <th>Totali i Pergjithshem:</th>
                    <td>
                        <strong>
                            <?php echo number_format($total, 2); ?> €
                        </strong>
                    </td>
                </tr>
            <form onsubmit="return kontrolloTeDhenat();" action="./orderComplete.php" method="POST">
                <input type="hidden" name="qmimiTot" value="<?php echo number_format($total, 2); ?>">
                <tr>
                    <th>Pagesa:</th>
                    <td>Paguaj pas Pranimit te Porosis</td>
                </tr>
                <tr>
                    <th>Transporti:</th>
                    <td>Transport Normal - Pa Pagese</td>
                </tr>
                <tr>
                        <td colspan=2 style="text-align:center;">
                            <input class="button" name='complete' type="submit" value="Perfundo Porosin">
                        </td>

                </tr>
            </form>
        </table>
    <?php include_once('./footer.php'); ?>
</body>

</html>

<script>
    function kontrolloTeDhenat() {
        var adresa = document.getElementById('adresa').innerHTML;
        var qyteti = document.getElementById('qyteti').innerHTML;
        var nrKontaktit = document.getElementById('nrKontaktit').innerHTML;
        if (adresa.replace(/\s/g, "") == "" || qyteti.replace(/\s/g, "") == "" || nrKontaktit.replace(/\s/g, "") == "") {
            alert("Nuk mund te beni porosi me te dhena te zbrazura!")
            return false;
        }
        return true;
    }
</script>


<?php

unset($_SESSION['zbritjaUAplikua']);
unset($_SESSION['kodiGabim']);
unset($_SESSION['produktiGabuar']);
?>