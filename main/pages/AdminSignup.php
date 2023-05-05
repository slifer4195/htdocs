<!-- 
Name: Jun Lee

Description: 
This file is a admin sign-up page.
-->

<!doctype html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>
    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />

    <style>
        .bg {
            background-image: url('/img/ivory.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 95vh;
        }

        .signup-form {
            border: 2px solid white;
            width: 30%;
            height: 740px;
            background-color: #5CA36C;
        }

        .signup-form h1 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            font-size: 32px;
            letter-spacing: 1px;
            color: white;
            margin-top: 20px;
            margin-bottom: 45px;
        }

        .signup-form>p {
            text-align: center;
            font-size: 21px;
            margin-top: -2px;
            margin-left: 25px;
            font-weight: bold;
            font-style: italic;
            color: white;
        }

        .instruction {
            text-align: center;
            font-size: 15px;
            margin-bottom: 5px;
            letter-spacing: 0.7px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-left: 10px;
            font-weight: bold;
            color: #EBECF0;
        }

        input[type="email"] {
            text-align: center;
        }

        input[type="text"] {
            text-align: center;
        }

        input[type="password"] {
            text-align: center;
        }

        .signup-button {
            margin-top: 20px;
            background-color: white;
            color: #5CA36C;
            border-radius: 10px;
            border: 2px solid;
            border-color: #5CA36C;
            font-family: 'Mulish', sans-serif;
            font-weight: bold;
            width: 125px;
        }

        .signup-button>p {
            font-family: 'Mulish', sans-serif;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 0px;
        }

        .reset-button {
            margin-top: 20px;
            align-items: center;
            text-align: center;
            background-color: white;
            color: #5CA36C;
            border-radius: 10px;
            border: 2px solid;
            border-color: #5CA36C;
            font-family: 'Mulish', sans-serif;
            font-weight: bold;
            height: 58px;
            width: 115px;
        }

        .reset-button>p {
            font-family: 'Mulish', sans-serif;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 0px;
        }

        @media only screen and (max-width: 600px) {
            .signup-form {
                width: 90%;
            }
        }
    </style>
</head>

<body class="index">
    <div id="fb-root"></div>
    <script>
        var password = document.getElementById("password"),
            passwordRepeat = document.getElementById("passwordRepeat");

        function validatePassword() {
            if (password.value != passwordRepeat.value) {
                passwordRepeat.setCustomValidity("Passwords Don't Match");
            } else {
                passwordRepeat.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        passwordRepeat.onkeyup = validatePassword;
    </script>

    <header class="header contain-to-grid">
        <?php
        include '../NavigationBar.php'
        ?>
    </header>

    <div class="bg">
        <div class='signup-form'>
            <h1>Admin Sign Up</h1>
            <form action="../includes/adminSignup.inc.php" method="post">
                <center>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p style='color:black; font-weight:bold; letter-spacing: 0.5px; font-size: 18px;'>Fill in all fields!</p>";
                        }
                    }
                    ?>
                    <p class="instruction">First Name</p>
                    <input type="text" name="firstName" style="width: 220px">
                    <p class="instruction">Last Name</p>
                    <input type="text" name="lastName" style="width: 220px">
                    <p class="instruction">Email</p>
                    <input type="email" name="email" style="width: 220px">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emailtaken") {
                            echo "<p style= 'color: black; letter-spacing: 0.5px;'>Email is already taken!</p>";
                        } else if ($_GET["error"] == "invalidemail") {
                            echo "<p style= 'color: black; letter-spacing: 0.5px;'>Choose a proper email!</p>";
                        }
                    }
                    ?>
                    <p class="instruction">Password</p>
                    <input type="password" id="password" name="password" style="width: 220px">
                    <input type="password" id="passwordRepeat" name="passwordRepeat" placeholder="Repeat Password" style="width: 220px">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p style='color:black'>Passwords do not match!</p>";
                        }
                    }
                    ?>
                    <p class="instruction">Age</p>
                    <input type="text" name="age" style="width: 220px">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidage") {
                            echo "<p style='color:black'>Invalid age! please enter the number.</p>";
                        }
                    }
                    ?>
                    <button type="submit" name="submit" class="signup-button">
                        <p>Sign Up</p>
                    </button>
                    <!-- <button type="reset" name="reset" class="reset-button">
                            <p>Reset</p>
                        </button> -->
                </center>
            </form>
        </div>

        <!-- Error Handling -->
        <center>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    // echo '<script type="text/javascript">';
                    // echo ' alert("Fill in all fields!")';
                    // echo '</script>';
                } else if ($_GET["error"] == "invalidemail") {
                    // echo '<script type="text/javascript">';
                    // echo ' alert("Choose a proper email!")';
                    // echo '</script>';
                } else if ($_GET["error"] == "passwordsdontmatch") {
                    // echo '<script type="text/javascript">';
                    // echo ' alert("Passwords do not match!")';
                    // echo '</script>';
                } else if ($_GET["error"] == "emailtaken") {
                    // echo '<script type="text/javascript">';
                    // echo ' alert("Email is already taken!")';
                    // echo '</script>';
                } else if ($_GET["error"] == "stmtfailed") {
                    echo '<script type="text/javascript">';
                    echo ' alert("Something went wrong, try again!")';
                    echo '</script>';
                } else if ($_GET["error"] == "none") {
                    echo '<script type="text/javascript">';
                    echo ' alert("You have successfully signed up!")';
                    echo '</script>';
                    // echo "<p>You have signed up!</p>";
                }
            }
            ?>
        </center>
    </div>


    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
</body>

</html>