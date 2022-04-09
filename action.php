<?php
if (isset($_POST["submit"])) {
    $username = $_POST["t1"];
    $dob = $_POST["t2"];
    $password = $_POST["t3"];
    $email = $_POST["t4"];
    $contact = $_POST["t5"];

    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, "food_odering_system");
    mysqli_query($db, "insert into registration_detail values('$username','$dob','$password','$email','$contact')");
    mysqli_query($db, "insert into user_login_details values('$username','$password')");
    $rem = mysqli_affected_rows($db);
    if ($rem) {
        echo "your form submitted successfully";
        header("location:homepage.html");
    }
    mysqli_close($db);
}
?>
<html>

<head>
   
</head>

</html>