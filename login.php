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
                                <h2>Log-in</h2>
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
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="username" id="username" type="text" placeholder="User Name">
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>   
                                        <div class="row no-margin">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="password" id="password" type="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        <div class="row no-margin">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                <select name="user" id ="user" class="form-field"> 
                                                    <option style = "font-size :20px ;" value=""> Select User</option>
                                                    <option style = "font-size :20px ;" value="admin">Admin</option>
                                                    <option style = "font-size :20px ;" value="fshop">Furniture Shop</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        <div class="row no-margin">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <button type="submit" class="btn btn-success btn-block" name="submit" >Log-in</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </form>
                                    <?php 
                                    if(isset($_POST["submit"])){
                                       $username = $_POST["username"];
                                       
                                       $password = $_POST["password"];
                                       $user = $_POST["user"];                          
                                        include("config.php");
                                        $con=mysqli_connect($dbhost ,$dbuser ,$dbpass,$databaseName );
                                        if (!$con) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }
                                        if($user=="admin"){
                                            $select_sql = "SELECT * FROM `admin` WHERE `admin_name` = '$username' && 'admin_password' = '$password'";
                                            if($ab = mysqli_query($con,$select_sql)){  
                                                echo mysqli_num_rows($ab);
                                                $_SESSION["admin_username"] = $username;                                
                                                header('Location:admin/admin_desk.php');
                                            }
                                            else{
                                                echo "Enter Correct user name or password";
                                            }    
                                        }
                                        elseif($user=="fshop"){
                                            $select_sql = "SELECT * FROM `furniture_shop` WHERE `user_name` = '$username' && 'user_password' = '$password'";
                                            if(mysqli_query($con,$select_sql)){  
                                                $_SESSION["fshop_username"] = $username;                                   
                                                header('Location:fshop/fshop_desk.php');
                                            }
                                            else{
                                                echo "Enter Correct user name or password";
                                            }    
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