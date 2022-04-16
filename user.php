<?php
   session_start();

    if(!isset($_SESSION['loginid']))
    {
    echo "you are logged out";
    header('location:homepage.php');

    }
          $id=$_SESSION["loginid"];    
          $db = mysqli_connect("localhost", "root", "");
          mysqli_select_db($db, "food_odering_system");
        $uname =  mysqli_query($db, "select user_name from registration_detail where email='$id' "); 
        $ram=mysqli_fetch_array($uname);
        $username=$ram['user_name'];
               
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="userpage.css">
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
    
    <div class="row"> 
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="user-panel">
                <h2 class="text-panel">
                    <a href="#" class="user-icon"><i class="fa-solid fa-user-astronaut fa-2x"></i></a><br>
                    <?php echo "Welcome <br> ".$username ?>
                </h2>
                <table class=table>
                    <ul class="panel-table">
                        <li class="panel-line" id="home">home</li>
                        <li class="panel-line" id="ChangePwd">change password</li>
                        <li class="panel-line">update account</li>
                        <li class="panel-line">my order</li>
                        <li class="panel-line">setting</li>
                        <li class="panel-line" id="Ab">help desk</li>
                    </ul>
                </table>
            </div>
        </div>

        <?php 
                       
               $db=mysqli_connect("localhost","root","");
               mysqli_select_db($db,'food_odering_system');
               $result=mysqli_query($db, " select * from food_category");
            
               $num = mysqli_num_rows($result);
               if($num > 0){
            
            while($row=mysqli_fetch_array($result)){
                ?>

        <div class="col-lg-3 col-md-3 col-sm-12" id="cardy">
            <form action="order_detail.php" method="post">
                <div class="cdn" >
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
                            <input type="text" placeholder="qty" class="qtyz ">
                            <div class="btn-group d-flex">
                                <button class="btn btn-info flex-fill">Add to cart</button><button
                                    class="btn btn-warning flex-fill ">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
               </div>
            </form>
        
    </div>

    <?php
            }
        }    ?>


    </div>


     <div class="row form-ig" >
            <div class="col-lg-6 col-md-6 col-sm-12 pwd-form" id="formPwd">
                <form style="padding-top:50px" ; method="post" action="chngePwd_code.php">

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
                    <div >
                        <button class="btn btn-warning" name="submit">Update</button>
                        <span> <a href="user_changpwd.php">Reset</a></span>
                    </div>
                </form>
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
            }
            ?>





     
    <script src="script.js"></script>
  

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>