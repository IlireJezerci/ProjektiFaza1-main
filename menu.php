<?php
include_once './menujaCRUD.php';

if (!isset($_SESSION)) {
    session_start();
}

$menuja = new menujaCRUD();

$aritkujtNeMenu = $menuja->shfaqMenun();


if (isset($_POST['submit'])) {



    if (isset($_SESSION["shportaBlerjes"])) {

        $IdProduktit = array_column($_SESSION["shportaBlerjes"], "produktiMID");
        if (!in_array($_POST["produktiMID"], $IdProduktit)) {
            $Produkti = array(
                'produktiMID' => $_POST["produktiMID"],
                'emri' => $_POST["emri"],
                'qmimi' => $_POST["qmimi"],
                'sasia' => 1,
            );
            array_push($_SESSION['shportaBlerjes'], $Produkti);
        }
    } else {

        $Produkti = array(
            'produktiMID' => $_POST["produktiMID"],
            'emri' => $_POST["emri"],
            'qmimi' => $_POST["qmimi"],
            'sasia' => 1,
        );
        $_SESSION["shportaBlerjes"][0] = $Produkti;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="./css/menu.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


</head>

<body>
    <?php include_once('./header.php'); ?>
    <main>

        <!-- Restaurant Menu-->
        <section class="dish" id="dish">
            <h1 class="heading"><span>Our Menu</span></h1>


            <div class="image-container">
                <?php
                foreach ($aritkujtNeMenu as $artikulli) {
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="produktiMID" value=<?php echo $artikulli['produktiMID'] ?>>
                        <input type="hidden" name="emri" value="<?php echo $artikulli['emri'] ?>">
                        <input type="hidden" name="qmimi" value=<?php echo $artikulli['qmimi'] ?>>
                        <div class="image soup">
                            <img src="./img/<?php echo $artikulli['foto'] ?>" alt="soup">

                            <div class="dish-container">
                                <h1>
                                    <?php echo $artikulli['emri'] ?>
                                </h1>
                                <h2>Price:
                                    <?php echo $artikulli['qmimi'] ?>$
                                </h2>
                                <input type="submit" class="" value="Add to Order" name="submit">
                            </div>

                        </div>

                    </form>
                    <?php
                }
                ?>
            </div>

        </section>

    </main>
    <?php include './footer.php' ?>


</body>

<script src="../js/menu.js" typee="text/javascript"> </script>

</html>