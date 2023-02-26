<?php
require('./userCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    $userCRUD = new userCRUD();
    $userCRUD->setUsername($_POST['username']);
    $kontrolloUser = $userCRUD->kontrolloUser();


    if ($kontrolloUser == true) {
        $userCRUD->setPassword($_POST['pw']);
        $kontrolloLlogarin = $userCRUD->kontrolloLlogarin();

        if ($kontrolloLlogarin == true) {
            $_SESSION['aksesi'] = $kontrolloLlogarin['aksesi'];
            $_SESSION['userID'] = $kontrolloLlogarin['userID'];
            $_SESSION['name'] = $kontrolloLlogarin['emri'];
            $_SESSION['mbiemri'] = $kontrolloLlogarin['mbiemri'];
            $_SESSION['email'] = $kontrolloLlogarin['email'];
            echo "<script>document.location='./index.php'</script>";
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
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<?php include_once('./header.php'); ?>
    <div class="login-box">
        <h1>Login</h1>
        <form action="" method="POST">
            <label>Username</label>
            <input type="text" name="username" placeholder="">
            <label>Password</label>
            <input type="password" name="pw" placeholder="">
            <input class="button" type="submit" name="login"value="Submit">
        </form>
    </div>
    <p class="para-2">Not have an account? <a href="SignUp.html">Sign Up Here</a></p>
    
</body>
</html>