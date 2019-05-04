<?php
    session_start();
    $user = $_SESSION["fshop_username"];
    

?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from wearepuredesign.com/whiteble/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Apr 2019 17:21:34 GMT -->
<head>
    <?php
            include("head.php");
    ?>
</head>
    <body>
      
        <!--  Loader  -->
        <div id="myloader">
            <div class="loader">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!--  END Loader  -->
        

        <!--  Main Wrap  -->
        <div id="main-wrap">
            <!--  Header & Menu  -->
                <?php
                    include("header.php");
                ?>
            <!--  END Header & Menu  -->
            <!--  Page Content  -->
            <div id="page-content">
            <form name="frmdropdown" method="post" > 
                <!--  HomePage header  -->
                <div class="container">
                    
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <br><br>
                                <h4>Furniture Shop Panel</h4>
                                <h2>Dashboard</h2>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>           	
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <br><br>
                                    <h2 align="center">Latest order List</h2>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>           		   
                </div>
                <!--  END HomePage header  -->
                <!-- <div id="home-wrap" class="content-section"> -->
                    <div class="container">
                                        <!--  Table  -->
                                        <div class="row padding-sm">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                <?php
                                    include("config.php");
                                    $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                    mysql_select_db($databaseName,$con) or die ('Database Error');
                                    $res_fshop = mysql_query("Select * FROM furniture_shop where user_name = '$user'");
                                    $res1=mysql_fetch_row($res_fshop);
                                    $shopid = $res1[0];
                                    $dd_res=mysql_query("Select * FROM order_details where f_id = '$shopid'  order by order_details_id DESC");
                                    // echo count($dd_res);
                                ?>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Item Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
                                                <th>Customer Name</th>
                                                <th>Address</th>
                                            </tr>
                                    <?php
                                        while($r1=mysql_fetch_row($dd_res)){ 
                                        //    echo $r1[0]. "</br>";
                                    ?>  
                                                    <tr>
                                                        <td><?php echo $r1[0]; ?></td>
                                                        <td><?php 
                                                                 $dd_res3=mysql_query("Select cat_id,cat_name FROM category where cat_id = '$r1[4]'");
                                                                 $r3=mysql_fetch_row($dd_res3);
                                                                echo $r3[1];
                                                            ?>
                                                        </td>
                                                        <td><?php 
                                                                $dd_res4=mysql_query("Select item_id,item_name FROM main_item where item_id = '$r1[7]'");
                                                                $r4=mysql_fetch_row($dd_res4);
                                                               echo $r4[1]; 
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                echo $r1[3];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r1[2]; ?></td>
                                                        <td><?php echo $r1[6]; ?></td>
                                                        <td><?php 
                                                                $dd_res5=mysql_query("Select c_id,c_name,address FROM customer where c_id = '$r1[5]'");
                                                                $r5=mysql_fetch_row($dd_res5);
                                                               echo $r5[1];  
                                                            ?>
                                                        </td>
                                                        <td><?php echo $r5[2]; ?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--  END Table  -->                    </div>
                </div>
            </div>
            <!--  END Page Content -->
            </form>
        </div>
        <!--  Main Wrap  -->
        

        <!--  Footer  -->
            <?php
                include("footer.php");
            ?>
        <!--  END Footer. Class fixed for fixed footer  -->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- All js library -->
        <script src="assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/jquery.flexslider-min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/isotope.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=false"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/smooth.scroll.min.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/jquery.countTo.js"></script>
        <script src="assets/js/jquery.scrolly.js"></script>
        <script src="assets/js/plugins-scroll.js"></script>
        <script src="assets/js/imagesloaded.min.js"></script>
        <script src="assets/js/pace.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

<!-- Mirrored from wearepuredesign.com/whiteble/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Apr 2019 17:22:15 GMT -->
</html>