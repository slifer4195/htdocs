<!-- 
Name: Jack warham

Description: 
This file is to update a specific row from the item table then redirect to the admin page.

-->

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
$weight = $_GET["weight"];
$type = $_GET["type"];

if (isset($_POST["submit"])) {
    $itemtype = $_POST["item-update"];
    $ItemWeight = $_POST["weight-update"];

    if ($ItemWeight == "") {
        $ItemWeight = $weight;
    }

    $sql = "UPDATE Item SET ItemType= '$itemtype', ItemWeight = '$ItemWeight' WHERE ItemID = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../pages/AdminItem.php");
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
            <p class="instruction">Item Type</p>
            <input type="text" name="item-update" <?php echo "value='$type'" ?> style="width: 220px">
            <p class="instruction">Weight</p>
            <input type="text" name="weight-update" <?php echo "value='$weight'" ?> style="width: 220px">
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