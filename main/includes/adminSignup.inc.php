<!-- 
Name: Jun Lee

Description: 
This file is for the admin user to sign up.
-->

<?php
// Get the data from the admin sign-up page
if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $age = $_POST["age"];

    // Connect to the database and functions
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Error handling
    if (emptyInputSignup($firstName, $lastName, $email, $password, $passwordRepeat, $age) !== false) {
        header("location: ../pages/AdminSignup.php?error=emptyinput");
        exit();
    }
    if (invalidAge($age) !== false) {
        header("location: ../pages/AdminSignup.php?error=invalidage");
        exit();
    }
    if (invalidUid($email) !== false) {
        header("location: ../pages/AdminSignup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $passwordRepeat) !== false) {
        header("location: ../pages/AdminSignup.php?error=passwordsdontmatch");
        exit();
    }
    if (emailExists($conn, $email) !== false) {
        header("location: ../pages/AdminSignup.php?error=emailtaken");
        exit();
    }

    // Create the admin account
    createUserAdmin($conn, $firstName, $lastName, $email, $age, $password);
    echo "<script type=\"text/javascript\">window.alert('You have successfully signed up!');window.location.href = '../pages/SignIn.php';</script>";

    exit();
} else {
    header("location: ../pages/AdminSignup.php");
    exit();
}
