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
        $loop = 500;
        $count = array(0, 0, 0, 0, 0);
        
        for ($i = 0; $i < $loop; $i++) {
            $rand_num = rand(1, 50);
            $count[floor(($rand_num - 1) / 10)]++;
        }
        
        echo "$count[0] numbers are randomly generated between 1 and 10</br> ";
        echo "$count[1] numbers are randomly generated between 11 and 20</br>";
        echo "$count[2] numbers are randomly generated between 21 and 30</br>";
        echo "$count[3] numbers are randomly generated between 31 and 40</br>";
        echo "$count[4] numbers are randomly generated between 41 and 50</br>";
        echo "</br> Histogram of stars as a prcentage of the number of values are displayed below:</br>";
        for ($i = 0; $i < 5; $i++){
            echo "</br>".$i."1 - ".($i + 1)."0: ";
            for ($j = 0; $j <= $count[$i] / 5; $j++){
                echo"*";
            }
        }
        
        echo "</div>";
        echo "</div>";
        ?>
    </body>
</html>
