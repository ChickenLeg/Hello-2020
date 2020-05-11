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
        $Product = ["Printer" => [["Brand" => "Epson", "Quantity" => 100, "Price" => 2500],
                ["Brand" => "Canon", "Quantity" => 100, "Price" => 3000],
                ["Brand" => "Xerox", "Quantity" => 500, "Price" => 2000]],
            "Laptop" => [
                ["Brand" => "Apple", "Quantity" => 200, "Price" => 2000],
                ["Brand" => "HP", "Quantity" => 300, "Price" => 2000],
                ["Brand" => "Toshiba", "Quantity" => 100, "Price" => 1500]
            ],
            "TV" => [
                ["Brand" => "Samsung", "Quantity" => 500, "Price" => 1200],
                ["Brand" => "LG", "Quantity" => 500, "Price" => 1050],
                ["Brand" => "Sony", "Quantity" => 200, "Price" => 1000]
            ]];
        var_dump($Product);
        echo "<br>";
        foreach ($Product as $ProductsKey=>$Products) {
            echo "<ul><b><u>".$ProductsKey.":</u></b>";
            foreach ($Products as $sub_array) {
                foreach ($sub_array as  $sub_key => $sub_content) {
                    echo "<li>".$sub_key.": ".$sub_content."</li>";
                }
                echo "<br>";
            }
            echo "</ul>";
        }
        echo "</div>";
        echo "</div>";
        ?>
        <?php include 'Footer.php'; ?>;
    </body>
</html>
