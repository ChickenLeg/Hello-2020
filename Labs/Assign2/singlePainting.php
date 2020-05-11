

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Assign2 - Single Painting</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/text.css" />
        <link rel="stylesheet" href="css/960.css" />

        <link rel="stylesheet" href="css/assign2.css" />
    </head>

    <body>

        <div class="container_12">
            <?php require_once("utilities/header.php"); ?>
        </div>
        <div class="container_12 contentWhite">	
            <div class="grid_3">
                <?php require_once("utilities/navigation.php"); ?>		
            </div>
            <div class="grid_9">
                <?php
                $paintings = array();
                $handle = fopen("./resources/paintings.txt", "r");
                if ($handle) {
                    $i = 0;
                    while (($line = fgets($handle)) !== false) {
                        $data = explode("~", $line);
                        $paintings[$i] = $data;
                        $i++;
                    }
                    fclose($handle);
                }

                function get_index_by_painting_id($search_base, $search_key) {
                    foreach ($search_base as $line) {
                        if ($line[0] == $search_key) {
                            return $line;
                        }
                    }
                }
                function get_artist_index_by_name($artists, $artistsName) {
                    $i = 0;
                    foreach ($artists as $line) {
                        if ($line[1] == $artistsName) {
                            return $i;
                        }
                        $i++;
                    }
                }

                $target = get_index_by_painting_id($paintings, $_GET['painting-id']);
                echo "<img src='./resources/paintings/large/" . $_GET['painting-id'] . ".jpg'>";
                echo "<h2>" .$target[2]. "</h2>";
                $i = get_artist_index_by_name($artists, $target[1]);
                echo "<ul><li><a href='./singleArtist.php?artist-id=".$artists[$i][0]."'>". $target[1] . "</a></li></ul>";
                
                //echo "<p><a href='./singleArtist.php?artist-id=".$line[0]."'>" .$target[1]. "</a></p>";
                echo "<p><i> (" .$target[3]."--".$target[4]."cm * ".$target[5]."cm ) </i></p>";
                echo "<p><u>" .$target[9]. "</u></p>";
                echo "<p>" .$target[7]. "</p>";
                echo "<p><u><a href = $target[8].>" .$target[2]. " On Wikipedia."."</a></u></p>";
                ?>

            </div>
        </div>
        </div>
    </body>
</html>