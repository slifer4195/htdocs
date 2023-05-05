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

$id = $_GET['updateid'];
$name = $_GET["flightName"];
$price = $_GET["flightPrice"];

if (isset($_POST["submit"])) {
    $flightName = $_POST["name-update"];
    $flightPrice = $_POST["price-update"];

    if ($flightPrice == "") {
        $flightPrice = $price;
    }

    $sql = "UPDATE Flights SET FlightName = '$flightName', FlightPrice = '$flightPrice' WHERE FlightID = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../pages/FlightAdmin.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>

<div class='flight-update-form'>
    <br><br><br>
    <form method="post">
        <center>
            <p class="instruction">Flight Name</p>
            <input type="text" name="name-update" <?php echo "value='$name'" ?> style="width: 220px">
            <p class="instruction">Flight Price</p>
            <input type="text" name="price-update" <?php echo "value='$price'" ?> style="width: 220px">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidweight") {
                    echo "<p style= 'color: black; letter-spacing: 0.5px;'>Please just include numbers!</p>";
                }
            }
            ?>
            <br><br><br>
            <button type="submit" name="submit" class="update-button">
                <p>Update</p>
            </button>
        </center>
    </form>
    </center>
</div>