
<?php
$sql = "INSERT INTO Location (locationName, locationWeather)
VALUES ('Texas', 'hot')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>