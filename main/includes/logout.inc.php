<!-- 
Name: Jun Lee

Description: 
This file is for log out feature.
-->

<?php

// Destroy the session to successfully log out
session_start();
session_unset();
session_destroy();

header("location: ../pages/Home.php");
exit();
