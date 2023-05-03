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

// Build the SQL query to select all data from the Location table
$sql = "SELECT * FROM Location";

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);

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

// Close the database connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
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
                <h2>Location</h2>
                <form method="post" action="../includes/process_form.php">
                <label for="location-name">Location Name:</label>
                <input type="text" id="location-name" name="location_name">

                <label for="location-weather">Location Weather:</label>
                <input type="text" id="location-weather" name="location_weather">

                <input type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <h3>List of locations</h3>
                <?php foreach ($data as $row) { ?>
                    <br/>
                    <li>
                        <td>Location:</td>
                        <td><?php echo $row['locationName']; ?></td>

                        <td>Weather:</td>
                        <td><?php echo $row['locationWeather']; ?></td>
                </li>
                    <td>
                        <form method="post" action="../includes/delete_location.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
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