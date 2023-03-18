<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['shportaBlerjes'])) {
  echo '<script>document.location="./shporta.php"</script>';
}

include('./porosiaCRUD.php');
$porosiaCRUD = new porosiaCRUD();
$total = 0;
$nentotali = 0;

foreach ($_SESSION["shportaBlerjes"] as $keys => $values) {
  $total = $total + ($values["sasia"] * $values["qmimi"]);
  $itemID = $values["produktiMID"];

}


$porosiaCRUD->setUserID($_SESSION["userID"]);
$porosiaCRUD->setQmimiTotal($total);

$porosiaCRUD->shtoPorosin();

$idPorosia = $porosiaCRUD->numriIPorosisNeKonfirmim();

foreach ($_SESSION["shportaBlerjes"] as $keys => $values) {

  $porosiaCRUD->setPorosiaID($idPorosia['nrPorosis']);
  $porosiaCRUD->setProduktiID($values['produktiMID']);
  $porosiaCRUD->setQmimiProd(floatval($values['qmimi']));
  $porosiaCRUD->setSasiaPorositur((int) $values['sasia']);
  $porosiaCRUD->setQmimiTotal(floatval($values['qmimi'] * $values['sasia']));

  $porosiaCRUD->shtoTeDhenatPorosis();

}

unset($_SESSION["shportaBlerjes"]);


$teDhenatPorosis = $porosiaCRUD->shfaqProduktetEPorosisSipasID();
$porosia = $porosiaCRUD->shfaqPorosinSipasID();

var_dump($porosia);
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Order Complete</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css">
</head>

<body>

  <?php include('./header.php'); ?>

  <div class="containerDashboardP">
    <h1>Porosia Perfundoi</h1>
      <h2> Detajet e porosis tuaj </h2>
      <table>
        <tr>
          <th colspan="4" style="text-align:center;text-transform: uppercase;">Te dhenat e Transportit</th>
        </tr>
        <h2></h2>
        <tr>
          <th style="text-transform: uppercase;">Klienti</th>
          <td colspan="3" style="text-align:center;">
            <?php echo ucfirst($porosia["emri"]) . " " . ucfirst($porosia["mbiemri"]); ?>
          </td>
        </tr>
        <tr>
          <th style="text-transform: uppercase;">Adresa</th>
          <td id='adresa' colspan="3" style="text-align:center;">
            <?php echo $porosia["Adresa"] ?>
          </td>
        </tr>
        <tr>
          <th style="text-transform: uppercase;">Numri Kontaktues</th>
          <td id='nrKontaktit' colspan="3" style="text-align:center;">
            <?php echo $porosia["nrTel"]; ?>
          </td>
        </tr>
        <tr>
          <th style="text-transform: uppercase;">Numri Porosis</th>
          <td id='nrKontaktit' colspan="3" style="text-align:center;">
            #
            <?php echo $porosia["nrPorosis"]; ?>
          </td>
        </tr>
        <tr>
          <th style="text-transform: uppercase;">Emri Produktit</th>
          <th style="text-transform: uppercase;">Qmimi Produktit</th>
          <th style="text-transform: uppercase;">Sasia e Porositur</th>
          <th style="text-transform: uppercase;">Qmimi total</th>
        </tr>
        <?php
        foreach ($teDhenatPorosis as $porosit) {
          ?>
          <tr>
            <td>
              <?php echo $porosit['emri'] ?>
            </td>
            <td>
              <?php echo number_format($porosit['qmimiProd'], 2) ?> €
            </td>
            <td>
              <?php echo $porosit['sasiaPorositur'] ?>
            </td>
            <td>
              <?php echo $porosit['qmimiTotal'] ?> €
            </td>
          </tr>
          <?php

          $nentotali = $nentotali + $porosit['qmimiTotal'];
        }
        ?>
        <tr>
          <td colspan="3" align="right">
            <strong>Totali Pa TVSH: </strong>
          </td>
          <td>
            <strong>
              <?php echo number_format($porosia['TotaliPorosis'] - ($porosia['TotaliPorosis'] * 0.18), 2) . ' €' ?>
            </strong>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="right">
            <strong>TVSH 18%: </strong>
          </td>
          <td>
            <strong>
              <?php echo number_format($porosia['TotaliPorosis'] * 0.18, 2) . ' €' ?>
            </strong>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="right" style="font-size: 20pt">
            <strong>Qmimi Total: </strong>
          </td>
          <td style="font-size: 20pt">
            <strong>
              <?php echo number_format($porosia['TotaliPorosis'], 2) . ' €' ?>
            </strong>
          </td>
        </tr>
      </table>
      <div>
        <a href="./porositKlientit.php">
          <button class="button">Perfundo</button>
        </a>
      </div>
    </div>

  </div>


  <?php include('./footer.php'); ?>

</body>

</html>