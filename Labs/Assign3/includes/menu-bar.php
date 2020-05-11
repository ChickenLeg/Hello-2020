<?php require "config.php"; ?>
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav">
                            <li class="active dropdown yamm-fw">
                                <a href="index.php" data-hover="dropdown" class="dropdown-toggle">Home</a>
                            </li>
                            <li class="dropdown yamm">
                                <?php
                                mysqli_select_db($con, $database);
                                $sql = "SELECT * FROM genre";
                                $result_bar = mysqli_query($con, $sql);
                                $rowCount_bar = mysqli_num_rows($result_bar);
                                for ($i = 0; $i < $rowCount_bar; $i++) {
                                    $row_bar[$i] = mysqli_fetch_row($result_bar);
                                    echo "<li><a href='./genre.php?id=" . $row_bar[$i][0] . "'>" . $row_bar[$i][1] . "</a></li>";
                                }
                                ?>
                            </li>



                        </ul><!-- /.navbar-nav -->
                        <div class="clearfix"></div>				
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>