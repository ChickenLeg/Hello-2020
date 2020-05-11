<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Assign2-Home Page of Art Gallery</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/text.css" />
        <link rel="stylesheet" href="css/960.css" />

        <link rel="stylesheet" href="css/assign2.css" />
    </head>

    <body>

        <div class="container_12">
            <?php require_once("utilities/header.php"); ?>
            <div class="grid_3">
                <?php require_once("utilities/navigation.php"); ?>		
            </div>
            <div class="grid_9">
                <?php
                echo "<table>";
                function get_artist_id_by_name($artists, $artistsName) {
                    $i = 0;
                    foreach ($artists as $value) {
                        if ($value[1] == $artistsName) {
                            return $i;
                        }
                        $i++;
                    }
                }
                if(empty($_GET['genre'])){
                    foreach($paintings as $line){
                    echo "<tr><td><img src='./resources/paintings/square-tiny/".$line[0].".jpg'></td>";
                    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./singlePainting.php?painting-id=".$line[0]."'>" . $line[2] . "</a></td>";
                    $i = get_artist_id_by_name($artists, $line[1]);
                    echo "<td><a href='./singleArtist.php?artist-id=".$artists[$i][0]."'>" . $line[1] . "</a></td></tr>";
                    }
                }else{
                    foreach($paintings as $line){
                    if($_GET['genre'] == trim($line[9])){
                    echo "<tr><td><img src='./resources/paintings/square-tiny/".$line[0].".jpg'></td>";
                    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./singlePainting.php?painting-id=".$line[0]."'>" . $line[2] . "</a></td>";
                    $i = get_artist_id_by_name($artists, $line[1]);
                    echo "<td><a href='./singleArtist.php?artist-id=".$artists[$i][0]."'>" . $line[1] . "</a></td></tr>";
                    }
                }
                }
                
//                $paintings = file("resources/paintings.txt") or die('ERROR: Cannot find file');
//                $delimiter = "~";
//                foreach ($paintings as $painting) {
//                    $paintingFields = explode($delimiter, $painting);
//                    $paintId = $paintingFields[0];
//                    $artistName = $paintingFields[1];
//                    $title = $paintingFields[2];
//                    $year = $paintingFields[3];
//                    $width = $paintingFields[4];
//                    $height = $paintingFields[5];
//                    $price = $paintingFields[6];
//                    $description = $paintingFields[7];
//                    $WikipediaLink = $paintingFields[8];
//                    $genreName = $paintingFields[9];
//
//                    echo "<tr>";
//                    //echo "<td>" . $imagePaintings . "</td>";
//                    echo "<td><img src='./resources/paintings/square-tiny/".$paintId.".jpg'></td>";
//                    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./singlePainting.php?painting-id=".$paintId."'>" . $title . "</a></td>";
//                    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;" . $artistName . "</td>";                 
//                }

                echo "</table>";
   
                ?>
            </div>
            <div class="clear"> </div>
        </div>
    </body>
</html>