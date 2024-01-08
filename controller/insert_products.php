<?php
include('../model/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];    
    $description=$_POST['description'];    
    $product_keywords=$_POST['product_keywords'];    
    $product_category=$_POST['product_category'];    
    $product_brands=$_POST['product_brands'];    
    $product_price=$_POST['product_price']; 
    $product_status='true'; 

    
    //access images
    $product_image1=$_FILES['product_image1']['name'];     
    $product_image2=$_FILES['product_image2']['name'];     
    $product_image3=$_FILES['product_image3']['name'];     

    //acces image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //check empty condition
    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' 
    or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('please fill all the fields')</script>";
        exit();
    }
        else{
             move_uploaded_file($temp_image1, "./product_images/$product_image1");
             move_uploaded_file($temp_image2, "./product_images/$product_image2");
             move_uploaded_file($temp_image3, "./product_images/$product_image3 ");

        //insert query
        $insert_products="insert into `products` (product_title,description,product_keywords,
        category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
        values ('$product_title','$description','$product_keywords','$product_category',
        '$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('The product has inserted successfully')</script>";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-------------------bootstrap CSS link--------------------->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-------------------font awesome link---------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    
    <!----------------------------------CSS file-------------------- -->
    <link rel="stylesheet" href="../style1.css">
</head>



                             <!-- FORM BODY -->
<body class="body">
    <div class="container product-form">
        <h1 class="text-center">Insert Products</h1>



                             <!-----Form---->
        <form action="" method="post" enctype="multipart/form-data">

                             <!-- title -->
            <div class="">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

                              <!-- description -->
            <div class="">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

                              <!-- keywords -->
            <div class="">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>


                             <!-- categories -->
            <div class="">
                <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="" class="form-select form-control">
                    <option value="">Select a Category  </option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_select = mysqli_query($con,$select_query);
                    $number = mysqli_num_rows($result_select);
                    while($row=mysqli_fetch_assoc($result_select)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>


                             <!-- brands -->
            <div class="">
                <label for="product_brands" class="form-label">Product Brand</label>
                <select name="product_brands" id="" class="form-select form-control">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "Select * from `brands`";
                    $result_select = mysqli_query($con,$select_query);
                    $number = mysqli_num_rows($result_select);
                    while($row=mysqli_fetch_assoc($result_select)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>


                             <!-- Image 1 -->
            <div class="">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
                             <!-- Image 2 -->
            <div class="">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
                             <!-- Image 3 -->
            <div class="">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>


                               <!-- price -->
            <div class="">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>


                                  <!-- insert button -->
            <div class="">
                <input type="submit" name="insert_product" class="insert-btn" value="Insert Products">
            </div>
        </form>
    </div>
    
</body>
</html>