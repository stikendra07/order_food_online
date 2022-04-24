<?php 
    session_start();
               $login_id=$_SESSION["loginid"];
               $food_id=$_SESSION["uid"]; 
               ?>
  <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
 </head>
        <body>
        <div class="container">
        <table class="table table-bordered" cellpadding="5" cellspacing="20" style="margin-top:30px">
        <thead>
            <tr>
            <th scope="col">Sno</th>
            <th scope="col">User ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Discount</th>
            <th scope="col">Qty</th>
            <th scope="col">Price</th>
            <th scope="col">Total Price</th>
            <th scope="col" styl="cursor:pointer">Delete</th>
            </tr>
        </thead>
        <tbody>
             <?php
             $i=1;
        $db=mysqli_connect("localhost", "root" ,"" );
        mysqli_select_db($db, "food_odering_system" );
        $uname=mysqli_query($db, "select* from order_childtb where login_id='$login_id'" );
        // $res=mysqli_query($db, "select* from order_parent_tb user_id='$user_id'" );
        $num = mysqli_num_rows($uname);
            if($num > 0){
            
            while($row=mysqli_fetch_array($uname))
        {
          ?>
            <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $row['login_id']?></td>
            <td><?php echo $row['food_name']?></td>
            <td><?php echo $row['dscnt']?>% </td>
            <td><?php echo $row['qty']?></td>
            <td> &#8377;<?php echo $row['price']?></td>
            <td><?php echo $row['total_price']?></td>
             <td><a>Delete</a></td>
            </tr>
            <?php
            }
            $un_12=mysqli_query($db, "select* from order_parent_tb where login_id='$login_id'" );
            $ram=mysqli_fetch_array($un_12)
            ?> 
            <tr>              
             <td colspan="7" style="text-align:right ; margin-right:20px"> <strong>Total ₹<?php echo $ram['pay_amount']?> </strong></td> 
             </tr>
             <?php
        }
        ?>
        </tbody>
        </table>
            <a href="payment_page.php"class="btn btn-success">Proceed To Pay</a>
            <a href="user.php"class="btn btn-info">Back</a>
        </div>
        <script>
        </script>

                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>