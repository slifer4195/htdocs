<!-- 
Name: Jun Lee

Description: 
This file is for the admin to delete a user account.
-->

<!--
  First, connect to the database, and if it connects successfully, delete 
  a speicifc row according to the user's request.
  If it deletes successfully, show the message saying your request is 
  completed, but if not, throw an error.
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

    if ($id == $_SESSION["userid"] && isset($_SESSION["usertype"])) {
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
