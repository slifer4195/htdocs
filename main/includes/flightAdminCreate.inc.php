<!-- 
Name: Jessica Odutola
Description: 
This file is for admin to create flights.
-->
<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['flight_name']) && isset($_POST['flight_price'])) {
    $flight_name = $_POST['flight_name'];
    $flight_price = $_POST['flight_price'];
    $location_id = $_POST['location_id'];
  
    echo "Flight Name: " . $flight_name . "<br>";
    echo "Flight Price: " . $flight_price . "<br>";
    echo "Location ID: " . $location_id;
  
    // Sanitize and quote the input values
    $flight_name = $conn->real_escape_string($flight_name);
    $flight_price = $conn->real_escape_string($flight_price);
    $location_id = $conn->real_escape_string($location_id);
  
    // Build the SQL query with properly quoted string values
    $sql = "INSERT INTO Flights (FlightName, FlightPrice, LocationID) VALUES ('$flight_name', '$flight_price', '$location_id')";
  
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Flight: ../pages/FlightAdmin.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    echo "Please provide both flight name and flight price and location id.";
  }
?>  