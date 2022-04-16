<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css" />
    <link rel="icon" href="images/food07.png">
    <title>online food odering system</title>
</head>

<body>
    <!-- Main Start -->

    <!-- Header Start -->
    <div class="row">

        <div class="header">
            <div class=" container bg-img">
                <div class=" home-text">
                    <h2>online food odering system</h2>
                    <p>discover the best food around you !!</p>
                    <div class="search">
                        <input type="text" class="search-box w-100%" placeholder="search">
                    </div>
                </div>
            </div>
            <div class="login-button">
                <a href="registration.html" class="btn">register</a>
                <a href="loginpage.php" class="btn">login</a>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Main Menu Start -->
    <div class="card-main" onclick="setText()">
        <div class="card">
            <div class="img-box">
                <img src="images/food01.jpg">
                <h3>starter </h3>
                <div class="content">
                    <h2 >starter</h2>
                    <h5>Lorem ipsum dolor sit amet consectetur
                        Accusantium, voluptate!</h5>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="img-box">
                <img src="images/food02.webp">
                <h3>main menu </h3>
                <div class="content">
                    <h2>main menu</h2>
                    <h5>Lorem ipsum dolor sit amet consectetur
                        Accusantium, voluptate!</h5>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="img-box">
                <img src="images/food03.webp">
                <h3>breakfast </h3>
                <div class="content">
                    <h2>breakfast</h2>
                    <h5>Lorem ipsum dolor sit amet consectetur
                        Accusantium, voluptate!</h5>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="img-box">
                <img src="images/tiku04.jpg">
                <h3>fast food </h3>
                <div class="content">
                    <h2>fast food</h2>
                    <h5>Lorem ipsum dolor sit amet consectetur
                        Accusantium, voluptate!</h5>
                </div>
            </div>
        </div>
    </div>



    <!-- Main Menu End -->
    <div class="puri-chole">
        <div class="puri">
            <img src="images/food07.png" class="img-puri">

            <div class="discount">
                <a href="#" class="title-text">get flat 30% off </a><br><br>
                <hr>
                <a href="#" class="title-description">on chole puri </a>
            </div>

        </div>
    </div>

    <div class="non-veg">
        <div class="non-veg-box">
            <img src="images/food05.jpg" class="img-set">
        </div>
    </div>

    <!-- Main End -->




    <div class="footer">
        <footer>@stiknendra production</footer>
        <div class="social-icon">
            <a href="#">icon</i></a>
        </div>
    </div>



    <script src="https://kit.fontawesome.com/7ac2bd24b6.js" crossorigin="anonymous"></script>
<?php  
            if(isset($_GET["flag"]))
            {
                $flag=$_GET["flag"];
                if($flag==0)
                echo "<script> alert('registration successful let's login') </script>";
                else
                echo "<script> alert('Registration failed tray again')  </script> " ; 
            }
     ?>

     <script>

 function setText() {
     window.location.replace("images/starter_menu.php");
 }
         </script>
</body>

</html>