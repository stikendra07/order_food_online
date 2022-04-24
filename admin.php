<?php
   session_start();

    if(!isset($_SESSION['loginid']))
    {
    echo "you are logged out";
    header('location:index.html');

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
    <link rel="stylesheet" href="user_page_css.css">
    <link rel="stylesheet" href="admin_css.css">
    <link rel="icon" href="images/paytm.svg">
    <script src="https://kit.fontawesome.com/7ac2bd24b6.js" crossorigin="anonymous"></script>


    <title>admin/page</title>



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
                        <li class="panel-line active" data-target="1">home</li>
                        <li class="panel-line" data-target="2">change password</li>
                        <li class="panel-line"data-target="3">add menu</li>
                        <li class="panel-line" data-target="4">setting</li>
                        <li class="panel-line" onclick="logout()">Logout</li>
                       
                    </ul>
                </table>
            </div>
        </div>
            



        <div class="crud hidden para1">
            
     <div class="form-outline" style="margin-top:20px">
        <input type="text" id="getName" onkeyup="getname()"/><b> Search by name</b>
    </div>
               
            <div class="col-lg-12 col-md-8 col-sm-12" >
                <div class="container">     
              
                <table>
                    <thead>
                        <tr>
                            <th classs="sno">sno</th>
                            <th>client name</th>
                            <th>food name</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>discount</th>
                            <th>totalprice</th>
                            <th colspan="3">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        
          <?php
                
                $sno=1;   
               $db=mysqli_connect("localhost","root","");
               mysqli_select_db($db,'food_odering_system');
               $result=mysqli_query($db, " select * from order_childtb");
            
               $num = mysqli_num_rows($result);
               if($num > 0){
            
            while($row=mysqli_fetch_array($result))
        {
                ?>
                    <tr id="showname">
                    <td><?php echo $sno++ ?></td>
                    <td><?php echo $row['login_id']; ?></td>
                    <td><?php echo $row['food_name']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['dscnt']; ?></td>
                    <td>&#8377;<?php echo $row['total_price']; ?></td>  
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

     <script>
        function getname() {
        var code = document.getElementById("getName").value;
        var hmt = new XMLHttpRequest();
        hmt.open("GET", "getname.php?code=" + code, true);
        hmt.send();

        hmt.onreadystatechange = function () {
          if (hmt.readyState == 4 && hmt.status == 200) {
            document.getElementById("showname").value = hmt.responseText;
          
          }
        };
      }
           </script>
       </div>

    <!-----------------------Change Password Start----------------->
    <div class="change-password hidden para2">
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
    <!-----------------------Change Password Start----------------->

<!-- ------------Add Menu Start----------------- -->

       <div class="add-menu hidden para3">
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
<!-- ----------------------------Add Menu End--------------------------- -->
<script>
    function logout(){
        window.location.replace("logout_page.php");
       }
   
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  });

     
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

<!-- javaScripts cdn link -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="admin_js.js"></script>
</body>
</html>