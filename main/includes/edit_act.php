<!-- 
// Name: Sung Rung Yoo

// Description: 
// This page allows admin user to edit activity from the admin activity page
// -->

<?php 
      
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "AnyWhere";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    $sql = "SELECT * FROM Location";

    $result = mysqli_query($conn, $sql);

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


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['Save_changes'])) {
        $actName = $_POST['act_name'];
        $actPrice = $_POST['act_price'];
        $locationId = $_POST['location_id'];
        $actId = (int)$_POST['id'];
        echo "The act ID is: " . $actId;

        // Call your PHP function here, passing in $locationName and $locationWeather as parameters.
        // Example: myFunction($locationName, $locationWeather);
        $sql = "UPDATE Activity SET ActivityPrice='$actPrice', ActivityType='$actName',LocationID='$locationId' WHERE ActivityID='$actId'";
        // $locationName = $_POST['locationName'];
      
        if (mysqli_query($conn, $sql)) {
          echo "Record updated successfully";
          header("Location: ../pages/actAdmin.php");
          exit();
       
   
        } else {
          echo "Error updating record: " . $conn->error;
        }
    } else {
      $actName = $_POST['act_name'];
      $actPrice = $_POST['act_price'];
      $locationId = $_POST['location_id'];
      $actId= $_POST['id'];
    }
?>

<form method="post" action="">
    <label for="act_name">Activity Type:</label>
    <input type="text" id="act_name" name="act_name" value="<?php echo $actName; ?>">
    <br>
    <label for="act_price">Activity price:</label>
    <input type="text" id="act_price" name="act_price" value="<?php echo $actPrice; ?>">
    <label for="act_price">Location ID:</label>
    <select id="location-dropdown" name="location_id">
                <?php foreach ($data as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
                <?php } ?>
    </select>
    <br>
    <input type="hidden" name="id" value="<?php echo $actId; ?>">
    <input type="submit" name="Save_changes" value="Save changes">
</form>
