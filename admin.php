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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="userpage.css">
    <link rel="stylesheet" href="admin_css.css">
    <script src="https://kit.fontawesome.com/7ac2bd24b6.js" crossorigin="anonymous"></script>


    <title>user/page</title>



</head>

<body>

<div class="row"> 
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="user-panel">
                <h2 class="text-panel">
                    <a href="#" class="user-icon"><i class="fa-solid fa-user-astronaut fa-2x"></i></a><br>
                    <?php echo "Welcome <br> ".$username ?>
                </h2>
                <table class=table>
                    <ul class="panel-table">
                        <li class="panel-line" id="home">home</li>
                        <li class="panel-line" id="ChangePwd">change password</li>
                        <li class="panel-line">add menu</li>
                        <li class="panel-line">setting</li>
                        <li class="panel-line" onclick="logout()">Logout</li>
                       
                    </ul>
                </table>
            </div>
        </div>
            



        <div class="crud">
            <div class="col-lg-12 col-md-8 col-sm-12" >
                <div class="container">
              
                <table>
                    <thead>
                        <tr>
                            <th classs="sno">sno</th>
                            <th>client name</th>
                            <th>contact</th>
                            <th>ordered food</th>
                            <th>quantity</th>
                            <th>date</th>
                            <th class="con">address</th>
                            <th class="con">pincode</th>
                            <th colspan="3">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        
          <?php
                   
               $db=mysqli_connect("localhost","root","");
               mysqli_select_db($db,'food_odering_system');
               $result=mysqli_query($db, " select * from order_details");
            
               $num = mysqli_num_rows($result);
               if($num > 0){
            
            while($row=mysqli_fetch_array($result))
        {
                ?>
                    <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo $row['client_id']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['food']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['address']; ?></td>    
                    <td><?php echo $row['pin']; ?></td>    
                    <td><a href="#" data-toggle="tooltip" data-placement="top" title="view">
                    <i class="fa-regular fa-eye eye"></i></a></td>                            
                    <td><a href="update.php" data-toggle="tooltip" data-placement="bottom" title="UPDATE">
                        <i class="fa-solid fa-pen-to-square "></i></a></td>
                    <td><a href="delete.php" data-toggle="tooltip" data-placement="right" title="DELETE">
                        <i class="fa-solid fa-trash-can "></i></a></td>
                    </tr>
                      <?php
            }  
        }
        ?>
                    </tbody>
                         </table>
               </div>
           </div>
           
       </div>
       

    <!-------Change Password---------->
    <div class="change-password hidden">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <form style="padding-top:50px" ; method="post" action="chngePwd_code.php">

                    <h2>Change Password.. </h2>
                    <div class="form-group ">
                        <label for="formGroupExampleInput"> Old Password</label>
                        <input type="text" class="form-control" name="opwd">
                    </div>
                    <div class="form-group ">
                        <label for="formGroupExampleInput"> New Password</label>
                        <input type="password" class="form-control" name="npwd">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2"> Confirm Password</label>
                        <input type="password" class="form-control" name="cpwd">
                    </div>
                    <div >
                        <button class="btn upload-button" name="submit">Update</button>
                        <span> <a href="admin.php">Reset</a></span>
                    </div>
                </form>
                 </div>
    </div>
    <div class="add-menu hidden">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <button class="btn">add category</button>
            <button class="btn">user feedback</button>
            <button class="btn">add category</button>
            <form  action="" methode="">
            <input type="file" class="select-image">
            <input type="text" class="select-name"placeholder="name">
            <input type="text" class="select-name"placeholder="price">
            <input type="text" class="select-name"placeholder="discount">
            <button class="btn upload-button">upload</button>
    </form>
        </div>
    </div>

<script>
    function logout(){
        window.location.replace("logout_page.php");
       }
     
    </script>
    </div>


    <?php  
            if(isset($_GET["flag"]))
            {
                $flag=$_GET["flag"];
                if($flag==0)
                echo "<script> alert('Password Upadation failed try again')  </script> " ; 
                else if($flag==1)
                echo "<script> alert('Your Password Updated successfully')  </script> " ; 
                else if($flag==2)
                echo "<script> alert('old password not matched')  </script> " ; 
                else if($flag==3)
                echo "<script> alert('both password not matched')  </script> " ; 
            }
            ?>



    <script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>