<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Build the SQL query to select all data from the Location table
$sql = "SELECT * FROM Activity";

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);
// $result2 = mysqli_query($conn, $sql2);

// Check if there are any rows in the result
if (mysqli_num_rows($result) > 0) {
  // Initialize an empty array to store the data
  $data = array();

  // Loop through the result and store each row in the data array
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
} else {
  echo "No data found.";
}

// <!-- 
// Name: Sung Rung Yoo

// Description: 
// This file address the add page for activity page
// -->

if (isset($_POST['act_name'])) {
    $act_name = $_POST['act_name'];
    $act_price = (int)$_POST['act_price'];
    $location_id = (int)$_POST['location_id'];
    echo $act_name;
    echo $act_price;
    echo "loc";
    echo $location_id;
    // // echo "Submitted";
    // $location_name = $conn->real_escape_string($location_name);
    // $location_weather = $conn->real_escape_string($location_weather);
  
    // Build the SQL query with properly quoted string values
    $sql = "INSERT INTO Activity (ActivityType, LocationID, ActivityPrice) VALUES ('$act_name', '$location_id','$act_price')";
  
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: ../pages/Activity.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    echo "Please provide both location name and location weather.";
  }
    
?>  