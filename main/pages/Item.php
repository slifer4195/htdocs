<?php
session_start();
?>

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
        .bg-item {
            background-image: url('/img/ivory.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .item-form {
            border: 2px solid white;
            width: 30%;
            height: 500px;
            background-color: #5CA36C;
            margin: 50px;
        }

        .item-display {
            border: 2px solid white;
            width: 30%;
            height: 700px;
            background-color: #5CA36C;
        }

        .item-display h1 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            font-size: 30px;
            letter-spacing: 1px;
            color: white;
            margin-top: 50px;
            margin-bottom: 45px;
        }

        .item-form h1 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            font-size: 32px;
            letter-spacing: 1px;
            color: white;
            margin-top: 70px;
            margin-bottom: 45px;
        }

        .item-form>p {
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

        .item-button {
            margin-top: 20px;
            background-color: white;
            color: #5CA36C;
            border-radius: 10px;
            border: 2px solid;
            border-color: #5CA36C;
            font-family: 'Mulish', sans-serif;
            font-weight: bold;
            width: 150px;
        }

        .item-button>p {
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

        .item-table {
            width: 80%;
        }

        .delete-feature {
            color: white;
            font-family: 'Mulish', sans-serif;
            background-color: #5CA36C;
            border: 2px solid #5CA36C;
            padding: 3px;
        }

        .delete-feature:hover {
            color: red;
        }

        .update-feature {
            color: white;
            font-family: 'Mulish', sans-serif;
            background-color: #779ECB;
            border: 2px solid #779ECB;
            padding: 3px;
        }

        @media only screen and (max-width: 600px) {
            .item-form {
                width: 90%;
            }
        }
    </style>
</head>

<body class="index">
    <div id="fb-root"></div>

    <header class="header contain-to-grid">
        <?php
        include '../NavigationBar.php'
        ?>
    </header>

    <div class="bg-item">
        <div class='item-form'>
            <h1>Item</h1>
            <form action="../includes/item.inc.php" method="post">
                <center>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p style='color:black; font-weight:bold; letter-spacing: 0.5px; font-size: 18px;'>Fill in all fields!</p>";
                        }
                    }
                    ?>
                    <p class="instruction">Item Type</p>
                    <input type="text" autocomplete="off" name="itemType" style="width: 220px">
                    <p class="instruction">Weight</p>
                    <input type="text" autocomplete="off" name="weight" style="width: 220px">
                    <input type="hidden" name = "id" value="<?php echo $_SESSION['userid']; ?>">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidweight") {
                            echo "<p style= 'color: black; letter-spacing: 0.5px;'>Please just include numbers!</p>";
                        }
                    }
                    ?>
                    <button type="submit" name="submit" class="item-button">
                        <p>Create Item</p>
                    </button>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "none") {
                            echo "<p style= 'color: black; letter-spacing: 0.5px;'>Item created!</p>";
                        }
                    }
                    ?>
                </center>
            </form>
        </div>

        <div class='item-display'>
            <h1>Your Item List</h1>
            <center>
                <table class="item-table">
                    <thead>
                        <tr>
                            <th scope="col">Item Type</th>
                            <th scope="col">Item Weight</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serverName = "localhost";
                        $dBUsername = "root";
                        $dBPassword = "";
                        $dBName = "AnyWhere";

                        $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM Item WHERE UserID = '{$_SESSION['userid']}'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ItemID = $row['ItemID'];
                                $ItemType = $row['ItemType'];
                                $ItemWeight = $row['ItemWeight'];
                                echo '
                                <tr>
                                <td>' . $ItemType . '</td>
                                <td>' . $ItemWeight . ' lb</td>
                                <center>
                                <td><a class="update-feature" href="../includes/itemUpdate.inc.php? updateid=' . $ItemID . ' & weight=' . $ItemWeight . ' & type=' . $ItemType . '">Update</a></td>
                                </center>
                                <center>
                                <td><a class="delete-feature" href="../includes/itemDelete.inc.php? deleteid=' . $ItemID . '">Delete</a></td>
                                </center>
                                </tr> 
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </center>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
</body>

</html>