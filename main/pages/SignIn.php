<!doctype html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
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

    .signin-form {
        border: 2px solid white;
        width: 30%;
        height: 700px;
        background-color: #5CA36C;
    }

    .signin-form h1 {
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        font-size: 32px;
        letter-spacing: 0.5px;
        color: white;
        margin-top: 50px;
        margin-bottom: 5px;
    }

    .signin-form>p {
        text-align: center;
        font-size: 16px;
        margin-top: -2px;
        font-weight: bold;
        color: white;
    }

    .instruction {
        text-align: center;
        font-size: 21px;
        margin-bottom: 5px;
        margin-left: 10px;
        font-weight: bold;
        color: white;
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
        margin-top: 30px;
        background-color: white;
        color: #5CA36C;
        border-radius: 10px;
        border: 2px solid;
        border-color: #5CA36C;
        font-family: 'Mulish', sans-serif;
        font-weight: bold;
    }

    .signup-button>p {
        font-family: 'Mulish', sans-serif;
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 0px;
    }

    .anywhere-logo {
        width: 150px;
        height: 150px;
        margin-bottom: 20px;
    }

    .sign-up-link {
        color: #E5C899;
        font-size: 15px;
        margin-left: 5px;
    }

    @media only screen and (max-width: 600px) {
        .signin-form {
            width: 90%;
        }
    }

    @media only screen and (min-width:601px) and (max-width: 960px) {
        .signin-form {
            width: 80%;
            height: 750px;
        }

        .bg {
            min-height: 95vh;
        }
    }

    @media only screen and (min-width:1904px) {
        .signin-form {
            width: 50%;
            height: 1000px;
        }

        .signin-form h1 {
            margin-top: 120px;
            margin-bottom: 5px;
            font-size: 40px;
        }

        .anywhere-logo {
            margin-bottom: 80px;
        }

        .instruction {
            font-size: 23px;
        }

        .signin-form>p {
            font-size: 22px;
        }

        .sign-up-link {
            font-size: 20px;
        }

        .signup-button>p {
            font-size: 20px;
        }

    }
    </style>
</head>

<body class="index">
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=277385395761685";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <header class="header contain-to-grid">
        <?php
        include '../NavigationBar.php'
        ?>
    </header>

    <div class="bg">
        <div class='signin-form'>
            <h1>Welcome to AnyWhere!</h1>
            <center>
                <img class="anywhere-logo" src="/img/Anywhere-removebg-preview.png">
            </center>
            <form action="../includes/login.inc.php" method="post">
                <center>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p style='color:black; font-weight:bold; letter-spacing: 0.5px;'>Fill in all fields!</p>";
                        }
                    }
                    ?>
                    <p class="instruction">Email</p>
                    <input required type="email" name="email" placeholder="Email" style="width: 250px">
                    <p class="instruction">Password</p>
                    <input required type="password" name="password" placeholder="Password" style="width: 250px">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "wronglogin") {
                            echo "<p style='color:black'>Incorrect login information!</p>";
                        }
                    }
                    ?>
                    <button type="submit" name="submit" class="signup-button">
                        <p>Sign In</p>
                    </button>
                    <!-- <button type="reset" name="reset">Reset</button> -->
                </center>
            </form>
            <p class="instruction">Need an account? <a class="sign-up-link" href="/main/pages/SignUp.php">Sign
                    up</a>
            </p>
            <br>
            <p class="instruction">Admin account? <a class="sign-up-link"
                    href="/main/pages/AdminSignupVerification.php">Sign
                    up</a>
            </p>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
</body>

</html>