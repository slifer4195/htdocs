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
if (isset($_POST["submit"])) {
    $password = $_POST["admin-signup-password"];

    if ($password = 19) {
        echo "<script type=\"text/javascript\">window.alert('Verified!');window.location.href = '../pages/AdminSignup.php';</script>";
    }
}
?>

<div class='admin-signup-form'>
    <br><br><br>
    <form method="post">
        <center>
            <p class="instruction">Password</p>
            <input type="text" name="admin-signup-password" style="width: 220px">
            <br><br><br>
            <button type="submit" name="submit" class="update-button">
                <p>Verify</p>
            </button>
        </center>
    </form>
</div>