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

    <div class='item-display'>
            <h1>List of Flights</h1>
            <center>
                <table class="flight-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Flight Name</th>
                            <th scope="col">Flight Price</th>
                            <th scope="col">Join Flight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serverName = "localhost";
                        $dBUsername = "root";
                        $dBPassword = "";
                        $dBName = "AnyWhere";

                        $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM Flights";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $FlightID = $row['FlightID'];
                                $FlightName = $row['FlightName'];
                                $FlightPrice = $row['FlightPrice'];
                                echo '
                                <tr>
                                <th scope="row">' . $FlightID . '</th>
                                <td>' . $FlightName . '</td>
                                <td> $' . $FlightPrice . '</td>
                                <center>
                                <td><a class="join-feature" href="../includes/flightJoin.inc.php? joinid=' . $FlightID . ' & name=' . $FlightName . ' & price=' . $FlightPrice . '">Join</a></td>
                                </center>
                                </tr> 
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </center>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
</body>

</html>