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

    if ($id == $_SESSION["userid"]) {
        header("location: ../pages/AdminAccount.php");
        exit();
    } else {
        $sql = "DELETE FROM Users WHERE UserID=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: ../pages/AdminAccount.php");
            exit();
        } else {
            die(mysqli_error($conn));
        }
    }
}
