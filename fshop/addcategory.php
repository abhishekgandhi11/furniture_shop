<?php
    session_start();
    $username = $_SESSION["fshop_username"];
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
                                <h3>Furniture Shop Panel</h3>
                                <h2>Add Category</h2>
                                <br><br>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>           	          		   
                </div>
                <div class="container">        
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8 padding-leftright-null">
                        <form id="contact-form" method="post" action="addcategory.php" enctype="multipart/form-data" class="padding-md padding-md-topbottom-null">
                                        <div class="row no-margin">
                                            <div class="col-md-5 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <input class="form-field" name="categoryname" id="categoryname" type="text" placeholder="Category Name">
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <!-- <input class="form-field" name="shopname" id="shopname" type="text" placeholder="Shop Name"> -->
                                                    <input class="form-field" type="file" name="fileToUpload" id="fileToUpload">
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="row no-margin">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 padding-leftright-null">
                                                <div class="text small padding-topbottom-null">
                                                    <button type="submit" class="btn btn-success btn-block" name="submit" >Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </form>
                                    <?php 
                                    if(isset($_POST["submit"])){
                                       $catname = $_POST["categoryname"];
                                      include("upload.php");
                                      $dirname = "catimg/";
                                      $path = "fshop/" . fileupload();
                                      echo $path;
                                                            
                                        include("config.php");
                                        $con=mysqli_connect($dbhost ,$dbuser ,$dbpass,$databaseName );
                                        if (!$con) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }
                                        $insert_sql = "INSERT INTO category (cat_name, image, username) VALUES ('$catname', '$path','$username')";
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
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <br><br>
                                <h3 align="center">Category List</h3>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>      
                </div>
                <!--  END HomePage header  -->
                <form name="frmdropdown" method="post">
                    <div class="container">
                        <!--  Table  -->
                        <div class="row padding-sm">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                <?php
                                    include("config.php");
                                     $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                     mysql_select_db($databaseName,$con) or die ('Database Error');
                                    $dd_res=mysql_query("SELECT * FROM `category` WHERE `username` = '$username'");
                                ?>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Image</th>
                                            </tr>
                                    <?php
                                        while($r1=mysql_fetch_row($dd_res)){ 
                                           $img = substr($r1[2],6);
                                    ?>  
                                                    <tr>
                                                        <td><?php echo $r1[0]; ?></td>
                                                        <td><?php echo $r1[1]; ?></td>
                                                        <td>
                                                        <img src="<?php echo $img ?>" alt="category image" height="80px" width="100px">
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--  END Table  -->
                    </div>
                </form>
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