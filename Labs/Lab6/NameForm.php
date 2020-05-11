<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <?php
        echo "<div class = \"container\">";
        echo "<div class=\"row\" >";
        echo "<div class=\"col-sm-4\">";
        include 'Menu.php';
        echo "</div>";
        echo "<div class=\"col-sm-6\">";

        date_default_timezone_set("America/New_York");
        echo "The time is " . date("H");
        $d = date("H");
        $messageErr = $message1Err = $message2Err = $message3Err = $message4Err = $message5Err = "";
        $nameErr = "";
        $fname = $lname = $mname = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["fname"]) && empty($_POST["mname"]) && empty($_POST["lname"])) {
                $nameErr = " You did not supply any names.";
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["fname"]) && $d < 12) {
                $messageErr = "Good morning " . $_POST['fname'] . " ! " . "You did not provide middle name and last name.";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["fname"]) && $d >= 12) {
                $message1Err = "Good day " . $_POST['fname'] . " ! " . "You did not provide middle name and last name.";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["mname"]) && $d < 12) {
                $message2Err = "Good morninig " . $_POST['fname'] . $_POST['lname'] . " ! " . "You did not provide middle name.";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["mname"]) && $d >= 12) {
                $message3Err = "Good day " . $_POST['fname'] . $_POST['lname'] . " ! " . "You did not provide middle name.";
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["fname"]) && !empty($_POST["mname"]) && !empty($_POST["lname"]) && $d < 12) {
                $message4Err = "Good morning " . $_POST['fname'] . $_POST['mname']. $_POST['lname'] . " ! " . "Your middle name is very unique.";
            }else{
                //$message5Err = "Good day, Welcome to the world of PHP!";
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        echo "</div>";
        echo "</div>";
        ?>
        <div class = "container">
            <div class="row" >
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <h2>Name Form</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                        First Name: <input type="text" name="fname" value="<?php echo $fname; ?>">
                        <br><br>
                        Middle Name: <input type="text" name="mname" value="<?php echo $mname; ?>">
                        <br><br>
                        Last Name: <input type="text" name="lname" value="<?php echo $lname; ?>">
                        <br><br>
                        <input type="submit" name="submit" value="Submit">
                        <span class="error" <?php echo $nameErr;?> ><br>
                        <?php echo $messageErr; ?>
                        <?php echo $message1Err; ?>
                        <?php echo $message2Err; ?>
                        <?php echo $message3Err; ?>
                        <?php echo $message4Err; ?>
                        <?php echo $message5Err; ?>
                        </span>
                        <br>
                        <input type="reset" class="button standard" value="Reset" />
                </div>
            </div>
        </div>
    </body>
</html>
