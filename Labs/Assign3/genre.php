<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST["add_to_cart"])) {
    if(empty($_SESSION["cart"])){
        $item = Array($_POST["pid"], 1);
        $_SESSION["cart"][0] = $item;
    } else {
        for($i = 0; $i < count($_SESSION["cart"]); $i++){
            if($_SESSION["cart"][$i][0] == $_POST["pid"]){
                header('Location: ./my-cart.php');
            }
        }
        $item = Array($_POST["pid"], 1);
        $_SESSION["cart"][count($_SESSION["cart"])] = $item;
    }
    header('Location: ./my-cart.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">

        <title>Painting Genre</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Customizable CSS -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/green.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
        <link href="assets/css/lightbox.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/rateit.css">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

        <!-- Demo Purpose Only. Should be removed in production -->
        <link rel="stylesheet" href="assets/css/config.css">

        <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
        <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
        <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
        <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
        <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">



        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
        <!--[if lt IE 9]>
                <script src="assets/js/html5shiv.js"></script>
                <script src="assets/js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="cnt-home">

        <header class="header-style-1">

            <!-- ============================================== TOP MENU ============================================== -->
            <?php include('includes/top-header.php'); ?>
            <!-- ============================================== TOP MENU : END ============================================== -->
            <?php include('includes/main-header.php'); ?>
            <!-- ============================================== NAVBAR ============================================== -->
            <?php include('includes/menu-bar.php'); ?>
            <!-- ============================================== NAVBAR : END ============================================== -->

        </header>
        <!-- ============================================== HEADER : END ============================================== -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>


                    <!-- /.side-menu -->
                    <div class="sidebar-module-container">
                        <h3 class="section-title">shop by</h3>
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-bottom-xs ">

                                <div class="sidebar-widget-body m-t-10">

                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <?php include('includes/side-menu.php'); ?>	
                                            </div>  
                                        </div>
                                    </div>

                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->

                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">	
                            <div class="image">
                                <img src="assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text">
                                        <br />
                                    </div>

                                    <div class="excerpt hidden-sm hidden-md">
                                        <?php
                                        mysqli_select_db($con, $database);
                                        $sql_genre = "SELECT * FROM genre WHERE id = " . $_GET['id'];
                                        $result_genre = mysqli_query($con, $sql_genre);
                                        $row_genre = mysqli_fetch_row($result_genre);
                                        echo $row_genre[1];
                                        ?>

                                    </div>

                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div>
                    </div>

                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class="row" >									

                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products" style="display: inline-block; position:relative; float: left">
                                                <?php
                                                mysqli_select_db($con, $database);
                                                $genreid = $_GET['id'];
                                                $sql_image = "SELECT * FROM paintings INNER JOIN genre ON paintings.genreID = genre.id AND genre.id='$genreid'";
                                                $result_image = mysqli_query($con, $sql_image);
                                                $rowCount_image = mysqli_num_rows($result_image);

                                                for ($i = 0; $i < $rowCount_image; $i++) {
                                                    ?>
                                                    <form method="post">
                                                        <div class="product">	
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <?php
                                                                    $row_image[$i] = mysqli_fetch_row($result_image);
                                                                    echo "<img src='./admin/paintingImages/" . $row_image[$i][6] . "'>";
                                                                    echo "<input type='hidden' name='pid' value='".$row_image[$i][0]."'>";
                                                                    ?>

                                                                </div><!-- /.image -->			                      		   
                                                            </div><!-- /.painting-image -->


                                                            <div class="product-info text-left">
                                                                <h3 class="name"> 
                                                                    <?php echo $row_image[$i][4] ?>   
                                                                </h3>
                                                                <h3 class="name"> Artist: <?php echo $row_image[$i][3] ?></h3>


                                                                <div class="product-price">	
                                                                    <span class="price">
                                                                        <?php echo $row_image[$i][7]; ?></span>


                                                                </div><!-- /.product-price -->

                                                            </div><!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">							
                                                                            <button name="add_to_cart" class="btn btn-primary" type="submit">Add to cart</button>

                                                                        </li>                

                                                                    </ul>
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->
                                                        </div>
                                                    </form>
                                                <?php } ?>
                                            </div>
                                        </div> 		

                                    </div><!-- /.row -->
                                </div><!-- /.category-painting -->

                            </div><!-- /.tab-pane -->





                        </div><!-- /.col -->
                    </div></div>

            </div>
        </div>
        <?php include('includes/footer.php'); ?>
        <script src="assets/js/jquery-1.11.1.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>

        <script src="assets/js/echo.min.js"></script>
        <script src="assets/js/jquery.easing-1.3.min.js"></script>
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <script src="assets/js/jquery.rateit.min.js"></script>
        <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>



        <script src="switchstylesheet/switchstylesheet.js"></script>

        <script>
            $(document).ready(function () {
                $(".changecolor").switchstylesheet({seperator: "color"});
                $('.show-theme-options').click(function () {
                    $(this).parent().toggleClass('open');
                    return false;
                });
            });

            $(window).bind("load", function () {
                $('.show-theme-options').delay(2000).trigger('click');
            });
        </script>


</body>
</html>