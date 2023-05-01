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
  $locationId = $_POST['id'];
  echo "The location ID is: " . $locationId;
  $sql = "DELETE FROM Location WHERE id=$locationId";

  if ($conn->query($sql) === TRUE) {
    // Redirect the user to a confirmation page or the previous page
    header("Location: confirmation_page.php");
    exit;
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
  // Use the $locationId variable to delete the corresponding location from the database
  // ...

  // Redirect the user to a confirmation page or the previous page
//   header("Location: confirmation_page.php");
header("Location: ../pages/Location.php");
  exit;
} else {
  // Handle the case where the locationId was not passed in the form submission
  // ...
}
?>