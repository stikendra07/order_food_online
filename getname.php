<?php
   $code=$_GET["code"];
   $name="";
   $price="";

   $db=mysqli_connect("localhost","root","","food_odering_system");
   $result=mysqli_query($db,"select* from order_details where food LIKE ='%$food_name%'");
   while($row=mysqli_fetch_array($result))
   {
       $name =  "<td>".$row['id']."</td><td>".$row['clietn_id']."</td><td>".$row['contact']."</td>
       <td>".$row['food']."</td><td>".$row['qty']."</td><td>".$row['date']."</td><td>".$row['address']."</td><td>".$row['pin']."</td>";
   }
   mysqli_close($db);
    echo($name);
    
    ?>
