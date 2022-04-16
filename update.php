<?php
                   
               $db=mysqli_connect("localhost","root","");
               mysqli_select_db($db,'food_odering_system');
               $result=mysqli_query($db, " select * from order_details");
            
               $num = mysqli_num_rows($result);
               if($num > 0){
            
            while($row=mysqli_fetch_array($result))
        {
                           
            
            }  
        }
        ?>