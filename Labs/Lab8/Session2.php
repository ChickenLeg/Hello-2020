<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start();?>
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
        echo "<h2>Your Input:</h2>";
                    echo "<hr>";
                    echo "First Name: " . $_SESSION["fName"];
                    echo "<br>";
                    echo "Last Name: " . $_SESSION['lName'];
                    echo "<br>";
                    echo "Phone Number: " . $_SESSION['phone'];
                    echo "<br>";
                    echo "E-mail: " . $_SESSION['email'];
                    echo "<br>";
                    echo "Birthday: " . $_SESSION['date'];
                    echo "<br>";
                    echo "Profession: " . $_SESSION['profession'];
                    echo "<br>";
                    if(!empty($_SESSION['sports'])){
                        foreach ($_SESSION['sports'] as $key => $value) {
                            echo "Favorite Sports: " . $value. "<br>";
                        }
                    }
        echo "</div>";
        echo "</div>";
        ?>
        <?php include 'Footer.php'; ?>;
    </body>
</html>
