<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    th{
        padding:0 10px;
    }
    .prt{
       
     text-align: left;
    
    }
</style>

<body>
    <table>
        <thead>
                        <?php
                                           
                                       $db=mysqli_connect("localhost","root","");
                                       mysqli_select_db($db,'food_odering_system');
                                       $result=mysqli_query($db, " select * from order_details");
                                      $row=mysqli_fetch_array($result);
                                              
                                             
        
                                            ?>
                                
            <tr>
                <th>abc</th>
                <th class="prt"><?php echo $row['sno']; ?></th>
            </tr>
            <tr>
                <th>abc</th>
                <th class="prt"><?php echo $row['pin']; ?></th>
            </tr>
            <tr>
                <th>abc</th>
                <th class="prt"><?php echo $row['food']; ?></th>
            </tr>
            <tr>
                <th>abc</th>
                <th class="prt"><?php echo $row['qty']; ?></th>
            </tr>
            <tr>
                <th>abc</th>
                <th class="prt"><?php echo $row['client_id']; ?></th>
            </tr>
            <tr>
                <th>abc</th>
                <th class="prt"><?php echo $row['contact']; ?></th>
            </tr>
            <tr>
                <th>abc</th>
                <th class="prt"><?php echo $row['date']; ?></th>
            </tr>
            
        </thead>
        <tbody>

        </tbody>
    </table>

</body>

</html>