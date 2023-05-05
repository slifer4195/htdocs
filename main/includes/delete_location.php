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

$sql2 = "SELECT * FROM Activity";
 
// Execute the query and store the result in a variable
$result2 = mysqli_query($conn, $sql2);
// $result2 = mysqli_query($conn, $sql2);

// Check if there are any rows in the result
if (mysqli_num_rows($result2) >= 0) {
  // Initialize an empty array to store the data
  $data2 = array();

  // Loop through the result and store each row in the data array
  while ($row2 = mysqli_fetch_assoc($result2)) {
    $data2[] = $row2;
  }
} else {
  echo "No data found.";
}

// Check if the locationId was passed in the form submission
if (isset($_POST['id'])) {
  // Retrieve the locationId from the $_POST array
  $locationId = $_POST['id'];
  echo "The location ID is: " . $locationId;

  foreach ($data2 as $row2){
    
    if ($row2["LocationID"] == $locationId){
      $sql2 = "DELETE FROM Activity WHERE LocationID=$locationId";
      if ($conn->query($sql2) === TRUE) {
        // Redirect the user to a confirmation page or the previous page
        echo "";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
    
    }
  }



  $sql = "DELETE FROM Location WHERE id=$locationId";

  

  if ($conn->query($sql) === TRUE) {
    // Redirect the user to a confirmation page or the previous page
    header("Location: ../pages/Location.php");
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





