<?php require "config.php"; ?>
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Genre
    </div>        
    <nav class="yamm megamenu-horizontal" role="navigation">

        <ul class="nav">
            <li class="dropdown menu-item">
                <?php
                mysqli_select_db($con, $database);
                $sql= "SELECT * FROM genre";
                $result_side = mysqli_query($con, $sql);
                $rowCount_side = mysqli_num_rows($result_side);
                for($i = 0; $i < $rowCount_side; ++$i){
                    $row_side[$i] = mysqli_fetch_row($result_side);
                    echo "<li><a href='./genre.php?id=".$row_side[$i][0]."'>".$row_side[$i][1]."</a></li>";
                }
                //var_dump($row_side);
                ?>

            </li>
        </ul>
    </nav>
</div>