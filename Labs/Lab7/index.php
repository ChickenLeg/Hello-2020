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

        echo "No Key Array - Output using var_dump" . "<br>";
        $noKeyArray = array(1, 2, 3, 4, array(10, 20, 30, 40));
        var_dump($noKeyArray);
        echo "<br>";
        echo "No Key Array -  Output using foreach" . "<br>";
        $noKeyArray = array(
            0 => 10,
            1 => 20,
            2 => 30,
            3 => 40
        );
        foreach ($noKeyArray as $key => $element) {
            echo "key: " . $key .", ". "  value: " . $element . ", "." key data type: integer " . "<br>";
        }
        echo "<br>";
        echo "<br>";
        echo "String Key Array - Output using var_dump" . "<br>";
        $stringKeyArray = ["key1" => "item1", "key2" => "item2"];
        var_dump($stringKeyArray);
        echo "<br>";
        echo "String Key Array -  Output using foreach" . "<br>";
        $stringKeyArray = array(
            "key1" => "item1",
            "key2" => "item2"
        );
        foreach ($stringKeyArray as $key => $value) {
            echo "key: " . $key . ", "."  value: " . $value .", ". " key data type: string " . "<br>";
        }
        echo "<br>";
        echo "<br>";
        echo "Integer Key Array - Output using var_dump" . "<br>";
        $integerKeyArray = [
            0 => "item1",
            1 => "item2",
            3 => "item3"   
        ]; 
        var_dump($integerKeyArray);
        echo "<br>";
        echo "No Key Array - Output using foreach" . "<br>";
        foreach ($integerKeyArray as $key => $value) {
            echo "key: " . $key . ", "."  value: " . $value .", ". " key data type: integer " . "<br>";
        }
        echo "<br>";
        echo "<br>";
        echo "Mixed Key Array - Output using var_dump" . "<br>";
        $mixedKeyArray = [
            "key1" => "item1",
            "key2" => "item2",
            3 => "item3",
            4 => "item3"
        ]; 
        var_dump($mixedKeyArray);
        echo "<br>";
        echo "Mixed Key Array - Output using foreach" . "<br>";
        foreach ($mixedKeyArray as $key => $value) {
            echo "key: " . $key . ", "."  value: " . $value .", ". " key data type: ". gettype($key) . "<br>";
        }
        echo "<br>";
        echo "<br>";
        echo "Multi-dimensional Array - Output using var_dump" . "<br>";
        $multideArray = [
            0 => [0 => 10, 1 =>20],
            1 => [2 => 30, 3 => 40]
        ]; 
        var_dump($multideArray);
        echo "<br>";
        echo "Multi-dimensional Array - Output using foreach" . "<br>";
        foreach ($multideArray as $multideArray) {
            foreach ($multideArray as $key => $value) {   
            echo "key: " . $key . ", "."  value: " . $value .", ". " key data type: ". gettype($key) . "<br>";
        }
        }
       
        echo "</div>";
        echo "</div>";
        ?>
        <?php include 'Footer.php'; ?>;
    </body>
</html>
