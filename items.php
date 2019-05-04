<?php

$catid = $_GET['catid'];
$fshop = $_GET['fshop'];
$catname = $_GET['catname'];


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
            <!-- <form name="contact-form" method="post" class="padding-md padding-md-topbottom-null">  -->
                <!--  HomePage header  -->
                <div class="container">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <br><br>
                                
                                    <h2><?php echo $fshop; ?></h2>
                                    <br>
                                    <h3><?php echo $catname; ?></h3>
                                <br><br>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>           	          		   
                </div>
                <!--  END HomePage header  -->
                <!-- <div id="home-wrap" class="content-section"> -->
                    <div class="container">
                        <!--  Portfolio  -->
                        <section id="projects" data-isotope="load-simple" class="page padding-top-null padding-onlybottom-lg">
                            <?php
                    
                                    include("config.php");
                                    $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                    mysql_select_db($databaseName,$con) or die ('Database Error');
                                    $dd_res1=mysql_query("Select * FROM main_item where cat_id= '$catid'");
                            ?>
                            <div class="projects-items equal three-columns">
                                    <?php
                                        while($r1=mysql_fetch_row($dd_res1)){ 
                                        $itemid =  $r1[0];
                                    ?>  
                                            <!-- Single Project -->
                                            <div class="single-item one-item design branding">
                                                <div class="item" align="center">
                                                    
                                                    <img src="<?php echo $r1[5] ?>" alt="category Image" height="170px" width="300px">
                                                    <div class="content">
                                                        <h3>
                                                            <b>Category :</b> <?php echo $catname ?>
                                                        </h3>   
                                                        <h3>
                                                            <b>Name :</b> <?php echo $r1[2] ?>
                                                        </h3>
                                                        <h3>
                                                            <b>Price :</b> <?php echo $r1[3] ?>
                                                        </h3>
                                                        <h3>
                                                            <b>Available Qty :</b> <?php echo $r1[4] ?>
                                                        </h3>
                                                        <p>Buy Now</p> 
                                                    </div>
                                                    <?php
                                                        echo "<a href='order.php?fshop=$fshop&&catid=$catid&&catname=$catname&&itemid=$itemid' class='link'></a>";
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- END Single Project -->
                                    <?php
                                            // echo $r1[1];
                                        }   
                                    ?>
                            </div>
                        </section>
                        <!-- END Portfolio -->                    
                    </div>
                </div>
            </div>
            <!--  END Page Content -->
            <!-- </form> -->
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