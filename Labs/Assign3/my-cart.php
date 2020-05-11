<?php session_start();
//var_dump($_SESSION["cart"]);
//echo $time;
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = FALSE;
}
//var_dump($uid);
//update
if (isset($_POST["submit"])) {
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        $_SESSION["cart"][$i][1] = $_POST['qty'][$i];
    }
    // foreach ($_POST['remove_code'] as $key) {
//       for($j=0;$j<count($_POST['remove_code']);$j++){
//            for($i=0; $i<count($_SESSION["cart"]);$i++){
//                //if($_SESSION["cart"][$i][0] == $key){
//                if($_SESSION["cart"][$i][0] == $_POST['remove_code'][$j]){
//                    unset ($_SESSION["cart"][$i]);
//                }
//            }
//        }
    for ($k = 0; $k < count($_SESSION["cart"]); $k++) {
        for ($j = 0; $j < count($_POST['remove_code']); $j++) {
            //if($_SESSION["cart"][$i][0] == $key){
            if ($_SESSION["cart"][$k][0] == $_POST['remove_code'][$j]) {
                unset($_SESSION["cart"][$k]);
            }
        }
    }
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
}

//check out
if (isset($_POST["ordersubmit"])) {
    if (!$_SESSION['login']) {
        header("Location:login.php");
    } else {
        //$time = date('d-m-y h:i:s');
        $timeStamp = date('d-m-y h:i:s');
        foreach ($_SESSION["cart"] as $item) {
            $sql_order = "INSERT INTO orders(userId, paintingId, quantity, orderDate, paymentMethod, orderStatus)
                       Values ('".$_SESSION["userid"]."','".$item[0]."','".$item[1]."','".$timeStamp    ."','".Unpaid."','".Unpaid."')";
            mysqli_query($con, $sql_order);
        }
        header("Location:./payment-method.php"); 
    }
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

        <title>My Cart</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
        <!-- Demo Purpose Only. Should be removed in production : END -->


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



        <!-- ============================================== HEADER ============================================== -->
        <header class="header-style-1">
            <?php include('includes/top-header.php'); ?>
            <?php include('includes/main-header.php'); ?>
            <?php include('includes/menu-bar.php'); ?>
        </header>
        <!-- ============================================== HEADER : END ============================================== -->
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li class='active'>Shopping Cart</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->

        <div class="body-content outer-top-xs">
            <div class="container">
                <div class="row inner-bottom-sm">
                    <div class="shopping-cart">
                        <div class="col-md-12 col-sm-12 shopping-cart-table ">
                            <div class="table-responsive">
                                <form name="cart" method="post">	
                                    <?php ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="cart-romove item">Remove</th>
                                                <th class="cart-description item">Image</th>
                                                <th class="cart-product-name item">Painting Title</th>

                                                <th class="cart-qty item">Quantity</th>
                                                <th class="cart-sub-total item">Price Per unit</th>
                                                <th class="cart-sub-total item">Shipping Charge</th>
                                                <th class="cart-total last-item">Grand Total</th>
                                            </tr>
                                        </thead><!-- /thead -->
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="shopping-cart-btn">
                                                        <span class="">
                                                            <a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                            <input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
                                                        </span>
                                                    </div><!-- /.shopping-cart-btn -->
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            mysqli_select_db($con, $database);
                                            $grand_total = 0;
                                            for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
                                                $sql_cart = "SELECT * FROM paintings WHERE pid = " . $_SESSION["cart"][$i][0];
                                                $result_cart = mysqli_query($con, $sql_cart);
                                                $row_cart = mysqli_fetch_row($result_cart);

//                                            foreach($_SESSION["cart"] as $product){
//                                                $sql_cart = "SELECT * FROM paintings WHERE pid = " . $product[0];
//                                                $result_cart = mysqli_query($con, $sql_cart);
//                                                $row_cart = mysqli_fetch_row($result_cart);
                                                ?>

                                                <tr>
                                                    <td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo $_SESSION['cart'][$i][0]; ?>" /></td>
                                                    <td class="cart-image">
                                                        <img src="admin/paintingImages/<?php echo $row_cart[6] ?>" alt="" width="114" height="146">						
                                                    </td>
                                                    <td class="cart-product-name-info">
                                                        <h4 class='cart-product-description'>
                                                            <?php
                                                            echo $row_cart[4];
                                                            echo "<input type='hidden' name='pid['.$i.']' value=" . $row_cart[0] . ">";
                                                            ?>

                                                        </h4>


                                                    </td>
                                                    <td class="cart-product-quantity">
                                                        <div class="quant-input">
                                                            <div class="arrows">
                                                                <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                                <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                            </div>
                                                            <input type="text" value="<?php echo $_SESSION["cart"][$i][1]; ?>" name="qty[<?php echo $i ?>]">

                                                        </div>
                                                    </td>
                                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price">
                                                            <?php echo "$" . $row_cart[7] ?>.00</span>
                                                    </td>
                                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price">
                                                            <?php echo "$" . $row_cart[8] ?>.00</span>
                                                    </td>

                                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price">
                                                            <?php
                                                            $total = $row_cart[7]*$_SESSION["cart"][$i][1] + $row_cart[8];
                                                            if($_SESSION["cart"][$i][1] == 0){
                                                                $total=0;
                                                            }
                                                            $grand_total += $total;
                                                            ?>
                                                            <?php echo "$" . $total; ?>.00</span>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        </tbody><!-- /tbody -->
                                    </table><!-- /table -->

                            </div>
                        </div><!-- /.shopping-cart-table -->			<div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Shipping Address</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                               
                                                <?php
                                                if($_SESSION['login']){
                                                    $temp_email = $_SESSION['emailid'];
                                                    $sql_shipping = "SELECT * FROM users WHERE email='$temp_email'";
                                                    $result_ship = mysqli_query($con, $sql_shipping);
                                                    $row_ship = mysqli_fetch_row($result_ship);
                                                    echo $row_ship[5];
                                                    } else{
                                                        echo "";
                                                    }
                                                ?>

                                            </div>

                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>

                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Billing Address</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <?php
                                                if($_SESSION['login']){
                                                    echo $row_ship[6];
                                                } else {
                                                    echo "";
                                                }
                                                ?>

                                            </div>

                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                        <div class="col-md-4 col-sm-12 cart-shopping-total">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>

                                            <div class="cart-grand-total">
                                                <?php
                                                ?>
                                                Grand Total<span class="inner-left-md"><?php echo "$" . $grand_total ?>.00</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-checkout-btn pull-right">
                                                <button type="submit" name="ordersubmit" class="btn btn-primary">PROCCED TO CHEKOUT</button>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table>
                            <?php ?>
                        </div>			
                    </div>
                </div> 
                </form>

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