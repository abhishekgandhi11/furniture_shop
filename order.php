<?php
session_start();
ob_start();
$catid = $_GET['catid'];
$fshop = $_GET['fshop'];
$catname = $_GET['catname'];
$itemid = $_GET['itemid'];
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
            <form id="contact-form" method="post" class="padding-md padding-md-topbottom-null">
                <!--  HomePage header  -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <br><br>
                                    <h2><?php echo $fshop; ?></h2>
                                    <br>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6" align="center">
                                <br><br>
                                    <h3>Your Order</h3>
                                <br>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>           	          		   
                    </div>
                <!--  END HomePage header  -->
                <!-- <div id="home-wrap" class="content-section"> -->
                    <div class="container">
                        <!--  Qty area  -->

                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8 padding-leftright-null">
                            
                                            <div class="row no-margin">
                                                <div class="col-md-3">
                                                    <?php
                                                        include("config.php");
                                                        $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                                        mysql_select_db($databaseName,$con) or die ('Database Error');
                                                        $dd_res1=mysql_query("Select * FROM main_item where item_id= '$itemid'");
                                                        $r1=mysql_fetch_row($dd_res1);
                                                        echo "Price : " . $r1[3];
                                                        $a_qty = $r1[4];
                                                        
                                                    ?>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3 padding-leftright-null">
                                                    <div class="text small padding-topbottom-null">
                                                        <!-- <input class="form-field" name="categoryname" id="categoryname" type="text" placeholder="Category Name"> -->
                                                        <select name="qty" class="form-field" id ="qty"> 
                                                            <option style = "font-size :20px ;" class="form-field" value=""> Select Qty</option>    
                                                            <option style = "font-size :15px ;" value="1">1</option>
                                                            <option style = "font-size :15px ;" value="2">2</option>
                                                            <option style = "font-size :15px ;" value="3">3</option>
                                                            <option style = "font-size :15px ;" value="4">4</option>
                                                            <option style = "font-size :15px ;" value="5">5</option>
                                                            <option style = "font-size :15px ;" value="6">6</option>
                                                            <option style = "font-size :15px ;" value="7">7</option>
                                                            <option style = "font-size :15px ;" value="8">8</option>
                                                            <option style = "font-size :15px ;" value="9">9</option>
                                                            <option style = "font-size :15px ;" value="10">10</option>                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4 padding-leftright-null">
                                                    <!-- <div class="text small padding-topbottom-null"> -->
                                                        <button type="submit" class="btn btn-success btn-block" name="submit" >CALCULATE PRICE</button>
                                                    <!-- </div> -->
                                                </div>
                                            </div>   
                                        
                                        <?php 
                                        if(isset($_POST["submit"])){
                                            $qty = $_POST['qty'];
                                            $_SESSION["qty"] = $qty;
                                           
                                            $itemname = $r1[2];
                                            $price = $r1[3];
                                            $_SESSION["price"] = $price;
                                            if($a_qty>=$qty){
                                                $total_price = $price * $qty;
                                                $_SESSION["totalprice"] =$total_price;
                                                $a_qty -= $qty;
                                                $_SESSION["a_qty"] = $a_qty;
                                            }
                                            else{
                                                echo "Please Select qty less then available or Product is out of stock";
                                            }
                                            ?>
                                            <!--  Table  -->
                                            <div class="row padding-sm">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                    <?php
                                                        // include("config.php");
                                                        // $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                                        // mysql_select_db($databaseName,$con) or die ('Database Error');
                                                        // $dd_res1=mysql_query("SELECT * FROM `main_item` WHERE `username` = '$username'");
                                                    ?>
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Shop Name</th>
                                                                    <th>Category Name</th>
                                                                    <th>Item Name</th>
                                                                    <th>Price</th>
                                                                    <th>Qty</th>
                                                                    <th>Total Price</th>
                                                                </tr>  
                                                                <tr>
                                                                    <td><?php echo $fshop; ?></td>
                                                                    <td><?php echo $catname; ?></td>
                                                                    <td><?php echo $itemname; ?></td>
                                                                    <td><?php echo $price; ?></td>
                                                                    <td><?php echo $qty; ?></td>
                                                                    <td><?php echo $total_price; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  END Table  -->
                                            <!-- Contact -->
                                            <div class="container padding-md-bottom-lg">
                                                <div class="row no-margin padding-onlytop-lg">
                                                    <div class="col-md-12 padding-leftright-null">
                                                        <div class="text padding-topbottom-null">
                                                            <h2 class="heading margin-bottom-null">Contact Information<span class="color"></span></h2>
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 wrap-text">
                                                        <div class="col-sm-5 padding-leftright-null">
                                                            <!-- Contact Form -->
                                                                <h3>First Time Registration.</h3>
                                                                <br><br>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <input class="form-field" name="customername" id="customername" type="text" placeholder="Customer Name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <textarea class="form-field" name="address" id="address" rows="1" placeholder="Address"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <!-- <input class="form-field" name="categoryname" id="categoryname" type="text" placeholder="Category Name"> -->
                                                                            <select name="cityid" class="form-field" id ="cityid"> 
                                                                                <option style = "font-size :20px ;" class="form-field" value=""> Select City</option>
                                                                                    <?php
                                                                                        include("config.php");
                                                                                        $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                                                                        mysql_select_db($databaseName,$con) or die ('Database Error');
                                                                                        $dd_res=mysql_query("SELECT city_id,city_name FROM `city`");
                                                                                        while($r3=mysql_fetch_row($dd_res)){ 
                                                                                            echo "<option style = 'font-size :15px ;' value='$r3[0]'> $r3[1] </option>";
                                                                                        }
                                                                                    ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <input class="form-field" name="pincode" id="pincode" type="text" placeholder="Pincode">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <input class="form-field" name="phonenumber" id="phonenumber" type="text" placeholder="Phone Number">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <input class="form-field" name="username" id="username" type="text" placeholder="Email id">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <div class="submit-area padding-onlytop-sm">
                                                                                <!-- <input type="submit" id="submit-contact" class="btn-alt active shadow" value="Send Message">
                                                                                <div id="msg" class="message"></div> -->
                                                                                <button type="submit" class="btn btn-success btn-block" name="first" >Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                            <!-- END Contact Form -->
                                                        </div>
                                                        <div class="col-sm-2 padding-leftright-null">
                                                                <br><br><br><br>
                                                            <h2>Or</h2>
                                                        </div>
                                                        <div class="col-sm-5 padding-leftright-null">
                                                                <h3>Already Registered.</h3>
                                                                <br><br>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <input class="form-field" name="email" id="email" type="text" placeholder="Email id">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row no-margin">
                                                                    <div class="col-md-10 padding-leftright-null">
                                                                        <div class="text small padding-topbottom-null">
                                                                            <div class="submit-area padding-onlytop-sm">
                                                                                <!-- <input type="submit" id="submit-contact" class="btn-alt active shadow" value="Send Message">
                                                                                <div id="msg" class="message"></div> -->
                                                                                <button type="submit" class="btn btn-success btn-block" name="already" >Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Contact -->

                                              <?php
                                              } 
                                                if(isset($_POST["first"])){
                                                    $customername = $_POST["customername"];
                                                    $address = $_POST["address"];
                                                    $cityid = $_POST["cityid"];
                                                    $pincode = $_POST["pincode"];
                                                    $phonenumber = $_POST["phonenumber"];
                                                    $email =$_POST["username"];
                                                    $_SESSION["email_id_p"] = $email;
                                                    date_default_timezone_set("Asia/kolkata");
                                                    $date = date("d-m-y h:i:sa");
                                                    include("config.php");
                                                    $con=mysqli_connect($dbhost ,$dbuser ,$dbpass,$databaseName );
                                                    if (!$con) {
                                                        die("Connection failed: " . mysqli_connect_error());
                                                    }
                                                    $insert_sql = "INSERT INTO `customer`(`c_name`, `address`, `city_id`, `pincode`, `phone_number`, `user_name`, `date_registration`) VALUES ('$customername','$address','$cityid','$pincode','$phonenumber','$email','$date')";
                                                    if(mysqli_query($con,$insert_sql)){
                                                        // echo "Inserted";
                                                    }
                                                    else{
                                                        echo "Error updating record: " . mysqli_error($con);
                                                    }
                                                    include("config.php");
                                                    $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                                    mysql_select_db($databaseName,$con) or die ('Database Error');
                                                    $dd_res2=mysql_query("Select * FROM customer where user_name = '$email'");
                                                    $r2=mysql_fetch_row($dd_res2);
                                                    $_SESSION["custid"] = $r2[0];

                                                }                     
                                                

                                                if(isset($_POST["already"])){
                                                    $email = $_POST["email"];
                                                    include("config.php");
                                                    $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                                    mysql_select_db($databaseName,$con) or die ('Database Error');
                                                    $dd_res1=mysql_query("Select * FROM customer where user_name = '$email'");
                                                    $r1=mysql_fetch_row($dd_res1);
                                                    $_SESSION["custid"] = $r1[0];
                                                    echo "Customer Name: " . $r1[1] . "</br>";
                                                    echo "Address : " . $r1[2] . "</br>";
                                                    echo "Pincode : " . $r1[4] . "</br>";
                                                    echo "Mobile Number : " . $r1[5] . "</br>";
                                                    echo "email id : " . $r1[6] . "</br>";
                                                    $_SESSION["email_id_p"] = $r1[6];                          
                                                   
                                                }    
                                        
                                    ?>     

                                    
                                </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <br><br>
                                <button type="submit" class="btn btn-success btn-block" name="placeorder" >Place Order</button>
                            </div>
                            <div class="col-md-4"></div>
                            <?php
                                if(isset($_POST["placeorder"])){
                                    $email = $_SESSION["email_id_p"];
                                    //for f_id
                                    include("config.php");
                                    $con=mysql_connect($dbhost ,$dbuser ,$dbpass )or die ('Connection Error');
                                    mysql_select_db($databaseName,$con) or die ('Database Error');
                                    $furnitureshop=mysql_query("Select * FROM furniture_shop where shop_name = '$fshop'");
                                    $res1=mysql_fetch_row($furnitureshop);
                                    echo $f_id = $res1[0];
                                     $a_qty = $_SESSION["a_qty"];   
                                    $cust_id = $_SESSION["custid"];
                                   $price = $_SESSION["price"];
                                    $qty = $_SESSION["qty"];
                                  $total_price = $_SESSION["totalprice"];
                                    // insert into order detail table
                                    include("config.php");
                                    $con=mysqli_connect($dbhost ,$dbuser ,$dbpass,$databaseName );
                                    if (!$con) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }
                                    $insert_sql = "INSERT INTO `order_details`( `f_id`, `price`, `qty`, `cat_id`, `c_id`, `total_price`,`itemid`) VALUES ('$f_id','$price','$qty','$catid','$cust_id','$total_price','$itemid')";
                                    if(mysqli_query($con,$insert_sql)){
                                        //update qty into item table
                                        $update_sql = "UPDATE `main_item` SET `qty`='$a_qty' WHERE `item_id`='$itemid'";
                                        if(mysqli_query($con,$update_sql)){
                                            header('Location:msg.php');
                                        }
                                        else{
                                            echo "Error updating record: " . mysqli_error($con);
                                        }
                                    }
                                    else{
                                        echo "Error updating record: " . mysqli_error($con);
                                    }

                                    
                            
                                    

                                }
                            ?>
                        </div>
                        <!-- END Qty area -->                    
                    </div>
                </div>
            </div>
            <!--  END Page Content -->
            </form>
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