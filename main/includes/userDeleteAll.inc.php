<!-- 
Name: Jun Lee

Description: 
This file is intended for users to delete their own accounts.
-->

<!--
  First, connect to the database, and if it connects successfully, delete 
  a user own account.
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

$sql = "DELETE FROM Users WHERE UserID={$_SESSION['userid']}";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script type=\"text/javascript\">window.alert('Your account is deleted!');window.location.href = '/main/includes/logout.inc.php';</script>";
    exit();
} else {
    die(mysqli_error($conn));
}
