<?php
     session_start();
     $id=$_SESSION["loginid"];
     $opwd=$_POST["opwd"];
     $npwd=$_POST["npwd"];
     $cpwd=$_POST["cpwd"];
       


     $dbpwd="";
      $db=mysqli_connect("localhost","root","");
      mysqli_select_db($db,"food_odering_system");
     $result=mysqli_query($db,"select password from user_login_details where email='$id'");
     while($row=mysqli_fetch_array($result))
     {
         $dbpwd=$row['password'];

     }
     mysqli_close($db);
       if($dbpwd==$opwd)
       {
           if($npwd==$cpwd)
           {
               $db=mysqli_connect("localhost","root","");
               mysqli_select_db($db,"food_odering_system");
               mysqli_query($db,"update user_login_details set password='$npwd' where email='$id'");
               $a=mysqli_affected_rows($db);
               mysqli_close($db);
               if($a==0)
               header("location:admin.php?flag=0");
               else
               header("location:admin.php?flag=1");
           }
           else
           {
               header("location:admin.php?flag=3");

           }
       }
       else
       {
           header("location:admin.php?flag=2");
       }
   ?>