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
    <title>starter page</title>
    <style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
body {
  width: 100%;
 }
.card {
  margin: 40px 20px;
  text-align: center;
  text-transform: capitalize;
  color: #e02f6b;
  cursor: pointer;
  font-family: poppins, "sans-serif";
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
}
.card-title {
  margin-top: 20px;
  font-size: 22px;
}
.card-price {
  color: #fff;
  background-color: #e02f6b;
}
.card-discount {
  color: #fff;
  font-size: 12px;
  background-color: green;
  width: 20%;
  margin-left: 3px;
  border-radius: 5px;
  border: 1px solid black;
}
.qtyz {
  width: 100%;
  display: flexbox;
  border: 1px solid green;
  border-radius: 10px;
  margin: 5px 0;
  outline: none;
  text-align: center;
}
.qtyz::placeholder {
  text-align: center;
  justify-content: center;
}
.btn {
  display: inline;
}

    </style>



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-attachment:fixed">
        <a class="navbar-brand" href="..//homepage.php">Online_food</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="..//homepage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                

            </ul>
            <ul class=" navbar-nav ml-auto">
                 <li class="nav-item active">
                    <span><a class="nav-link active" href="..//loginpage.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></i>
                            login</a></span>
                </li>
                
                <li class="nav-item active">
                    <span><a class="nav-link active" href="..//registration.html"><i class="fa-solid fa-user"></i>
                            SignUp</a></span>
                </li>
            </ul>

        </div>
    </nav>
    <div class="row">


        <?php 
         
              
               $db=mysqli_connect("localhost","root","");
               mysqli_select_db($db,'food_odering_system');
               $result=mysqli_query($db, " select * from starter_menu");
            
               $num = mysqli_num_rows($result);
               if($num > 0){
            
            while($row=mysqli_fetch_array($result)){
                ?>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <form action="..//loginpage.php" method="post">
                <div class="cdn">
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
                                <button class="btn btn-info flex-fill" type="submit">Add to cart</button><button
                                    class="btn btn-warning flex-fill " type="submit">Buy
                                    Now</button>
                            </div>
                        </div>

                    </div>
            </form>
        </div>
    </div>

    <?php
            }
        }    ?>


    </div>





    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>