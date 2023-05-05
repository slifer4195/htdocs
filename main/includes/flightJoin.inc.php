<?php
    session_start();
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "AnyWhere";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = $_GET['joinid'];

    $sql = "SELECT * FROM Flights";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql2 = "INSERT INTO OnFlight (FlightId, UserID) VALUES ('$id', {$_SESSION["userid"]})";
        $result2 = mysqli_query($conn, $sql2);
    }
?>

<div class='onflight-form'>
    <br><br><br>
    <h1>Your List of Flights Joined</h1>
    <center>
        <table class="userflight-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Flight Name</th>
                    <th scope="col">Flight Price</th>
                    <th scope="col">Remove</th>
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

                $sql3 = "SELECT FlightID FROM OnFlight WHERE UserID = {$_SESSION["userid"]}";
                $result3 = mysqli_query($conn, $sql3);

                if ($result3 && mysqli_num_rows($result3) > 0) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        $FlightID = $row3['FlightID'];

                        $sql4 = "SELECT * FROM Flights WHERE FlightID = $FlightID";
                        $result4 = mysqli_query($conn, $sql4);

                        if ($result4 && mysqli_num_rows($result4) > 0) {
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                $FlightName = $row4['FlightName'];
                                $FlightPrice = $row4['FlightPrice'];
                                echo '
                                <tr>
                                <th scope="row">' . $FlightID . '</th>
                                <td>' . $FlightName . '</td>
                                <td> $' . $FlightPrice . '</td>
                                <center>
                                        <td><a class="delete-feature" href="../includes/flightDelete.inc.php? deleteid=' . $FlightID . ' & name=' . $FlightName . ' & price=' . $FlightPrice . '">Delete</a></td>
                                </center>
                                </tr> 
                                ';
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </center>
</div>
