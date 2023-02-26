<?php

if (!isset($_SESSION)) {
    session_start();
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <!-- Logo ose tekst ose img-->
        <div class="logo">
            <label class="big-text">House of Cuisines</label>
        </div>

        <nav class="navbar">
            <ul class="nav-ul">
                <li class="nav-link"><a href="index.php">HOME</a></li>
                <li class="nav-link"><a href="menu.php">MENU </a></li>
                <li class="nav-link"> <a href="AboutUs.php">ABOUT US</a></li>
                <li class="nav-link"><a href="Gallery.php"> GALLERY</a></li>
                <li class="nav-link"><a href="shporta.php"> SHPORTA</a></li>
                <?php if(!isseT($_SESSION['name'])){
                    echo '<li class="nav-link"><a href="login.php"> LOGIN</a></li>
                    <li class="nav-link"><a href="SignUp.php"> SIGN UP</a></li>';
                }else{
                    echo '
                    <li class="nav-link"><a href="./dashboard.php"> DASHBOARD</a></li>
                    <li class="nav-link"><a href="./signout.php"> SIGN OUT</a></li>';
                }
                ?>
            </ul>
        </nav>

    </header>
</body>

</html>