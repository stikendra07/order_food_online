<?php
       session_start();
       $msg="";
       $role="";
       $status="";
       $flag = false;
       if(isset($_POST["submit"]))
       {
           $email=$_POST["id"];
           $pwd=$_POST["pwd"];
           $db=mysqli_connect("localhost","root","");
           mysqli_select_db($db,"food_odering_system");
           $result=mysqli_query($db,"select* from user_login_details where email='$email' and password='$pwd '");
           while($row=mysqli_fetch_array($result))
                 {
                     $flag=true;
                     $role=$row[2];
                     $status=$row[3];
                 }
                 mysqli_close($db);

                 if($flag==true)
                 {
                     if($status=="active")
                     {
                         if($role=="admin"){
                         $_SESSION["loginid"]=$email;
                         header("location:admin.php");
                         }
                         else
                         {
                         $_SESSION["loginid"]=$email;
                         header("location:user.php");
                         }
                        
                     }
                     else
                     header("location:loginpage.php?flag=0");
                 }
                 else
               header("location:loginpage.php?flag=1");
                }
  ?>