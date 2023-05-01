<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // error handling
    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../pages/SignIn.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $password);
} else {
    header("location: ../pages/SignIn.php");
    exit();
}
