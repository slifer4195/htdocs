<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['location_name']) && isset($_POST['location_weather'])) {
    $location_name = $_POST['location_name'];
    $location_weather = $_POST['location_weather'];
  
    echo "Location Name: " . $location_name . "<br>";
    echo "Location Weather: " . $location_weather;
  
    // Sanitize and quote the input values
    $location_name = $conn->real_escape_string($location_name);
    $location_weather = $conn->real_escape_string($location_weather);
  
    // Build the SQL query with properly quoted string values
    $sql = "INSERT INTO Location (locationName, locationWeather) VALUES ('$location_name', '$location_weather')";
  
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: ../pages/locAdmin.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    echo "Please provide both location name and location weather.";
  }
?>  