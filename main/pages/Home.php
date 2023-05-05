<?php
session_start();
?>

<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>

    <style>
    .bg {
        background-image: url('/img/background-anywhere.jpeg');
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 100vh;
    }

    .text-hero {
        position: absolute;
        top: 48%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .text-hero h1 {
        text-align: center;
        font-family: 'Mulish', sans-serif;
        font-weight: bold;
        font-size: 52px;
        letter-spacing: 0.5px;
        color: white;
        margin-bottom: 10px;
    }

    .text-hero>p {
        font-size: 21px;
        text-align: center;
        margin-top: -2px;
        font-weight: bold;
        font-style: italic;
        color: white;
    }

    .welcomeFont {
        text-align: center;
        font-family: 'Mulish', sans-serif;
        font-weight: bold;
        font-size: 45px;
        color: white;
        margin-bottom: 25px;
    }

    .nameFont {
        font-size: 27px;
        text-align: center;
        margin-top: -2px;
        font-weight: bold;
        color: white;
        width: 100%;
        letter-spacing: 0.5px;
        margin-bottom: 40px;
    }

    @media only screen and (max-width: 600px) {
        .bg {
            background-image: url('/img/mobile-bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }

        .text-hero h1 {
            font-size: 49px;
        }

        .text-hero>p {
            font-size: 18px;
        }

        .welcomeFont {
            font-size: 39px;
        }

        .nameFont {
            font-size: 23px;
            width: 350px;
            margin-bottom: 40px;
        }
    }

    @media only screen and (min-width:601px) and (max-width: 960px) {
        .bg {
            background-image: url('/img/mobile-bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
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
        <div class='text-hero'>
            <?php
            // check if the user actullay logged in 
            if (isset($_SESSION["useremail"])) {
                if (isset($_SESSION["usertype"])) {
                    echo "<div class='welcomeFont'>" . $_SESSION["userfirstname"] . " :)</div>";
                    echo "<div class='nameFont'>(Admin)</div>";
                    echo "<div class='nameFont'>Welcome to AnyWhere</div>";
                } else {
                    echo "<div class='welcomeFont'>" . $_SESSION["userfirstname"] . ":)</div>";
                    echo "<div class='nameFont'>Welcome to AnyWhere</div>";
                }
            } else {
                echo "<h1>AnyWhere</h1>";
                echo "<p>Makes Travel Easier</p>";
            }
            ?>
            <!-- <h1>AnyWhere</h1>
            <p>Makes Travel Easier</p> -->
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
</body>

</html>