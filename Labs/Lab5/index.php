<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <title>Lab5</title>

    </head>
    <body> 
        <?php include 'Header.php'; ?>
        <?php include 'Menu.php'; ?>
        <?php
        echo "<div class = \"container\">";
        echo "<div class=\"row\" >";
        echo "<div class=\"col-sm-4\">";
        echo "</div>";
        echo "<div class=\"col-sm-8\">";
        $fname = "Li";
        $lname = "Yanni";
        echo "$fname $lname";
        echo "<br>";
        define("StudentNumber", "040914267");
        echo StudentNumber;
        echo "<br>";
        echo "<br>";
        $str = "\nHello World!!";
        printf("%s %s", $str, "This is the first time I am using PHP!!");
        echo "<br>";
        echo "<br>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        ?>
        <?php include 'Footer.php'; ?>


    </body>
</html>
