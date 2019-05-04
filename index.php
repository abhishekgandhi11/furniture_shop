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
                                <h2>Choose City & Furniture Shop</h2>
                                <br><br>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>           	          		   
                </div>
                <div class="container">
                    
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8 ">
                                <br><br>
                                    <form id="contact-form" method="post" class="padding-md padding-md-topbottom-null">
                                        <div class="row no-margin">
                                            <div class="col-md-5 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <!-- <input class="form-field" name="categoryname" id="categoryname" type="text" placeholder="Category Name"> -->
                                                    <select name="city_id" id ="city_id" class="form-field"> 
                                                        <option style = "font-size :20px; font-align:center ;" class="form-field" value=""> Select City</option>
                                                            <?php
                                                                include("config.php");
                                                                $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                                                mysql_select_db($databaseName,$con) or die ('Database Error');
                                                                $dd_res=mysql_query("Select city_id,city_name FROM city");
                                                                while($r=mysql_fetch_row($dd_res)){ 
                                                                    echo "<option style = 'font-size :15px; font-align:center ;' value='$r[0]'> $r[1] </option>";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <input type="submit" class="btn btn-block btn-success" name="Search" value="Search" id = "search">
                                                </div>
                                            </div>
                                        </div>   
                                    </form>
                                </div>
                                <div class="col-sm-2 padding-leftright-null"></div>
                        </div>           		   
                </div>
                <!--  END HomePage header  -->
                <!-- <div id="home-wrap" class="content-section"> -->
                    <div class="container">
                        <!--  Portfolio  -->
                        <section id="projects" data-isotope="load-simple" class="page padding-top-null padding-onlybottom-lg">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == "POST"){
                                    global $city_id; 
                                    $city_id = $_POST["city_id"];
                                    include("config.php");
                                    $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                    mysql_select_db($databaseName,$con) or die ('Database Error');
                                    $dd_res=mysql_query("Select f_id,shop_name,address,city_id,phone_number FROM furniture_shop where city_id = $city_id");
                            ?>
                            <div class="projects-items equal three-columns">
                                    <?php
                                        while($r1=mysql_fetch_row($dd_res)){ 
                                            $shopid = $r1[0];
                                    ?>  
                                            <!-- Single Project -->
                                            <div class="single-item one-item design branding">
                                                <div class="item">
                                                    <img src="assets/img/shop_f.jpg" alt="">
                                                    <div class="content">
                                                        <h3>
                                                            Name : <?php echo $r1[1] ?>
                                                        </h3>
                                                        <p>
                                                            Address: <?php echo $r1[2] ?>
                                                        </p>
                                                    </div>
                                                    <?php
                                                        echo "<a href='fshop.php?shopid= $shopid' class='link'></a>";
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- END Single Project -->
                                    <?php
                                            // echo $r1[1];
                                        }
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