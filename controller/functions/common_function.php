<?php
//include('.././model/connect.php');

//getting limited products

function getProducts(){
    global $con;

    //condition to check isset or not

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $select_query = "select * from `products` order by rand() limit 0,6";
            $result_query = mysqli_query($con,$select_query);
            
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];

                echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='../controller/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text fw-bold text-danger'>Price: $product_price/-</p>
                                <a href='product_details.php?product_id=$product_id' class='btn1'> <span> View Details </span> </a>
                                <a href='index.php?add_to_cart=$product_id' class='btn2'> <span> Add to Cart <span> </a>
                            </div>
                        </div>
                    </div>";
            }
        }    
    }
}

function getTotalPrice($price,$quantity){
    $total_price = $price * $quantity;
    return $total_price;
}

function getQuantity($cart){
    global $con;
    $result = mysqli_query($con,$cart);
    $row = mysqli_fetch_array($result);
    $quantity = $row['quantity'];
    return $quantity;
}
//getting all products

function get_All_Products(){
    global $con;

    //condition to check isset or not

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $select_query = "select * from `products` order by rand()";
            $result_query = mysqli_query($con,$select_query);
            
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];

                echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='../controller/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text fw-bold text-danger'>Price: $product_price/-</p>
                                <a href='product_details.php?product_id=$product_id' class='btn1'> <span> View Details </span> </a>
                                <a href='index.php?add_to_cart=$product_id' class='btn2'> <span> Add to Cart <span> </a>
                            </div>
                        </div>
                    </div>";
            }
        }    
    }
}

//getting unique categories

function get_UniqueCategories(){
    global $con;

    //condition to check isset or not

    if(isset($_GET['category'])){

        $category_id = $_GET['category'];
    
        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($con,$select_query);

        $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo"
                    <h2 class='text-center text-danger'>  No stock for this Category </h2>
                ";
                
            }
        
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['description'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../controller/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text fw-bold text-danger'>Price: $product_price/-</p>
                            <a href='product_details.php?product_id=$product_id' class='btn1'> <span> View Details </span> </a>
                            <a href='index.php?add_to_cart=$product_id' class='btn2'> <span> Add to Cart <span> </a>
                        </div>
                    </div>
                </div>";
        }
    }        
}

//getting brands
function getBrands(){
    global $con;
    $select_brands = "Select * from `brands`";
    $result_brands = mysqli_query($con,$select_brands);
    while($row_data = mysqli_fetch_assoc($result_brands)){
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item text-effect'>
        <a href='index.php?brand=$brand_id' class='nav-link'> $brand_title </a>
    </li>";
    }
}

//getting unique brands

function get_UniqueBrands(){
    global $con;

    //condition to check isset or not

    if(isset($_GET['brand'])){

        $brand_id = $_GET['brand'];
    
        $select_query = "select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con,$select_query);

        $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo"<h2 class='text-center text-danger'>This Brand is not available for service </h2>";
            }
        
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['description'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../controller/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text fw-bold text-danger'>Price: $product_price/-</p>
                            <a href='product_details.php?product_id=$product_id' class='btn1'> <span> View Details </span> </a>
                            <a href='index.php?add_to_cart=$product_id' class='btn2'> <span> Add to Cart <span> </a>
                        </div>
                    </div>
                </div>";
        }
    }        
}

//getting categories
function getCategories(){
    global $con;
    $select_category = "Select * from `categories`";
    $result_category = mysqli_query($con,$select_category);
    while($row_data = mysqli_fetch_assoc($result_category)){
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item text-effect'>
        <a href='index.php?category=$category_id' class='nav-link'> $category_title </a>
    </li>";
    }
}






//get searched products

function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){

        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords like '%$search_data_value%' ";
        $result_query = mysqli_query($con,$search_query);
        $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo"
                    <h2 class='text-center text-danger'>  No Results Found! </h2>
                ";
                
            }
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];

                echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../controller/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text fw-bold text-danger'>Price: $product_price/-</p>
                            <a href='product_details.php?product_id=$product_id' class='btn1'> <span> View Details </span> </a>
                            <a href='index.php?add_to_cart=$product_id' class='btn2'> <span> Add to Cart <span> </a>
                        </div>
                    </div>
                </div>";
            }
    }    
}
    
//view more data
function view_Details(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                $product_id = $_GET['product_id'];
                $select_query = "select * from `products` where product_id=$product_id";
                $result_query = mysqli_query($con,$select_query);
                
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['description'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];

                    echo "
                        <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='../controller/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text fw-bold text-danger'>Price: $product_price/-</p>
                                    <a href='index.php' class='btn1'> <span> Go Home </span> </a>
                                    <a href='index.php?add_to_cart=$product_id' class='btn2'> <span> Add to Cart <span> </a>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h3 class='text-center text-info mb-5'>Related Products</h3>
                                </div>
                                <div class='col-md-6'>
                                    <img src='../controller/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                </div>
                                <div class='col-md-6'>
                                    <img src='../controller/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }    
        }
    }
}

//get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $quantity = 1 ;
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_address' and product_id=$get_product_id";
        $result_query = mysqli_query($con,$select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present in your cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";    
            
        }
        else{
            $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id,'$get_ip_address',$quantity)";
            $result_query = mysqli_query($con,$insert_query);
            echo "<script>alert('This item is added to your cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";  
        }
    }
}


//function to get total items number present in the cart

function total_cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
        $result_query = mysqli_query($con,$select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }    
    else{
        global $con;
        $get_ip_address = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
        $result_query = mysqli_query($con,$select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// function for showing total price  
function cart_total_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
    $result = mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $select_products = "Select * from `products` where product_id='$product_id'";
        $result_products = mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['product_price']);
            $product_value = array_sum($product_price);
            $total_price += $product_value;
        }
    }
    echo $total_price;

}

// get users order detail
function get_users_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "Select* from `user_table` WHERE username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<h2 class='text-center bg-warning m-1 p-2'>You have <span class='text-danger fw-bold'>$row_count</span> pending orders</h2>
                            <p><h3><a href='profile.php?my_orders' class='text-dark'>See order Details</a></h3></p>";
                    }
                    else{
                        echo "<h2 class='text-center bg-warning m-1 p-2'>You have <span class='text-danger fw-bold'> 0 </span> pending orders</h2>
                            <p><h3><a href='../../view/index.php' class='text-dark'>Explore Products</a></h3></p>";
                    }

                }
            }
        }
    }
}


?>


