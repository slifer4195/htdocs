<!-- 
Name: Jack Warham

Description: 
This file helps users insert an review from the user review page.

-->

<?php

if (isset($_POST["submit"])) {
    $userID = $_POST["userid"];
    $ActivityID = $_POST["activityid"];
    $rating = $_POST["rating"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createReview($conn, $userID, $ActivityID, $rating);
} else {
    header("location: ../pages/Review.php");
    exit();
}

?>