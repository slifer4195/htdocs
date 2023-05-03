<?php

if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName-profile"];
    $lastName = $_POST["lastName-profile"];
    $email = $_POST["email-profile"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $age = $_POST["age-profile"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // error handling 
    if (pwdMatch($password, $passwordRepeat) !== false) {
        header("location: ../pages/Profile.php?error=passwordsdontmatch");
        exit();
    }
    if (invalidAge($age) !== false) {
        header("location: ../pages/Profile.php?error=invalidage");
        exit();
    }
    if (emailExists($conn, $email) !== false) {
        header("location: ../pages/Profile.php?error=emailtaken");
        exit();
    }

    updateProfile($conn, $firstName, $lastName, $password, $email, $age);
} else {
    header("location: ../pages/Profile.php");
    exit();
}
