<!-- 
Name: Jessica Odutola
Description: 
This file is for admin to delete flights from their own list of flights.
-->
<?php
session_start();

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM OnFlight WHERE UserID = '{$_SESSION['userid']}' AND FlightID = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../pages/FlightAdmin.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}