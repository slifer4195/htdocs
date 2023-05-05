<!-- 
Name: Jun Lee

Description: 
This file is to update login information on the profile page.
-->

<?php
//   First, get the data from the profile-update form.
if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName-profile"];
    $lastName = $_POST["lastName-profile"];
    $email = $_POST["email-profile"];
    $password = $_POST["password-profile"];
    $passwordRepeat = $_POST["passwordRepeat-profile"];
    $age = $_POST["age-profile"];

    // Connect to the database and functions
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Error handling 
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
