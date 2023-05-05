<!-- 
Name: Jack Warham

Description: 
This file helps admins insert a review from the admin review page.

-->
<?php

if (isset($_POST["submit"])) {
    $userID = $_POST["userid"];
    $ActivityID = $_POST["activityid"];
    $rating = $_POST["rating"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createReviewAdmin($conn, $userID, $ActivityID, $rating);
} else {
    header("location: ../pages/AdminReview.php");
    exit();
}

?>