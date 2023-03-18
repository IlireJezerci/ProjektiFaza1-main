<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('./kontrolloAksesin.php');
require_once('./porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();


$porosit = $porosiaCRUD->shfaqTeGjithaPorosite();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Porosite</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
</head>

<body>

  <?php include './header.php' ?>
  <?php include './nav.php' ?>
  <div class="containerDashboardP">
    <h1>Lista e Porosive</h1>
    <table>
      <tr>
        <th>Numri i Porosis</th>
        <th>Klienti</th>
        <th>Numri Kontaktit</th>
        <th>Adresa</th>
        <th>Data e Porosis</th>
        <th>Totali i Porosis</th>
        <th>Funksione</th>
      </tr>
      <?php


      foreach ($porosit as $porosia) {
        ?>
        <tr>
          <td>
            <?php echo $porosia['nrPorosis'] ?>
          </td>
          <td>
            <?php echo $porosia['emri'] . ' ' . $porosia['mbiemri'] ?>
          </td>
          <td>
            <?php echo $porosia['nrTel'] ?>
          </td>
          <td>
            <?php echo $porosia['Adresa']?>
          </td>
          <td>
            <?php echo $porosia['dataPorosis'] ?>
          </td>
          <td>
            <?php echo $porosia['TotaliPorosis'] ?> €
          </td>
          <td>
            <button class="edito"><a
                href="./detajetPorosis.php?porosiaID=<?php echo $porosia['nrPorosis'] ?>">Detajet
                e Porosis</a>
          </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>

  <?php
  include './footer.php';?>
</body>

</html>