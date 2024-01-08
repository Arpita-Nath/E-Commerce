<?php
include('../model/connect.php');
include('../controller/functions/common_function.php');
session_start();
?>
<!DOCTYPE
html>
<html lang="en">
    <head>
        <title>E-Commerce-Cart Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!-------------------bootstrap CSS link--------------------->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-------------------font awesome link---------------------->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!----------------------------------CSS file-------------------- -->
        <link rel="stylesheet" href="../style1.css">
        <style>
            .cart_img{
                width: 88px;
                height: 88px;
                object-fit: contain;
            }
            .cart-btn{
                 margin: 1.6em 0;
                 font-size: 1.2em;
                 font-weight: bold;
                 color: rgb(18, 1, 25);
                 background-color: rgba(6, 189, 222, 0.784);
                 border: 2px solid rgba(106, 2, 106, 0.36);
                 border-radius: 9px;
                 outline: none;
                 cursor: pointer;
                 transition: .6s;
            }
            .row .cart-btn:focus{
                color: rgba(5, 41, 133, 0.797);
                border: 2px solid rgba(106, 2, 106, 0.999);
                box-shadow: 0 0 0 1px rgb(224, 176, 246);
                animation: anim-shadow .3s forwards;
            }
            @keyframes anim-shadow{
                100%
                {
                    box-shadow: 0 0 70px 7px;
                }
            }
        </style>
    </head>
    <body class="body">
        <!------------------navbar--------------------------->
        <div class="container-fluid p-0">
            <!----------------first segment---------------------->
            <nav style="background-color:rgb(14,64,87);" class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <img src=".\images\logo.jfif" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-lg-0">
                        <li class="nav-item nbar">
                            <a class="nav-link nav active text-white" aria-current="page" href="index.php"><h5>Home</h5></a>
                        </li>
                        <li class="nav-item nbar">   
                            <a class="nav-link nav" href="display_all.php"><h5>Products</h6></a>
                        </li>
                        <li class="nav-item nbar">
                        <a class="nav-link nav" href=".././controller/users area/user_registration.php"><h5>Register</h6></a>
                        </li>   
                        <li class="nav-item nbar">
                            <a class="nav-link nav" href="#"><h5>Contact</h6></a>
                        </li>   
                        <li class="nav-item nbar">
                            <a class="nav-link nav" href="cart.php"><h5><i class="fa-solid fa-cart-shopping"></i><<sup><?php total_cart_item();?></sup></h5></a>
                        </li>   
                          
                    </ul>
                   
                    </div>
                </div>
            </nav>

            <!-- calling cart function -->
            <?php
                cart();
                
            ?>

            <!-------------second segment------------>
            <nav style="background-color:rgb(106,78,120);" class="navbar navbar-expand-lg navbar-dark text-dark">
                <ul class="navbar-nav me-auto">
                    
                    <?php
                        // welcome guest
                        if (!isset($_SESSION['username'])) {
                            echo"<li class='nav-item'>
                                    <h4><a class='nav-link pe-3 fs-5 log-bar text-white' href='#'> Welcome Guest </a>
                                </li>";
                        }
                        else{
                            echo "<li class='nav-item'>
                                    <h4><a class='nav-link pe-3 fs-5 log-bar text-white' href='#'> Welcome ".$_SESSION['username']." </a>
                                </li>";
                        }

                        // login/logout
                        if (!isset($_SESSION['username'])) {
                            echo"<li class='nav-item'>
                                    <a class='nav-link fs-5 log-bar text-white' href='../controller/users area/user_login.php'>Login</a>
                                </li>";
                        }
                        else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link fs-5 log-bar text-white' href='../controller/users area/logout.php'>Logout</a>
                                </li>";
                        }
                    ?>
                     <!-- <li class="nav-item">
                     <a class="nav-link fs-5 log-bar text-white" href="../controller/users area/user_login.php">Login</a>
                    </li> -->
                </ul>
            </nav>

            <!-----------third segment-------------------->
            <div class="store">
                <h3 class="text-center bg-warning">Shopping Cart</h3>
                <h5><p class="text-center"><i>Communication is the heart of E-Commerce community</i></p></h5>
            </div>  


            <!------------fourth segment--------------->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                        <table class="table table-bordered text-center">
                            
                            <tbody>
                                <!------php code to display dynamic data -->
                                <?php
                                    global $con;
                                    $get_ip_address = getIPAddress();
                                    $total_price = 0;
                                    $total_product_price = 0;   
                                    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                                    $result = mysqli_query($con,$cart_query);
                                    $result_count = mysqli_num_rows($result);

                                    if($result_count>0){
                                        echo "
                                        <thead>
                                            <tr>
                                                <th><b>Product Title</b></th>
                                                <th><b>Product Image</b></th>
                                                <th><b>Quantity</b></th>
                                                <th><b>Unit Price</b></th>
                                                <th><b>Total Price</b></th>
                                                <th><b>Remove</b></th>
                                                <th colspan='2'><b>Operations</b></th>
                                            </tr>
                                        </thead>";
                                        
                                        while ($row = mysqli_fetch_array($result)) {
                                            $product_id = $row['product_id'];
                                            $cart = "Select * from `cart_details` where product_id='$product_id'";
                                            $select_products = "Select * from `products` where product_id='$product_id'";
                                            $result_products = mysqli_query($con, $select_products);

                                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                                $product_price = array($row_product_price['product_price']);
                                                $price_table = $row_product_price['product_price'];
                                                $product_title = $row_product_price['product_title'];
                                                $product_image1 = $row_product_price['product_image1'];
                                                $product_value = array_sum($product_price);
                                                $total_price += $product_value;

                                ?>
                                <tr>
                                    <td><b><?php echo $product_title; ?></b></td>
                                    <td><img src="../controller/product_images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
                                    <td><input type="text" name="quantity" class="form-input w-50"></td>
                                        <?php
                                            $get_ip_address = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantity = $_POST['quantity'];
                                                $total_product_price = getTotalPrice($price_table,$quantity);
                                                $quantity1 = getQuantity($cart);
                                                $update_cart = "Update `cart_details` set  quantity=$quantity where ip_address='$get_ip_address'";
                                                $result_productsQuantity = mysqli_query($con, $update_cart);
                                                $total_price = $total_price * $quantity;
                                                
                                            }
                                        ?>
                                    <td><b><?php echo $price_table; ?>/-</b></td>                                    
                                    <td><b><?php echo $total_price; ?>/-</b></td>                                    
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                    <td>
                                        <!-- <button class="bg-info px-3 py-2 mx-3 border-0 cart-btn"> Update </button> -->
                                        <input type="submit" value="Update Cart" class="px-3 py-2 mx-3 border-0 cart-btn" name="update_cart">
                                        <input type="submit" value="Remove Item" class="bg-secondary px-3 py-2 mx-3 border-0 cart-btn" name="remove_cart">
                                    </td>
                                </tr>

                                <?php
                                            }
                                        }
                                    }
                                    else{
                                        echo "<h2 class='text-center text-danger'>Your Cart is Empty!</h2>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <!-- subtotal -->
                        <div class="d-flex mb-5">
                            <?php
                                $get_ip_address = getIPAddress();   
                                $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                                $result = mysqli_query($con,$cart_query);
                                $result_count = mysqli_num_rows($result);
                                if($result_count>0){
                                    echo "
                                    <h4 class='px-5 bg-black text-danger'>Subtotal: <strong class='text-danger'> $total_price/-</strong></h4>
                                    <input type='submit' value='Continue Shopping' class='bg-success px-3 py-2 mx-3 border-0 cart-btn' name='continue_shopping'>
                                    <button class='bg-warning px-3 py-2 mx-3 border-0 cart-btn'><a href='../controller/users area/checkout.php' class='text-dark text-decoration-none'>Proceed To Checkout</a></button>
                                    ";
                                }
                                else{
                                echo "<input type='submit' value='Continue Shopping' class='bg-success px-3 py-2 mx-3 border-0 cart-btn' name='continue_shopping'>";
                                }

                                if(isset($_POST['continue_shopping'])){
                                    echo "<script>window.open('index.php','_self')</script>";
                                }
                            ?>
                            
                            
                        </div>
                    </form>
                </div>
            </div>

            <!-- -----function to remove cart item -->
            <?php
                function remove_cart_item(){
                    global $con;
                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeitem'] as $remove_id){
                            echo $remove_id;
                            $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                            $run_delete = mysqli_query($con,$delete_query);
                            if($run_delete){
                            echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }
                echo $remove_item = remove_cart_item();
            ?>

            <!-- -----------last segment-------------------
            <div class="bg-dark p-2 fs-5 text-center">
                <p class="text-light">All rights reserved @- Designed by Arpita Nath-2022</p>
            </div> -->

        </div>
        

    




        <!-----------------------bootstrap JS link---------------------->
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>





<!-- start 14 -->