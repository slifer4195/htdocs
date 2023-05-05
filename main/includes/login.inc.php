<!-- 
Name: Jun Lee

Description: 
This file is for a general user to sign in.
-->

<?php
// Get the data from the login form
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database and functions
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Error handling
    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../pages/SignIn.php?error=emptyinput");
        exit();
    }

    // Try to login with the login information
    loginUser($conn, $email, $password);
} else {
    header("location: ../pages/SignIn.php");
    exit();
}
