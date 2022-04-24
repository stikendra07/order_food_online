<?php


               
                                 
                //  function grandprice(){
                $db=mysqli_connect("localhost","root","");
                mysqli_select_db($db,'food_odering_system');
                $res=mysqli_query($db, "select* from order_childtb where login_id='user'");
                    $pay_amount=0;
                    $num = mysqli_num_rows($res);
                    if($num > 0)
            
                  while($ram = mysqli_fetch_array($res))
                  {
                     
                      $pay_amount += $ram['total_price'];         
                  }
            
                   
                echo $pay_amount;
                


?>