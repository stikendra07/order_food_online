<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="loginpage.css" />
  <link rel="icon" href="images/food07.jpg">
  <title>food online/login</title>
  <link rel="icon" href="tiku.jpg" />
</head>

<body>
  <div class="out_con">
    <div class="in_con">
      <div class="card">
        <h2>login</h2>
        <form action="user_login.php" method="post">
          <input type="text" class="input-box" name="id" placeholder="your email" />
          <input type="password" class="input-box" name="pwd" placeholder="pasword" required />
          <button type="submit" class="btn" name="submit">login</button>
          <span><input type="checkbox" />remeber me</span>
        </form>
        <a href="registration.html" class="button">new user</a>
        <a href="">forget password</a>
      </div>
    </div>
  </div>



  <?php  
            if(isset($_GET["flag"]))
            {
                $flag=$_GET["flag"];
                if($flag==0)
                echo "<script> alert('sorry!! you are blocked by admin..') </script>";
                else
                echo "<script> alert('invalid user id or password')  </script> " ; 
            }
     ?>


</body>

</html>