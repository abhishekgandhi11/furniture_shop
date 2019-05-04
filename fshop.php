<?php
// if(empty($_GET)) {
//     $album_id = $_SESSION['shopid'];	
// }
// else {
//     $shopid = $_GET['shopid'];
//     $_SESSION['shopid'] =$album_id;
// }


echo $shopid = $_GET['shopid'];

?>


<?php

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
                                <?php
                                    include("config.php");
                                    $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                    mysql_select_db($databaseName,$con) or die ('Database Error');
                                   $dd_res1=mysql_query("SELECT * FROM `furniture_shop` WHERE `f_id` = '$shopid'");
                                   $r1=mysql_fetch_row($dd_res1);
                                    $fshop =  $r1[1];
                                       echo "<h2>$fshop</h2>";
                                    //    echo $r1[7];
                                 
                                    
                                ?>
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
                                    $dd_res2=mysql_query("Select * FROM category where username= '$r1[7]'");
                            ?>
                            <div class="projects-items equal three-columns">
                                    <?php
                                        while($r2=mysql_fetch_row($dd_res2)){ 
                                        $catid = $r2[0];    
                                    ?>  
                                            <!-- Single Project -->
                                            <div class="single-item one-item design branding">
                                                <div class="item">
                                                    
                                                    <img src="<?php echo $r2[2] ?>" alt="category Image" height="150px" width="200px">
                                                    <div class="content">
                                                        <h3>
                                                            Name : <?php echo $r2[1] ?>
                                                        </h3>
                                                    </div>
                                                    <?php
                                                        echo "<a href='items.php?fshop=$fshop&&catid=$catid&&catname=$r2[1]' class='link'></a>";
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