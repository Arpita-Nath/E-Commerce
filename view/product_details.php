<?php
include('../model/connect.php');
include('../controller/functions/common_function.php')
?>
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
        <link rel="stylesheet" href="../style1.css">
    </head>
    <body style="background-color:rgb(251, 233, 231);">
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
                        <li class="nav-item nbar">
                            <a class="nav-link nav" href="#"><h5>Total Price: <?php cart_total_price();?>/-</h6></a>
                        </li>   
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                    </div>
                </div>
            </nav>

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
                </ul>
            </nav>

            <!-----------third segment-------------------->
            <div class="store">
                <h3 class="text-center">E-Commerce Store</h3>
                <h5><p class="text-center"><i>No more bargain, the quality will not let you to.</i></p></h5>
            </div>  


            <!------------fourth segment--------------->
            <div class="row px-3">
                <div class="col-md-10">
                    <!-------------products------------->
                    <div class="row">
                        

                        
                    <!-- Fetching products from database -->
                    <?php
                        view_Details();
                        get_UniqueCategories();
                        get_UniqueBrands();
                    ?>
                        <!-- <div class="col-md-4 mb-2">
                            <div class="card">
                                <img src=".\images\watch.jfif" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Smart Watch</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-info">View More</a>
                                    <a href="#" class="btn btn-warning">Add to Cart</a>
                                </div>
                            </div>
                        </div>     -->
                    </div>
                </div>


                <!--------------side navbar------------>
                <div class="col-md-2 p-0" style="background-color:rgb(251,254,204);">


                    <!--------brands to be displayed------------>
                    <ul class="navbar-nav me-auto text-center">
                        <li style="background-color:rgb(14,64,87);" class="nav-item">
                            <a href="#" class="nav-link nav"><h4>Delivery Brands</h4></a>
                        </li>
                        <?php
                            getBrands();    
                        ?>
                    </ul>


                    <!--------categories to be displayed------------>
                    <ul class="navbar-nav me-auto text-center">
                        <li style="background-color:rgb(14,64,87);" class="nav-item">
                            <a href="#" class="nav-link nav "><h4>Categories</h4></a>
                        </li>

                        <?php
                            getCategories();
                        ?>
                    </ul>
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