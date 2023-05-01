
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $sql = "CREATE TABLE Location (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     locationName VARCHAR(30) NOT NULL,
//     locationWeather VARCHAR(30) NOT NULL
//     )";

// if (mysqli_query($conn, $sql)) {
//     echo "Table MyGuests created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($conn);
//   }
//   mysqli_close($conn);


$sql = "INSERT INTO Location (locationName, locationWeather)
VALUES ('Texas', 'hot')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

