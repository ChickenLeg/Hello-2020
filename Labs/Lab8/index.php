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
        echo "<div class=\"col-sm-8\" style=\"margin-top:10px;margin-bottom:10px;background-color: #becbcf\">";

        $fname = $lname = $phone = $email = $date = $profession = $sports = "";
        $nameErr = $emailErr = $professionErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["fname"])) {
                $fname = test_input($_POST["fname"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["lname"])) {
                $lname = test_input($_POST["lname"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["phone"])) {
                $phone = test_input($_POST["phone"]);
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["date"])) {
                $date = test_input($_POST["date"]);
            }
        }

        if (empty($_POST["profession"])) {
            $professionErr = "Profession is required";
        } else {
            $profession = test_input($_POST["profession"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <div class = "container">
            <div class="row" >
                <div class="col-sm-2">
                </div>
                <!--                <div class="col-sm-8">-->
                <div class="col-sm-4">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <h3>Personal Information</h3>
                        <hr>
                        First Name: <input type="text" name="fname" value="<?php echo $fname; ?>">
                        <br><br>
                        Last Name: <input type="text" name="lname" value="<?php echo $lname; ?>">
                        <br><br>
                        Phone Number: <input type="number" name="phone" value="<?php echo $phone; ?>">
                        <br><br>
                        Email: <input type="email" name="email" value="<?php echo $email; ?>">
                        <br><br>
                        Birthday: <input type="date" name="date" value="<?php echo $date; ?>">
                        <br><br>
                        <hr>
                        <h3>Profession</h3>
                        <input type="radio" name="profession" <?php if (isset($profession) && $profession == "student") echo "checked"; ?> value="student"> Student
                        <input type="radio" name="profession" <?php if (isset($profession) && $profession == "doctor") echo "checked"; ?> value="doctor"> Doctor
                        <input type="radio" name="profession" <?php if (isset($profession) && $profession == "farmer") echo "checked"; ?> value="farmer"> Farmer
                        <input type="radio" name="profession" <?php if (isset($profession) && $profession == "engineer") echo "checked"; ?> value="engineer"> Engineer
                        <hr>
                        <h3>Favorite Sports</h3>
                        <select id="sports" name="sports[]" size="4" multiple>
                            <option value="Hockey">Hockey</option>
                            <option value="Football">Football</option>
                            <option value="Carling">Carling</option>
                            <option value="Tennis">Tennis</option>
                        </select><br>
                        <hr>
                        <input type="submit" name="submit" value="Submit">&nbsp;&nbsp;
                        <br><br>
                        <input type="reset" class="button standard" value="Reset" />
                        <br>
                        <hr>
                    </form>
                </div>
                <div class="col-sm-4" style="float: left;">
                    <?php
                    echo "<h2>Your Input:</h2>";
                    echo "<hr>";
                    echo "First Name: " . $fname;
                    echo "<br>";
                    echo "Last Name: " . $lname;
                    echo "<br>";
                    echo "Phone Number: " . $phone;
                    echo "<br>";
                    echo "E-mail: " . $email;
                    echo "<br>";
                    echo "Birthday: " . $date;
                    echo "<br>";
                    echo "Profession: " . $profession;
                    echo "<br>";
                    if(!empty($_POST['sports'])){
                        foreach ($_POST['sports'] as $key => $value) {
                            echo "Favorite Sports: " . $value. "<br>";
                        }
                    }

                    
                    ?>
                </div>
                <!--</div>-->
            </div> 
             <?php include 'Footer.php'; ?>
        </div>     
    </body>
</html>