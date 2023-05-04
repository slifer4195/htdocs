<head>
    <style>
        .update-button {
            cursor: pointer;
            width: 80px;
            font-size: 15px;
            font-family: 'Times New Roman', Times, serif
        }
    </style>


</head>

<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Build the SQL query to select all data from the Activity table
$sql = "SELECT * FROM Activity";

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);
// $result2 = mysqli_query($conn, $sql2);

// Check if there are any rows in the result
if (mysqli_num_rows($result) >= 0) {
  // Initialize an empty array to store the data
  $data = array();

  // Loop through the result and store each row in the data array
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
} else {
  echo "No data found.";
}

$id = $_GET['updateid'];
$ActivityID = $_GET["activityid"];
$rating = $_GET["rating"];

if (isset($_POST["submit"])) {
    $activityid = $_POST["id-update"];
    $rating = $_POST["rating-update"];

    $sql = "UPDATE Reviews SET ActivityID= '$activityid', Rating = '$rating' WHERE ReviewID = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../pages/Review.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>

<div class='item-form'>
    <br><br><br>
    <form method="post">
        <center>
            <p class="instruction">Activity</p>
            <label for="activity-dropdown">Select a Activity:</label>
            <select id="activity-dropdown" name="id-update">
                <?php foreach ($data as $row) { ?>
                    <option value="<?php echo $row['ActivityID']; ?>"><?php echo $row['ActivityType']; ?></option>
                <?php } ?>
            </select>

            <label for="rating-dropdown">Select a Rating:</label>
            <select id="rating-dropdown" name="rating-update">
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select>

            <br><br><br>
            <button type="submit" name="submit" class="update-button">
                <p>Update</p>
            </button>
        </center>
    </form>
    </center>
</div>