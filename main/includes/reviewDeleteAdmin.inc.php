<?php

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

    $sql = "DELETE FROM Reviews WHERE ReviewID=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../pages/AdminReview.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}