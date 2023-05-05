<!-- 
Name: Jun Lee

Description: 
This file is to delete a specific row from the item table.

-->

<?php
// Connect to the database
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from the item form to delete a specific item
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Execute a query
    $sql = "DELETE FROM Item WHERE ItemID=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../pages/item.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
