<?php

if (isset($_POST["submit"])) {
    $userID = $_POST["userid"];
    $ActivityID = $_POST["activityid"];
    $rating = $_POST["rating"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createReview($conn, $userID, $ActivityID, $rating);
} else {
    header("location: ../pages/AdminReview.php");
    exit();
}

?>