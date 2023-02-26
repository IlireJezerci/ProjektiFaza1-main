<?php
require_once('./kontrolloAksesin.php');
require_once('./userCRUD.php');

$userCRUD = new userCRUD();

if (isset($_GET['userID'])) {
  $userCRUD->setUserID($_GET['userID']);
  $userCRUD->ndryshoAksesin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perdoruesit | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

  <?php include './header.php' ?>
  <?php include './nav.php' ?>

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['aksesiUPerditesua'])) {
      ?>
      <div class="mesazhiSuksesStyle">
        <p>Llogaria u ndryshua!</p>
        <button id="mbyllMesazhin">
          X
        </button>
      </div>
      <?php
    }
    ?>
    <h1>Lista e Perdoruesve</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Mbiemri</th>
        <th>Username</th>
        <th>Email</th>
        <th>Aksesi</th>
        <th>Funksione</th>
      </tr>
      <?php
      $perdoruesit = $userCRUD->shfaqTeGjithePerdoruesit();

      foreach ($perdoruesit as $perdoruesi) {
        ?>
        <tr>
          <td>
            <?php echo $perdoruesi['userID'] ?>
          </td>
          <td>
            <?php echo $perdoruesi['emri'] ?>
          </td>
          <td>
            <?php echo $perdoruesi['mbiemri'] ?>
          </td>
          <td>
            <?php echo $perdoruesi['username'] ?>
          </td>
          <td>
            <?php echo $perdoruesi['email'] ?>
          </td>
          <td>
            <?php echo $perdoruesi['aksesi'] ?>
          </td>
          <td>
          <button class="edito"><a href="?userID=<?php echo $perdoruesi['userID'] ?>">Ndrysho Aksesin - Admin</a></button>
          </td>
        </tr>
        <?php

      }
      ?>
      </th>
    </table>
  </div>

  <?php
  include './footer.php';?>
</body>

</html>