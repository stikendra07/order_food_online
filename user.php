<?php 
    session_start(); 
    if(!isset($_SESSION['loginid'])) { 
    echo "you are logged out" ;
    header('location:index.html'); 
    }
     $id=$_SESSION["loginid"]; 
     $db=mysqli_connect("localhost", "root" , "" );
    mysqli_select_db($db, "food_odering_system" );
    $uname=mysqli_query($db, "select* from registration_detail where email='$id' " );
    $ram=mysqli_fetch_array($uname); 
    $username=$ram['user_name']; 
    $dob=$ram['dob']; 
    $contact=$ram['contact']; 
    $email=$ram['email']; 
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="userpage.css"> -->
        <link rel="stylesheet" href="user_page_css.css">
        <script src="https://kit.fontawesome.com/7ac2bd24b6.js" crossorigin="anonymous"></script>


        <title>user/page</title>



    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-attachment:fixed">
            <a class="navbar-brand" href="homepage.php">Online_food</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class=" navbar-nav ml-auto">
                    <li class="nav-item active">
                        <span><a class="nav-link active" href="logout_page.php"><i
                                    class="fa-solid fa-arrow-right-to-bracket"></i>
                                Logout</a></span>
                    </li>
                </ul>

            </div>
        </nav>
<script>
    function onkeyup(){
        var p1=document.getElementById("qty").value
    }
    </script>


        <div class="container-fluid">
            <div class="row">
                <!-- ------------------------User Panel Start--------------------------- -->
                <div class="col-lg-3">
                    <div class="user-panel">
                        <h2 class="text-panel">
                            <a href="#" class="user-icon"><i class="fa-solid fa-user-astronaut fa-2x"></i></a><br>
                            <?php echo "Welcome <br> ".$username ?>
                        </h2>
                        <table class=table>
                            <ul class="panel-table">
                                <li class="panel-line active" data-target="1">home</li>
                                <li class="panel-line" data-target="2">change password</li>
                                <li class="panel-line"data-target="3">update account</li>
                                <li class="panel-line" onclick="Replace()"> my cart</li>
                                <li class="panel-line"data-target="4">my order</li>
                                <li class="panel-line"data-target="5">setting</li>
                                <li class="panel-line"data-target="6">help desk</li>
                            </ul>
                        </table>
                    </div>
                </div>
        <!-- ------------------------User Panel End---------------------------- -->
           <!-- ---------------------User Food Gallery Start----------------------------------->
                <div class="col-lg-9 hidden para1">
                    <div class="container-fluid food-gallery">
                        <div class="row">

                            <?php 
                                      $db=mysqli_connect("localhost","root","");
                                       mysqli_select_db($db,'food_odering_system');
                                       $result=mysqli_query($db, " select * from food_category where id='1'");   
                                       $row=mysqli_fetch_array($result);
                                       


                            ?>
                            <div class="col-lg-3">
                                <form action="cart.php?food_id=1" method="post">
                                    <div class="card">
                                        <h6 class="card-title">
                                            <?php echo $row['name'] ;?>
                                        </h6>
                                        <div class="card-body">
                                            <img src="<?php echo $row['image'] ?>" class="img-fluid">
                                            <h5 class="card-price"> &#8377;
                                                <?php echo $row['price'] ;?>
                                            </h5>

                                            <h4 class="card-discount">
                                                <?php echo $row['discount'] ;?>% off
                                            </h4>
                                            <input type="text" placeholder="qty" class="qtyz" name="qty">
                                            <div class="btn-group d-flex">
                                                <button class="btn btn-info flex-fill" type="submit"name="submit">Add Card</button>
                                                <button class="btn btn-warning flex-fill" type="submit"name="submit">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <?php 
                                      $db=mysqli_connect("localhost","root","");
                                       mysqli_select_db($db,'food_odering_system');
                                       $result=mysqli_query($db, " select * from food_category where id='2' ");   
                                       $row=mysqli_fetch_array($result);


                            ?>
                            <div class="col-lg-3">
                                <form action="cart.php?food_id=2" method="post">

                                    <div class="card">
                                        <h6 class="card-title">
                                            <?php echo $row['name'] ;?>
                                        </h6>
                                        <div class="card-body">
                                            <img src="<?php echo $row['image'] ?>" class="img-fluid">
                                            <h5 class="card-price"> &#8377;
                                                <?php echo $row['price'] ;?>
                                            </h5>

                                            <h4 class="card-discount">
                                                <?php echo $row['discount'] ;?>% off
                                            </h4>
                                            <input type="text" placeholder="qty" class="qtyz"  name="qty">
                                            <div class="btn-group d-flex">
                                               
                                                <button class="btn btn-info flex-fill " type="submit"name="submit">Add to Card</button>
                                                <button class="btn btn-warning flex-fill " type="submit"name="submit">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <?php 
                                      $db=mysqli_connect("localhost","root","");
                                       mysqli_select_db($db,'food_odering_system');
                                       $result=mysqli_query($db, " select * from food_category where id='3' ");   
                                       $row=mysqli_fetch_array($result);


                            ?>
                            <div class="col-lg-3">
                                <form action="cart.php?food_id=3" method="post">

                                    <div class="card">
                                        <h6 class="card-title">
                                            <?php echo $row['name'] ;?>
                                        </h6>
                                        <div class="card-body">
                                            <img src="<?php echo $row['image'] ?>" class="img-fluid">
                                            <h5 class="card-price"> &#8377;
                                                <?php echo $row['price'] ;?>
                                            </h5>

                                            <h4 class="card-discount">
                                                <?php echo $row['discount'] ;?>% off
                                            </h4>
                                            <input type="text" placeholder="qty" class="qtyz" name="qty">
                                            <div class="btn-group d-flex">
                                                
                                                <button class="btn btn-info flex-fill " type="submit"name="submit">Add to cart</button>
                                                <button class="btn btn-warning flex-fill " type="submit"name="submit">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <?php 
                                      $db=mysqli_connect("localhost","root","");
                                       mysqli_select_db($db,'food_odering_system');
                                       $result=mysqli_query($db, " select * from food_category where id='4' ");   
                                       $row=mysqli_fetch_array($result);


                            ?>
                            <div class="col-lg-3">
                                <form action="cart.php?food_id=4" method="post">

                                    <div class="card">
                                        <h6 class="card-title">
                                            <?php echo $row['name'] ;?>
                                        </h6>
                                        <div class="card-body">
                                            <img src="<?php echo $row['image'] ?>" class="img-fluid">
                                            <h5 class="card-price"> &#8377;
                                                <?php echo $row['price'] ;?>
                                            </h5>

                                            <h4 class="card-discount">
                                               <?php echo $row['discount'] ;?>% off
                                            </h4>
                                            <input type="text" placeholder="qty" class="qtyz"  name="qty">
                                            <div class="btn-group d-flex">
                                               
                                                <button class="btn btn-info flex-fill " type="submit"name="submit">Add to cart</button>
                                                <button class="btn btn-warning flex-fill " type="submit"name="submit">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- ----------------------------User Food Gallery End---------------------------- -->
                
                <!-- --------------Change Password Start----------------- -->
                                    <div class="col-lg-9 hidden para2">
                                        <div class="container">
                                        <form  method="post" action="chngePwd_code.php">

                                            <h2>Change Password.. </h2>
                                            <div class="form-group ">
                                                <label for="formGroupExampleInput"> Old Password</label>
                                                <input type="text" class="form-control" name="opwd">
                                            </div>
                                            <div class="form-group ">
                                                <label for="formGroupExampleInput"> New Password</label>
                                                <input type="password" class="form-control" name="npwd">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2"> Confirm Password</label>
                                                <input type="password" class="form-control" name="cpwd">
                                            </div>
                                            <div>
                                                <button class="btn btn-warning" name="submit">Update</button>
                                                <span> <a href="user.php">Reset</a></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
             <!------------------ --------------Change Password End---------------- -->

              <!-- -------------------Update Account Start---------- -->
                                 <div class="col-lg-9 hidden para3">
                                        <div class="container">
                                        <form  method="post" action="user_update.php">

                                            <h2>Update Account.. </h2>
                                            <div class="form-group ">
                                                <label> User Name</label>
                                                <input type="text" class="form-control" name="uname" value="<?php echo $username ?>">
                                            </div>
                                            <div class="form-group ">
                                                <label> Contact</label>
                                                <input type="text" class="form-control" name="call" value="<?php echo $contact ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <input type="text" class="form-control" name="dobs" value="<?php echo $dob ?>">
                                            </div>
                                            <div>
                                                <button class="btn btn-warning" name="update">Update</button>
                                                <span> <a href="user.php">Reset</a></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                      <!-- -------------------Update Account End---------- -->
                      <!------------------------ My Order Start---------------------------------- -->
                        <div class="col-lg-9 hidden para4">
                            <div class="contaner">
                            
                            You have'nt Order Yet  !! please order first
                                
                               </div>
                        </div>
               <!------------------------ My Order End---------------------------------- -->
               <!-- ---------------------Cart Start---------------------------------------->
               <!-- ---------------------Cart End-------------------------------------- -->
                                

            </div>
        </div>

       


        <?php  
            if(isset($_GET["flag"]))
            {
                $flag=$_GET["flag"];
                if($flag==0)
                echo "<script> alert('Password Upadation failed try again')  </script> " ; 
                else if($flag==1)
                echo "<script> alert('Your Password Updated successfully')  </script> " ; 
                else if($flag==2)
                echo "<script> alert('old password not matched')  </script> " ; 
                else if($flag==3)
                echo "<script> alert('both password not matched')  </script> " ; 
                else if($flag==4)
                echo "<script> alert('account updated successfully')  </script> " ; 
                else if($flag==5)
                echo "<script> alert('Failed ! Try again')  </script> " ; 
            }
            ?>



          <script>
  
               //Replace function that replace the current page.
               function Replace() {
                    location.replace("show_cart.php")
               }
  
          </script>


        <script src="script.js"></script>


        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


       <!-- javaScripts cdn link -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="admin_js.js"></script>
    </body>

    </html>