<?php
       $food_id=$_GET['food_id'];
        if (isset($_POST["submit"])){
             $qty=$_POST['qty'];
            //  echo $qty;
            //  echo $food_id;
        }
             
         
              if($food_id==1)
     {
        $item_id=$food_id;
        session_start(); 
        $_SESSION['uid']=$item_id;
        $_SESSION['f_id']=$qty;
        header("location:cart_code.php?");
    }
    else if($food_id==2)
    {
        $item_id=$food_id;
        session_start(); 
        $_SESSION['uid']=$item_id;
        $_SESSION['f_id']=$qty;
        header("location:cart_code.php");
    }
    else if($food_id==3)
    {
        $item_id=$food_id;
        session_start(); 
        $_SESSION['uid']=$item_id;
        $_SESSION['f_id']=$qty;
        header("location:cart_code.php");
    }
    else if($food_id==4)
    {
        $item_id=$food_id;
        session_start(); 
        $_SESSION['uid']=$item_id;
        $_SESSION['f_id']=$qty;
        header("location:cart_code.php");
    }
        
    ?>
    






     