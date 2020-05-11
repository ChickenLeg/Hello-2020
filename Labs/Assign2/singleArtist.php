

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Assign2 - Single Artist</title>
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
                $artists = array();
                $handle = fopen("./resources/artists.txt", "r");
                if ($handle) {
                    $i = 0;
                    while (($line = fgets($handle)) !== false) {
                        $data = explode("~", $line);
                        $artists[$i] = $data;
                        $i++;
                    }
                    fclose($handle);
                }

                function get_index_by_artist_id($search_base, $search_key) {
                    foreach ($search_base as $line) {
                        if ($line[0] == $search_key) {
                            return $line;
                        }
                    }
                }

                $target = get_index_by_artist_id($artists, $_GET['artist-id']);
                foreach ($artists as $artist) {
                    if ($_GET['artist-id'] == $artist[0]) {
                        echo "<img src='./resources/artists/large/" . $target[0] . ".jpg'>";
                        echo "<h1>" . $target[1] . "</h1>";
                        echo "<p>" . $target[3] . "--" . $target[4] . "</p>";
                        echo "<p>" . $target[2] . "</p>";
                        echo "<p>" . $target[5] . "</p>";
                        echo "<p><u><a href = $target[6].>" . $target[1] . " on Wikipedia" . "</a></u></p>";
                    }
                }
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

                function get_artist_index_by_name($artists, $artistsName) {
                    $i = 0;
                    foreach ($artists as $line) {
                        if ($line[1] == $artistsName) {
                            return $i;
                        }
                        $i++;
                    }
                }
                
                echo "<h2>Paintings:</h2>";
                $i = get_artist_index_by_name($artists, $target[1]);
                foreach ($paintings as $value) {                 
                    if($artists[$i][1] == $value[1]){
                        echo "<ul><li><a href='./singlePainting.php?painting-id=".$value[0]."'>". $value[2] . "</li></ul>";
                    }
                }
                ?>	
            </div>
            <div class="clear"> </div>
        </div>
    </body>
</html>