<?php session_start(); if(!isset($_SESSION['loginid'])) { 
    echo "you are logged out" ;
    header('location:homepage.php'); 
} 



    $id=$_SESSION["loginid"]; 
    $db=mysqli_connect("localhost", "root" , "" );
    mysqli_select_db($db, "food_odering_system" );
    $uname=mysqli_query($db, "select user_name from registration_detail where email='$id' " );
    $ram=mysqli_fetch_array($uname); $username=$ram['user_name']; ?>


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
                <ul class="navbar-nav">


                </ul>
                <ul class=" navbar-nav ml-auto">
                    <li class="nav-item active">
                        <span><a class="nav-link active" href="logout_page.php"><i
                                    class="fa-solid fa-arrow-right-to-bracket"></i>
                                Logout</a></span>
                    </li>
                    <li class="nav-item active">
                        <span><a class="nav-link active" href="registration_page.php"><i class="fa-solid fa-user"></i>
                                SignUp</a></span>
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
                            <li class="panel-line active" onclick="chngPwd()">home</li>
                            <li class="panel-line " onclick="chngPwd()">change password</li>
                            <li class="panel-line" onclick="update()">update account</li>
                            <li class="panel-line" onclick="order()">my order</li>
                            <li class="panel-line" onclick="setting()">setting</li>
                            <li class="panel-line" onclick="helpDesk()">help desk</li>
                        </ul>
                    </table>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <form style="padding-top:50px" ; method="post" action="chngePwd_code.php">

                    <h2 style="margin-left :50px" ;>Change Password.. </h2>
                    <div class="form-group col-lg-6 mx-5 my-3">
                        <label for="formGroupExampleInput"> Old Password</label>
                        <input type="text" class="form-control" name="opwd">
                    </div>
                    <div class="form-group col-lg-6 mx-5 my-3">
                        <label for="formGroupExampleInput"> New Password</label>
                        <input type="password" class="form-control" name="npwd">
                    </div>
                    <div class="form-group col-lg-6 mx-5">
                        <label for="formGroupExampleInput2"> Confirm Password</label>
                        <input type="password" class="form-control" name="cpwd">
                    </div>
                    <div style="margin-left:80px">
                        <button class="btn btn-warning" name="submit">Update</button>
                        <span> <a href="user_changpwd.php">Reset</a></span>
                    </div>
                </form>
            </div>
    </body>
    <html>










    <script>

        function chngPwd() {
            window.location.replace("changePwd.php");
        }
        function home() {
            window.location.replace("user.php");
        }
        function setting() {
            window.location.replace("changePwd.php");
        }
        function order() {
            window.location.replace("changePwd.php");
        }
        function helpDesk() {
            window.location.replace("changePwd.php");
        }

    </script>








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