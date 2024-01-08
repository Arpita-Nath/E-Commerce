<?php
    include('../../model/connect.php');
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-------------------bootstrap CSS link--------------------->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-------------------font awesome link---------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!----------------------------------CSS file-------------------- -->
    <link rel="stylesheet" href="../../style1.css">
    <title>Payment Page</title>
</head>
<style>
    img{
        width: 90%;
        margin: auto;
        display: block;
    }
</style>

<body>
    <!-- access user id -->
    <?php
        $user_ip = getIPAddress();
        $get_user = "Select * from  `user_table` where user_ip='$user_ip'";
        $result = mysqli_query($con, $get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];


    
    ?>
    <div class="container">
        <h2 class="text-center text-warning"><u>Payment Options</u></h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <a href="https://bd.visa.com/pay-with-visa/click-to-pay-with-visa.html" target="blank"><img src="../product_images/visa.jpg"> </a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>