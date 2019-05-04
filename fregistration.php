<?php
session_start();
ob_start();
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
             
                <!--  HomePage header  -->
                <div class="container">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <br><br>
                                <h2>Furniture Shop Registration</h2>
                                <br><br>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>           	          		   
                </div>
                <div class="container">        
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8 padding-leftright-null">
                        <form id="contact-form" method="post" class="padding-md padding-md-topbottom-null">
                                        <div class="row no-margin">
                                            <div class="col-md-5">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="shopname" id="shopname" type="text" placeholder="Shop Name">
                                                </div>
                                            </div>
                                            <div class="col-md-2 padding-leftright-null"></div>
                                            <div class="col-md-5">
                                                <div class="text small padding-topbottom-null">
                                                    <textarea class="form-field" name="address" id="address" rows="1" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="row no-margin">
                                            <div class="col-md-5">
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
                                            <div class="col-md-2 padding-leftright-null"></div>
                                            <div class="col-md-5">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="pincode" id="pincode" type="text" placeholder="Pincode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row no-margin">
                                            <div class="col-md-5">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="phonenumber" id="phonenumber" type="text" placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="col-md-2 padding-leftright-null"></div>
                                            <div class="col-md-5">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="username" id="username" type="text" placeholder="Email Id">
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="row no-margin">
                                            <div class="col-md-5">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="password" id="password" type="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-md-2 padding-leftright-null"></div>
                                            <div class="col-md-5">
                                                <div class="text small padding-topbottom-null">
                                                    <button type="submit" class="btn btn-success btn-block" name="submit" >Log-in</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php 
                                    if(isset($_POST["submit"])){
                                        $shopname = $_POST["shopname"];
                                        $address = $_POST["address"];
                                        $cityid = $_POST["city_id"];
                                        $pincode = $_POST["pincode"];
                                        $phone_number = $_POST["phonenumber"];
                                       $username = $_POST["username"];
                                       $password = $_POST["password"];
                                       date_default_timezone_set("Asia/kolkata");
                                        $date = date("d-m-y h:i:sa");
                                       include("config.php");
                                        $con=mysqli_connect($dbhost ,$dbuser ,$dbpass,$databaseName );
                                        if (!$con) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }
                                        $insert_sql = "INSERT INTO `furniture_shop`(`shop_name`, `address`, `city_id`, `pincode`, `phone_number`, `registration_date`, `user_name`, `user_password`) VALUES ('$shopname','$address','$cityid','$pincode','$phone_number','$date','$username','$password')";
                                        if(mysqli_query($con,$insert_sql)){
                                            echo "Inserted";
                                        }
                                        else{
                                            echo "Error updating record: " . mysqli_error($con);
                                        }
                                        
                                    }
                                ?>                                
                            </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <!--  END HomePage header  -->
                
                </div>
            </div>
            <!--  END Page Content -->
            
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