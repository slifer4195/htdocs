<!-- 
// Name: Sung Rung Yoo

// Description: 
// This page allows anyone to edit location from location page if signed in
// -->


<?php 
      
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "AnyWhere";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['Save_changes'])) {
        $locationName = $_POST['locationName'];
        $locationWeather = $_POST['locationWeather'];
        $locationId = $_POST['id'];
      
        // Call your PHP function here, passing in $locationName and $locationWeather as parameters.
        // Example: myFunction($locationName, $locationWeather);
        $sql = "UPDATE Location SET locationName='$locationName', locationWeather='$locationWeather' WHERE id='$locationId'";
        $locationName = $_POST['locationName'];
        
        echo "Submitted";
        if (mysqli_query($conn, $sql)) {
          echo "Record updated successfully";
          header("Location: ../pages/Location.php");
          exit();
       
          $sql = "SELECT * FROM Location";
          $result = mysqli_query($conn, $sql);
         
          // Check if there are any results 
          if (mysqli_num_rows($result) > 0) {
              // Output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                  echo "id: " . $row["id"]. " - Name: " . $row["locationName"];
              }
          } else {
              echo "0 results";
          }

        } else {
          echo "Error updating record: " . $conn->error;
        }
    } else {
      $locationName = $_POST['locationName'];
      $locationWeather = $_POST['locationWeather'];
      $locationId = $_POST['id'];
   
    }
?>

<form method="post" action="">
    <label for="locationName">Location name:</label>
    <input type="text" id="locationName" name="locationName" value="<?php echo $locationName; ?>">
    <br>
    <label for="locationWeather">Location weather:</label>
    <input type="text" id="locationWeather" name="locationWeather" value="<?php echo $locationWeather; ?>">
    <input type="hidden" id = 'id' name="id" value="<?php echo $locationId; ?>">
    <br>
    <input type="submit" name="Save_changes" value="Save changes">
</form>
