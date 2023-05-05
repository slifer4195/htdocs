<!-- 
Name: Jun Lee

Description: 
This file is for the admin to update user's login information.
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

<!--
  First, connect to the database, and if it connects successfully, get the
  login information to update the user's profile. 
  If it updates successfully, go to the admin account management page, but 
  if not, throw an error.
  -->
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
$FirstName = $_GET["firstname"];
$LastName = $_GET["lastname"];
$Email = $_GET["email"];
$Age = $_GET["age"];

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname-update"];
    $lastname = $_POST["lastname-update"];
    $email = $_POST["email-update"];
    $age = $_POST["age-update"];

    if ($age == "") {
        $age = $Age;
    }

    $sql = "UPDATE Users SET FirstName= '$firstname', LastName = '$lastname', Email = '$email', Age ='$age' WHERE UserID = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../pages/AdminAccount.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!--
  This is an update form that the admin can use to update a user's profile.
  -->
<div class='item-form'>
    <br><br><br>
    <form method="post">
        <center>
            <p class="instruction">First Name</p>
            <input type="text" name="firstname-update" <?php echo "value='$FirstName'" ?> style="width: 220px">
            <p class="instruction">Last Name</p>
            <input type="text" name="lastname-update" <?php echo "value='$LastName'" ?> style="width: 220px">
            <p class="instruction">Email</p>
            <input type="text" name="email-update" <?php echo "value='$Email'" ?> style="width: 220px">
            <p class="instruction">Age</p>
            <input type="text" name="age-update" <?php echo "value='$Age'" ?> style="width: 220px">

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