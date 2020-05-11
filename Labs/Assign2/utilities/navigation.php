<div id="genreListing">
    <h2>Genres</h2>	
    <ul class="secondaryList">
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
//        $paintings = file("resources/paintings.txt") or die('ERROR: Cannot find file');
//        $delimiter = "~";
//        foreach ($paintings as $painting) {
//            $paintingFields = explode($delimiter, $painting);
//            $paintId = $paintingFields[0];
//            $artistName = $paintingFields[1];
//            $title = $paintingFields[2];
//            $year = $paintingFields[3];
//            $width = $paintingFields[4];
//            $height = $paintingFields[5];
//            $price = $paintingFields[6];
//            $description = $paintingFields[7];
//            $WikipediaLink = $paintingFields[8];
//            $genreName = $paintingFields[9];
//
//            echo "<ul>";
//            echo "<li>&nbsp;<a href='./index.php?id=genre" . $genreName . "'>" . $genreName . "</a></li>";
//            echo "</ul>";
//        }
        echo "<li><a href='./index.php?genre=Art+Nouveau'>Art Nouveau</a></li>";
        echo "<li><a href='./index.php?genre=Cubism'>Cubism</a></li>";
        echo "<li><a href='./index.php?genre=Fauvism'>Fauvism</a></li>";
        echo "<li><a href='./index.php?genre=Impressionism'>Impressionism</a></li>";
        echo "<li><a href='./index.php?genre=Post-Impressionism'>Post-Impressionism</a></li>";
        echo "<li><a href='./index.php?genre=Romanticism'>Romanticism</a></li>";
        ?>


    </ul>
</div>

<div id="artistListing">
    <h2>Artists</h2>
    <ul class="secondaryList">
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
        foreach ($artists as $line) {
            echo "<ul><li><a href='./singleArtist.php?artist-id=".$line[0]."'>" . $line[1] . "</a></li></ul>";
        }
        ?>

    </ul>
</div>	