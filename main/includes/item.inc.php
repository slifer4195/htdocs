<!-- 
Name: Jun Lee and Jack Warham

Description: 
This file helps users insert an item from the item page.

-->

<?php
// Get the data from the item form
if (isset($_POST["submit"])) {
    $userID = $_POST["id"];
    $itemType = $_POST["itemType"];
    $weight = $_POST["weight"];

    // Connect to the datase
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Error handling
    if (emptyInputItem($itemType, $weight) !== false) {
        header("location: ../pages/Item.php?error=emptyinput");
        exit();
    }
    if (invalidWeight($weight) !== false) {
        header("location: ../pages/Item.php?error=invalidweight");
        exit();
    }

    // Create Item
    createItem($conn, $userID, $itemType, $weight);
} else {
    header("location: ../pages/Item.php");
    exit();
}
?>