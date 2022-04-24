<?php 
    session_start(); 
    if(!isset($_SESSION['uid'])) 
    { 
    header('location:index.html'); 
    }     

               $id=$_SESSION["loginid"];
               $food_id=$_SESSION["uid"]; 
               $qty=$_SESSION['f_id'];
            //    echo $id;
               
                        date_default_timezone_set("Asia/Calcutta");
                        $dt=date("F j, Y, h:i a");
                    
                $db=mysqli_connect("localhost","root","");
                 mysqli_select_db($db,'food_odering_system');

                $result=mysqli_query($db, "select * from food_category where id='$food_id'");   
                $row=mysqli_fetch_array($result);
                $foodname=$row['name'];
                $price=$row['price'];
                $discount=$row['discount'];
                settype($qty, "float");
                $total_price = $price * $qty;
                mysqli_query($db, "insert into order_childtb values('$id','$food_id','$foodname','$discount','$qty','$price','$total_price')");


                $res=mysqli_query($db, "select* from order_childtb where login_id='$id'");
                $pay_amount=0;
                $num = mysqli_num_rows($res);
                if($num > 0)
            
                  while($ram = mysqli_fetch_array($res))
                  {
                     
                      $pay_amount += $ram['total_price'];         
                  }
                                                             
                //  mysqli_query($db, "insert into order_parent_tb values('$id','$food_id','$dt','$pay_amount')");
                 mysqli_query($db,"update order_parent_tb set pay_amount='$pay_amount', odate='$dt' where login_id='$id'");               
                $rem = mysqli_affected_rows($db);
                if ($rem) 
                {
                header("location:show_cart.php");
                    }
                mysqli_close($db);       
?>