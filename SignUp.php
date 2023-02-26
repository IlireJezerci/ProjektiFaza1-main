<?php
if (!isset($_SESSION)) {
    session_start();
}
require('./userCRUD.php');

if (isset($_POST['submit'])) {
    $user = new userCRUD();
    $user->setEmri($_POST['emri']);
    $user->setMbiemri($_POST['mbiemri']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['pass']);
    $user->setAdresa($_POST['adresa']);
    $user->setNrKontaktit($_POST['telefoni']);
    $user->setUsername($_POST['username']);

    $user->shtoUser();
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="./css/SignUp.css">
</head>

<body>
    <?php include_once('./header.php'); ?>
    <div class="signup-box">
        <h1>Sign Up</h1>
        <form action="" method="post">
            <label>First Name</label>
            <input type="text" name="emri" placeholder="">
            <label>Last Name</label>
            <input type="text" name="mbiemri" placeholder="">
            <label>Username</label>
            <input type="text" name="username" placeholder="">
            <label>Nr Tel</label>
            <input type="text" name="telefoni" placeholder="">
            <label>Adresa</label>
            <input type="text" name="adresa" placeholder="">
            <label>Email</label>
            <input type="email" name="email" placeholder="">
            <label>Password</label>
            <input type="password" name="pass" placeholder="">
            <input class="button" type="submit" value="Submit" name="submit">
        </form>
        <p> By clicking the Sign Up buttoon,you agree to our <br>
            <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy <a href="login"></a></a>
        </p>
    </div>
    <p class="para-2">Already have a account? <a href="login.html">Login Here</a></p>

</body>

</html>