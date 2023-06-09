<!-- 
Name: Jun Lee, Jack Warham

Description: 
This file is a collection of functions used in various places.

-->

<?php
session_start();

// Name: Jun Lee
// Error Handling for the empty input in the sign-up page
function emptyInputSignup($firstName, $lastName, $email, $password, $passwordRepeat, $age)
{
    $result = false;
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordRepeat) || empty($age)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Name: Jun Lee
// Error Handling for the invalid age in the sign-up page
function invalidAge($age)
{
    $result = false;
    // Search Algorithm
    if (!preg_match("/^[0-9]*$/", $age)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Name: Jun Lee
// Error Handling for the invalid email in the sign-up page
function invalidUid($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Name: Jun Lee
// Error Handling to check if the pasword and the repeated passwrod are 
// the same
function pwdMatch($password, $passwordRepeat)
{
    $result = false;
    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Name: Jun Lee
// Error Handling to check if the email user entered already exsists
function emailExists($conn, $email)
{
    $sql = "SELECT * FROM Users WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/SignUp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

// Name: Jun Lee
// Create a user with the sign-up information
function createUser($conn, $firstName, $lastName, $email, $age, $password)
{
    $sql = "INSERT INTO Users (FirstName, LastName, Email, Age, UserPassword) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/SignUp.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $age, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Name: Jun Lee
// Error Handling for the empty input in the sign-in page
function emptyInputLogin($email, $password)
{
    $result = false;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Name: Jun Lee
// Log in with the log in information
function loginUser($conn, $email, $password)
{
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {
        header("location: ../pages/SignIn.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["UserPassword"];
    $checkpwd = password_verify($password, $pwdHashed);

    if ($checkpwd === false) {
        header("location: ../pages/SignIn.php?error=wronglogin");
        exit();
    } else if ($checkpwd === true) {
        session_start();

        $_SESSION["userid"] = $emailExists["UserID"];
        $_SESSION["useremail"] = $emailExists["Email"];
        $_SESSION["userpassword"] = $emailExists["UserPassword"];
        $_SESSION["userfirstname"] = $emailExists["FirstName"];
        $_SESSION["userlastname"] = $emailExists["LastName"];
        $_SESSION["userage"] = $emailExists["Age"];
        $_SESSION["usertype"] = $emailExists["UserType"];
        header("location: ../pages/Home.php");
        exit();
    }
}

// Name: Jun Lee
// Error Handling for the empty input in the item page
function emptyInputItem($itemType, $weight)
{
    $result = false;
    if (empty($itemType) || empty($weight)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Name: Jun Lee
// Error Handling for the invalid item weight in the item page
function invalidWeight($weight)
{
    $result = false;
    // Search Algorithm
    if (!preg_match("/^[+-]?([0-9]+([.][0-9]*)?|[.][0-9]+)$/", $weight)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Name: Jun Lee
// Create item with the item information
function createItem($conn, $userID, $itemType, $weight)
{
    $sql = "INSERT INTO Item (UserID, ItemType, ItemWeight) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/Item.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iss", $userID, $itemType, $weight);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/Item.php?error=none");
    exit();
}

// Name: Jack Warham
// Creates item then redirects to admin item page
function createItemAdmin($conn, $userID, $itemType, $weight)
{
    $sql = "INSERT INTO Item (UserID, ItemType, ItemWeight) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/AdminItem.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iss", $userID, $itemType, $weight);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/AdminItem.php?error=none");
    exit();
}

// Name: Jack Warham
// creates review using userid, activityid, and rating then redirects to user review page
function createReview($conn, $userID, $ActivityID, $Rating)
{
    $sql = "INSERT INTO Reviews (UserID, ActivityID, Rating) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/Review.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iii", $userID, $ActivityID, $Rating);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/Review.php?error=none");
    exit();
}

// Name: Jack Warham
// creates review using userid, activityid, and rating then redirects to admin review page
function createReviewAdmin($conn, $userID, $ActivityID, $Rating)
{
    $sql = "INSERT INTO Reviews (UserID, ActivityID, Rating) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/AdminReview.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iii", $userID, $ActivityID, $Rating);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/AdminReview.php?error=none");
    exit();
}

// Name: Jun Lee
// Update the profile with the updated profile information
function updateProfile($conn, $firstName, $lastName, $password, $email, $age)
{
    $id = $_SESSION["userid"];

    if ($email == "") {
        $email = $_SESSION["useremail"];
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE Users SET FirstName= '$firstName', LastName='$lastName', Email='$email', Age='$age' WHERE UserID= '$id'";
    $result = mysqli_query($conn, $sql);

    if ($password != "") {
        $sql2 = "UPDATE Users SET UserPassword = '$hashedPwd' WHERE UserID = '$id'";
        $result2 = mysqli_query($conn, $sql2);
    }

    if ($result) {
        $_SESSION["userfirstname"] = $firstName;
        $_SESSION["userlastname"] = $lastName;
        $_SESSION["useremail"] = $email;
        $_SESSION["userage"] = $age;
        $_SESSION["userpassword"] = $password;
        header("location: ../pages/Profile.php?error=none");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}

// Name: Jun Lee
// Create a admin account
function createUserAdmin($conn, $firstName, $lastName, $email, $age, $password)
{
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (FirstName, LastName, Email, Age, UserPassword, UserType) VALUES ('$firstName', '$lastName', '$email', '$age', '$hashedPwd', 1)";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die(mysqli_error($conn));
    }
}

// Name: Jack Warham
// deletes any item given a corresponding user id
function deleteItems($conn, $id)
{
    $sql = "DELETE FROM Items WHERE UserID=$id";
    mysqli_query($conn, $sql);
}

// Name: Jack Warham
// deletes any review given a corresponding user id
function deleteReviewsUser($conn, $id)
{
    $sql = "DELETE FROM Reviews WHERE UserID=$id";
    mysqli_query($conn, $sql);
}

// Name: Jack Warham
// deletes any review given a corresponding activity id
function deleteReviewsActivity($conn, $id)
{
    $sql = "DELETE FROM Reviews WHERE ActivityID=$id";
    mysqli_query($conn, $sql);
}
