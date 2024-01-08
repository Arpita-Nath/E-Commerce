<?php
    include('../../model/connect.php');
    include('../functions/common_function.php');
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login</title>
    <link href="css/style.css" rel="stylesheet">
    <!-------------------bootstrap CSS link--------------------->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-------------------font awesome link---------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!----------------------------------CSS file-------------------- -->
    <link rel="stylesheet" href="../../style1.css">
    <style>
        body{
            overflow: hidden;
        }
    </style>

</head>
<body class="login-body">
    <div class="container-fluid my-3">
        
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-2 col-xl-6 login-form">
                <form action="" method="post">
                    <h2 class="text-center">Login</h2>
                    <!-- -----username field----- -->
                    <div class="inputBox">
                        <input type="text" id="user_username" class=""  autocomplete="off" required="required" name="user_username">
                        <span for="user_username" class="form-label">Username</span>
                        
                    </div>

                    <!-- -----password field----- -->
                    <div class=" inputBox">
                        <input type="password" id="user_password" class=""  autocomplete="off" required="required" name="user_password">
                        <span for="user_password" class="form-label">Password</span>
                        
                    </div>

                    <div class="">
                        <input type="submit" name="user_login" value="Login" class="bg-warning px-4 py-2 border-0 insert-btn">
                        <p class="small  text-white">Don't have an account? <a href="user_registration.php" class="text-warning p-2 fw-bold">Register</a></p>
                    </div>

                    
                </form>
            </div>

        </div>
    </div>
</body>
</html>\

<?php
    if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "Select * from `user_table` where username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // cart item
    $select_query_cart = "Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $rows_count_cart = mysqli_num_rows($select_cart);





    if($rows_count>0){
        $_SESSION['username'] = $user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            if($rows_count==1 and $rows_count_cart==0){
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Succesfull')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }
            else{
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Succesfull')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid username or password')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid username or password!')</script>";
    }

    }
?>