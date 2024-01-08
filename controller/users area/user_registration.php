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
    <title>User - Registration</title>
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
<body class="registration-body">
    <div class="container-fluid my-3">
        
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-2 col-xl-6 registration-form">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2 class="text-center">Registrater</h2>
                    <!-- -----username field----- -->
                    <div class="form-outline inputBox">
                        <input type="text" id="user_username" class="border-2px"  autocomplete="off" required="required" name="user_username">
                        <span for="user_username" class="form-label">Username</span>
                        
                    </div>

                    <!-- -----email field----- -->
                    <div class="form-outline inputBox">
                        <input type="email" id="user_email" class=""  autocomplete="off" required="required" name="user_email">
                        <span for="user_email" class="form-label">Email</span>
                        
                    </div>

                    <!-- -----image field----- -->
                    <div class="form-outline inputBox">
                        <input type="file" id="user_image" class=""  required="required" name="user_image">
                        <span for="user_image" class="form-label">User Image</span>
                      
                    </div>

                    <!-- -----password field----- -->
                    <div class="form-outline inputBox">
                        <input type="password" id="user_password" class=""  autocomplete="off" required="required" name="user_password">
                        <span for="user_password" class="form-label">Password</span>
                        
                    </div>

                    <!-- -----confirm password field----- -->
                    <div class="form-outline inputBox">
                        <input type="password" id="confirm_user_password" class=""  autocomplete="off" required="required" name="confirm_user_password">
                        <span for="confirm_user_password" class="form-label"> Confirm Password</span>
                        
                    </div>

                    <!-- -----address field----- -->
                    <div class="form-outline inputBox">
                        <input type="text" id="user_address" class=""  autocomplete="off" required="required" name="user_address">
                        <span for="user_address" class="form-label">Address</span>
                        
                    </div>

                    <!-- -----contact field----- -->
                    <div class="form-outline inputBox">
                        <input type="text" id="user_contact" class=""  autocomplete="off" required="required" name="user_contact">
                        <span for="user_contact" class="form-label">Contact</span>
                        
                    </div>

                    <div class="">
                        <input type="submit" name="user_register" value="Register" class="bg-info px-4 py-2 border-0 insert-btn">
                        <p class="small  text-white">Already have an account? <a href="user_login.php" class="text-info p-2 fw-bold">Login</a></p>
                    </div>

                    
                </form>
            </div>

        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['user_register'])){
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $confirm_user_password = $_POST['confirm_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_ip = getIPAddress();

        $select_query = "Select * from `user_table` where username='$user_username' or user_email='$user_email'";
        $result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Username or email already exist')</script>";
        }
        elseif($user_password!=$confirm_user_password){
            echo "<script>alert('Password does not match! Please check your password')</script>";
        }

        else{
            //insert query
            move_uploaded_file($user_image_tmp, "user_images/$user_image");
            $insert_query = "Insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_phone)
            values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
            $sql_execute = mysqli_query($con, $insert_query);
            if($sql_execute){
                echo "<script>alert('Your registration is successful')</script>";
                echo "<script>window.open('../../view/index.php','_self')</script>";
            }
            else{
                die(mysqli_error($con));
            }
        }
        //select cart items
        $select_cart_items = "Select * from `cart_details` WHERE ip_address='$user_ip'";
        $result_cart = mysqli_query($con, $select_cart_items);
        $rows_count = mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
        else{
            echo "<script>window.open('../../index.php','_self')</script>";
        }

    }
?>