<?php   
session_start();

if(isset($_POST["fname"]))
{
	$_SESSION["fName"] = $_POST["fName"];
        $_SESSION["lName"] = $_POST["lName"];
        $_SESSION["phone"] = $_POST["phone"];
        $_SESSION["email"] = $_POST["email"];
	$_SESSION["date"] = $_POST["date"];
        $_SESSION["profession"] = $_POST["profession"];
        $_SESSION["sports"] = $_POST["sports"];
	header("Location: Session2.php");
	exit;
}

?>
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
        <?php include 'Header.php'; ?>
    </head>
    <body>
        <?php
        echo "<div class = \"container\">";
        echo "<div class=\"row\" >";
        echo "<div class=\"col-sm-4\">";
        include 'Menu.php';
        echo "</div>";
        echo "<div class=\"col-sm-8\" style=\"margin-top:10px;margin-bottom:10px;background-color: #becbcf\">";
        ?><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <h3>Personal Information</h3>
                        <hr>
                        First Name: <input type="text" name="fname" value="">
                        <br><br>
                        Last Name: <input type="text" name="lname" value="">
                        <br><br>
                        Phone Number: <input type="number" name="phone" value="">
                        <br><br>
                        Email: <input type="email" name="email" value="">
                        <br><br>
                        Birthday: <input type="date" name="date" value="">
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
        </div></div></div>
        
        <?php include 'Footer.php'; ?>;
    </body>
</html>
