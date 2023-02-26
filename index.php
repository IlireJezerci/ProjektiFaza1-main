<?php
require_once('./menujaCRUD.php');

$menuja = new menujaCRUD();

$shfaqKat = $menuja->shfaqKat();
$shfaq6Fundit = $menuja->shfaqMenun6Fundit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <link rel="stylesheet" href="./css/home.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>

<body>

    <?php include_once('./header.php'); ?>

    <main>
        <div class="slideshow-container">
            <?php
            foreach ($shfaqKat as $kategoria) {
                ?>
                <div class="mySlides fade">
                    <div class="wrapper">
                        <div class="content">
                            <h1>
                                <?php echo $kategoria['emriKategoris'] ?>
                            </h1>
                            <p>
                                <?php echo $kategoria['pershkrimiKategoris'] ?>.
                            </p>
                            <a class="more-button" href="menu.php">Go To Menu</a>
                        </div>
                        <div class="content-image">
                            <img src="./img/<?php echo $kategoria['fotoKategoris'] ?>" />
                        </div>
                    </div>
                </div>
                <?php
            }

            ?>

            <a class="next" onclick="plusSlides(+1)">&#8250;</a>
            <a class="prev" onclick="plusSlides(-1)">&#8249; </a>
        </div>

    </main>


    <div class="padding">
        <div>
            <h4 id="Latest-work">Latest Work</h4>
        </div>

        <section class="Latest-work">
            <?php
            foreach ($shfaq6Fundit as $produkti) {
                ?>
                <div class="img">
                    <img src="./img/<?php echo $produkti['foto'] ?>" width="200" height="190">
                    <div class="description"><?php echo $produkti['emri'] ?></div>
                </div>
                <?php
            }
            ?>

        </section>


    </div>
    <?php include './footer.php'; ?>
</body>
<script src="./js/home.js" typee="text/javascript"> </script>
<script>
    document.getElementById("DT").innerHTML = Date();
</script>

</html>