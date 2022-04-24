
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="payment.css">
    <link rel="icon" href="images/mscard.png">
    <script src="https://kit.fontawesome.com/7ac2bd24b6.js" crossorigin="anonymous"></script>
    <title>payment</title>

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info" style="background-attachment:fixed">
            <a class="navbar-brand" href="homepage.php">Payment</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">


                </ul>
                <ul class=" navbar-nav ml-auto">
                    <li class="nav-item active">
                        <span><a class="nav-link active" href="user.php">
                                <i class="fa-solid fa-angles-left "></i></a></span>
                </ul>

            </div>
        </nav>
        <div class="row ">
            <div class="col-sm-8">
                <h2 class="payment-getway">payment getway</h2>
                <div class="div1">
                    <h3 class="payment-method">payment method</h3>
                    <ul class="ul">

                        <li class="payment-option"><input type="radio" name="t1" class="panel-line active" data-target="1" checked><img
                                src="images/credit.svg" class="master-card"></li>
                        <li class="payment-option"><input type="radio" name="t1" class="panel-line" data-target="2"><img
                                src="images/mscard.png" class="master-card"></li>
                        <li class="payment-option"><input type="radio" name="t1" class="panel-line" data-target="1"><img
                                src="images/paytm.svg" class="master-card"></li>
                        <li class="payment-option"><input type="radio" name="t1" class="panel-line" data-target="2"><img src="images/upi.svg"
                                class="master-card upi"></li>
                    </ul>
                </div>
                <div class="div2 hidden para1">
                    <form>
                        <div class="form-group">
                            <label>Enter Card Number</label>
                            <input type="text" class="form-control">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your card details with
                                anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label>Card Holder Name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group date">
                            <label>MM/YY</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                            <label>CVV</label>
                            <span> <input type="text" class="form-control cvv" id="exampleInputPassword1"><i
                                    class="fa-solid fa-keyboard fa-2x"></i></span>
                        </div>
                        <button type="submit" class="btn btn-warning">Proceed</button>
                    </form>
                </div>
                <div class="div4 hidden para2">
                    <form>
                        <div class="form-group">
                            <label>Enter UPI Id</label>
                            <input type="text" class="form-control">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your card details with
                                anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label>Security Code</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-warning">Proceed</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-4 div3 print-container" >
                <h4 class="orders">your orders</h4>
                <div class="order-details">
                    <table>
                        <tbody>
                            
                            <tr>
                                <th>client name</th>
                                <th><?php echo $username ?></th>
                            </tr>
                            <?php
                                       $db=mysqli_connect("localhost","root","");
                                       mysqli_select_db($db,'food_odering_system');
                                       $result=mysqli_query($db, " select * from order_childtb where login_id='$id'");
                                       $num=mysqli_num_rows($result);

                                       if($num > 0){                                
                                        while($row=mysqli_fetch_assoc($result)) {  
                                ?>
                            <tr>
                                <th>food name</th>
                                <th>
                                    <?php echo $row['food_name']; ?>
                                    
                                </th>
                            </tr>
                             <tr>
                                <th>qty</th>
                                <th>
                                    <?php echo $row['qty'];?>
                                </th>
                            </tr>
    
                            <tr>
                                <th> price rs.</th>
                                <th> &#8377;
                                    <?php echo $row['total_price']; ?>
                                </th>
                            </tr>
                            <tr>
                                <th>shipping</th>
                                <th>
                                    0.0
                                </th>
                            </tr>                
                            <?php
                                    }
                                        }
                                        ?>
                             <?php
                                  $res=mysqli_query($db, " select * from order_parent_tb where login_id='$id'");
                                  $ram=mysqli_fetch_assoc($res);
                                  ?>
                                   <tr>
                                <th>date</th>
                                <th>
                                    <?php echo $ram['odate']; ?>
                                </th>
                            </tr>
                                  <tr>
                                <th> <strong> total price</strong> </th>
                                <th><strong> &#8377;<?php echo $ram['pay_amount']; ?> </strong></th>                                
                            </tr>
                                            
                        </tbody>
                    </table>
                      <a class="print" onclick="window.print();">print</a>

                </div>
            </div>
       </div>



<!-- javaScripts cdn link -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="admin_js.js"></script>
      
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>