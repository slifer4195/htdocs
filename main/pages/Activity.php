<!-- 
Name: Sung Rung Yoo

Description: 
This file is for general user to view the activity page that lets admin to insert and delte
-->


<?php
// Connect to the database
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "AnyWhere";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// aa

// Build the SQL query to select all data from the Location table
$sql = "SELECT * FROM Location";
// $sql2 = "SELECT * FROM Activity";

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



//  $sql2 = "SELECT * FROM Act";
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

?>


<!doctype html>
<html lang="en">

<head>
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>
    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />

    <style>
        .bg {
            background-image: url('/img/ivory.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body class="index">
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=277385395761685";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <header class="header contain-to-grid">
        <?php
        include '../NavigationBar.php'
        ?>
    </header>

    <div class="bg">
        <div class="row">
            <div class="large-12 columns">
                <h2>Activity</h2>
                <form method="post" action="../includes/add_act.php">
                <label for="location-dropdown">Select a location ID:</label>
                <select id="location-dropdown" name="location_id">
                <?php foreach ($data as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
                <?php } ?>
                </select>

                    <input type="text" id="act-name" name="act_name" placeholder="activity type">
                    <input type="text" id="act-price" name="act_price" placeholder="activity price (int)">

                <input type="submit" value="Submit">

                
                </form>
                <?php foreach ($data2 as $row2) { ?>
                    <td>Location ID:</td>
                    <td><?php echo $row2['LocationID']; ?></td>
                    <td>Activity Type:</td>
                    <td><?php echo $row2['ActivityType']; ?></td>
                    <td>Activity Price:</td>
                    <td><?php echo $row2['ActivityPrice']; ?></td>
                    <br/>

                    <form method="post" action="../includes/delete_act.php">
                            <input type="hidden" name="id" value="<?php echo $row2['ActivityID']; ?>">
                            <button type="submit">Delete</button>
                    </form>

                <?php } ?>

            </div>
        </div>
    </div>
    </div>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
</body>

</html>

