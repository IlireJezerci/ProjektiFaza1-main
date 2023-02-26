<nav class="navbar">
        <ul class="nav-ul">
            <?php
            if (isset($_SESSION['aksesi']) === 1) {
                echo '<li class="nav-link"><a href="shtoKategori.php">Shto Kategori</a></li>
                    <li class="nav-link"><a href="shtoMenu.php">Shto Ne Menu </a></li>
                    <li class="nav-link"> <a href="teGjithaPorosit.php">Porosit</a></li>
                    <li class="nav-link"> <a href="perdoruesit.php">Perdoruesit</a></li>';
            } else {
                echo '
                    <li class="nav-link"><a href="porositKlientit.php"> Porosit e Tua</a></li>';
            }
            ?>
        </ul>
    </nav>