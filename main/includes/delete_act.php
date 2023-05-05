<!-- 
// Name: Sung Rung Yoo

// Description: 
// This page deletes activity for activity page
// -->


<?php
// delete_location.php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the locationId was passed in the form submission
if (isset($_POST['id'])) {
  // Retrieve the locationId from the $_POST array
  //   $actId = $_POST['id'];

  //   $sql = "DELETE FROM Activity WHERE id=$actId";

  $actId = (int)$_POST['id'];
  echo "The act ID is: " . $actId;
  $sql = "DELETE FROM Activity WHERE ActivityID='$actId'";

  if ($conn->query($sql) === TRUE) {
    // Redirect the user to a confirmation page or the previous page
    header("Location: ../pages/Activity.php");
    // exit;
    echo "e";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
  // Use the $locationId variable to delete the corresponding location from the database
  // ...

  // Redirect the user to a confirmation page or the previous page
  //   header("Location: Activity.php");

} else {
  // Handle the case where the locationId was not passed in the form submission
  // ...
  echo "wha";
}
?>