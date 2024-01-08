<?php
 include('../../model/connect.php');
 include('../functions/common_function.php');
session_start();
?>

<style>
    body{
        overflow-x: hidden;
    }
    .profile_image{
    width: 90%;
    margin: auto;
    display: block;
    /* height:  %; */
    object-fit: contain;
    } 
     

</style>
<!DOCTYPE
html>
<html lang="en">
    <head>
        <title>E-Commerce Website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!-------------------bootstrap CSS link--------------------->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-------------------font awesome link---------------------->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!----------------------------------CSS file-------------------- -->
        <link rel="stylesheet" href="../../style1.css">
    </head>
    <body style="background: url('../product_images/profile.jpg');">
        <!------------------navbar--------------------------->
        <div class="container-fluid p-0">
            <!----------------first segment---------------------->
            <nav style="background-color:rgb(14,64,87);" class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <img src="../product_images1/logo.jfif" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-lg-0">
                        <li class="nav-item nbar">
                            <a class="nav-link nav active text-white" aria-current="page" href="C:\xampp\htdocs\E-commerce management\view\index.php"><h5>Home</h5></a>
                        </li>
                        <li class="nav-item nbar">   
                            <a class="nav-link nav" href="../../view/display_all.php"><h5>Products</h6></a>
                        </li>
                        <li class="nav-item nbar">
                            <a class="nav-link nav" href="profile.php"><h5>My Account</h6></a>
                        </li>   
                        <li class="nav-item nbar">
                            <a class="nav-link nav" href="#"><h5>Contact</h6></a>
                        </li>   
                        <li class="nav-item nbar">
                            <a class="nav-link nav" href="../../view/cart.php"><h5><i class="fa-solid fa-cart-shopping"></i><<sup><?php total_cart_item();?></sup></h5></a>
                        </li>   
                        <li class="nav-item nbar">
                            <a class="nav-link nav" href="#"><h5>Total Price: <?php cart_total_price();?>/-</h6></a>
                        </li>   
                    </ul>
                    <form class="d-flex" action="../../view/search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
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
                    <!-- <li class="nav-item">
                        <h4><a class="nav-link pe-3 fs-5 log-bar text-white" href="#"> Welcome Guest </a>
                    </li>  -->
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
                                    <a class='nav-link fs-5 log-bar text-white' href='user_login.php'>Login</a>
                                </li>";
                        }
                        else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link fs-5 log-bar text-white' href='../controller/users area/logout.php'>Logout</a>
                                </li>";
                        }
                    ?>
                    
                </ul>
            </nav>

            <!-----------third segment-------------------->
            <div class="store">
                <h3 class="text-center">E-Commerce Store</h3>
                <h5><p class="text-center"><i>Communication is the heart of E-Commerce community</i></p></h5>
            </div> 
            
            <!-- fourth segment -->

            <div class="row">
                <div class="col-md-2 ">
                    <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                        <li class="nav-item bg-info">   
                            <a class="nav-link text-light " href="#"><h3>Your Profile</h3></a>
                        </li>
                        <?php
                            $username = $_SESSION['username'];
                            $user_image = "Select * from `user_table` WHERE username='$username'";
                            $result_image = mysqli_query($con,$user_image);
                            $row_image = mysqli_fetch_array($result_image);
                            $user_image = $row_image['user_image'];
                            echo "<li class='nav-item bg-info'>   
                                    <img src='./user_images/$user_image' alt='' class='profile_image'>
                                 </li>";
                        ?>
                        
                        <li class="nav-item">   
                            <a class="nav-link text-light " href="profile.php"><h5>Pending Orders</h5></a>
                        </li>
                        <li class="nav-item">   
                            <a class="nav-link text-light " href="profile.php?edit_account"><h5>Edit Account</h5></a>
                        </li>
                        <li class="nav-item">   
                            <a class="nav-link text-light " href="profile.php?my_orders"><h5>My Orders</h5></a>
                        </li>
                        <li class="nav-item">   
                            <a class="nav-link text-light " href="profile.php?delete_account"><h5>Delete Account</h5></a>
                        </li>
                        <li class="nav-item">   
                            <a class="nav-link text-light " href="logout.php"><h5>Logout</h5></a>
                        </li>

                        
                    </ul>
                    
                    
                </div>
                <div class="col-md-10">
                    <?php
                        get_users_order_details();
                        if(isset($_GET['edit_account'])){
                            include('edit_account.php');
                        }
                        if(isset($_GET['my_orders'])){
                            include('user_orders.php');
                        }
                        if(isset($_GET['delete_account'])){
                            include('delete_account.php');
                        }
                    ?>
                </div>
                
            </div>





            <!-------------last segment--------------------->
            <div class="bg-dark p-2 fs-5 text-center">
                <p class="text-light">All rights reserved @- Designed by Arpita Nath-2022</p>
            </div>



        </div>



    




    <!-----------------------bootstrap JS link---------------------->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>





<!-- start 14 -->