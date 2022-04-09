<?php
       session_start();
       $msg="";
       $role="";
       $status="";
       $flag = false;
       if(isset($_POST["submit"]))
       {
           $id=$_POST["id"];
           $pwd=$_POST["pwd"];
           $db=mysqli_connect("localhost","root","");
           mysqli_select_db($db,"food_odering_system");
           $result=mysqli_query($db,"select user_name, status from user_login_details where user_name='$id' and password='$pwd '");
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
                         if($role=="admin")
                         header("location:user.php");
                         else
                         {
                         $_SESSION["loginid"]=$id;
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