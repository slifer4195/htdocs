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

    if ($id == $_SESSION["userid"] && isset($_SESSION["usertype"])) {
        header("location: ../pages/AdminAccount.php");
        exit();
    } else {
        // // check if the UserID is related any foreign key on other tables
        // $sql2 = "SELECT * FROM Users G WHERE EXISTS (SELECT 1 FROM Item T WHERE G.UserID = T.UserID)";
        // $result2 = mysqli_query($conn, $sql2);

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
