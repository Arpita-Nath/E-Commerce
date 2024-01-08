<?php
 include('.././model/connect.php');
 include('../controller/functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-------------------font awesome link---------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!----------------------------------CSS file-------------------- -->
    <link rel="stylesheet" href="../style1.css">
</head>

<body style="background-color:rgb(197, 202, 233);" class="body">
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first segment -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <img src="..\view\images\logo.jfif" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-dark fs-4"><h4>Welcome Guest</h4></a>
                        </li>
                    </ul>
            
                </nav>
            </div>
        </nav>


        <!-- secong segment -->
        <div class="bg-light">
            <h2 class="text-center p-2"><u>Manage Details</u></h2>
        </div>

        <!-- third segment -->
        <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
            <div class="p-2 pb-0">
                <a href=""><img src="..\view\images\admin.jpg" alt="" class="admin_image"></a>
                <p class="text-light text-center">Arpita</p>
            </div>

            <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
            <div class="button text-center my-button">
                <button class="my-3"><a href="insert_products.php" class="nav-link">Insert Products</a></button>
                <button class="my-3"><a href="admin.php?insert_category" class="nav-link">Insert Categories</a></button>
                <button class="my-3"><a href="admin.php?insert_brand" class="nav-link">Insert Brands</a></button>
                <button class="my-3"><a href="admin.php?view_products" class="nav-link">View Products</a></button>
                <button class="my-3"><a href="" class="nav-link">View Categories</a></button>
                <button class="my-3"><a href="" class="nav-link">View Brands</a></button>
                <button class="my-3"><a href="" class="nav-link">All Orders</a></button>
                <button class="my-3"><a href="" class="nav-link">All Payments</a></button>
                <button class="my-3"><a href="" class="nav-link">User List</a></button>
                <button class="my-3"><a href="" class="nav-link">Log Out</a></button>
                
            </div>
        </div>
    </div>

    <!-- fourth segment -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        ?>
    </div>




<!-- bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>