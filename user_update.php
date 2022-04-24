<?php
     session_start(); 
     $id=$_SESSION["loginid"]; 
     $db=mysqli_connect("localhost", "root" , "" );
    mysqli_select_db($db, "food_odering_system" );
    $uname=mysqli_query($db, "select* from registration_detail where email='$id' " );
    $ram=mysqli_fetch_array($uname); 
    $email=$ram['email']; 



$msg="";
if(isset($_POST["update"]))
{
    $username=$_POST["uname"];
    $dob=$_POST["dobs"];
    $contact=$_POST["call"];

    $db=mysqli_connect("localhost","root","");
    mysqli_select_db($db,"food_odering_system");
    mysqli_query($db,"update registration_detail set user_name='$username',dob='$dob',contact='$contact' where email='$email'");
    $a=mysqli_affected_rows($db);
    // $msg= $a."record updated";
    if($a==1)
     header("location:user.php?flag=4");
     else{
          header("location:user.php?flag=5");
     }

}
?>
<script>
   
    </script>
