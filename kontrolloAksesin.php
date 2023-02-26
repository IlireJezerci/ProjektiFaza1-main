<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['aksesi'] == 0) {
    echo '<script>document.location="./index.php"</script>';
}


?>