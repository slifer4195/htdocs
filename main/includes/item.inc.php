<?php

if (isset($_POST["submit"])) {
    $userID = $_POST["id"];
    $itemType = $_POST["itemType"];
    $weight = $_POST["weight"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // error handling
    if (emptyInputItem($itemType, $weight) !== false) {
        header("location: ../pages/Item.php?error=emptyinput");
        exit();
    }
    if (invalidWeight($weight) !== false) {
        header("location: ../pages/Item.php?error=invalidweight");
        exit();
    }
    // if (invalidUid($email) !== false) {
    //     header("location: ../pages/SignUp.php?error=invalidemail");
    //     exit();
    // }
    // if (pwdMatch($password, $passwordRepeat) !== false) {
    //     header("location: ../pages/SignUp.php?error=passwordsdontmatch");
    //     exit();
    // }
    // if (emailExists($conn, $email) !== false) {
    //     header("location: ../pages/SignUp.php?error=emailtaken");
    //     exit();
    // }

    createItem($conn, $userID, $itemType, $weight);
} else {
    header("location: ../pages/item.php");
    exit();
}
