<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view products</title>
</head>
<style>
    .heading{
        background: rgba(207, 13, 181, 0.851);
    }
    .tbody{
        background: rgba(207, 13, 181, 0.351);
    }
    .product_image{
        width:100px;
        object-fit: contain;
    }

</style>
<body>
    <h2 class="text-center">All Products</h2>
    <table class="table table-bordered mt-5 text-center">
        <thead class="heading">
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

        <tbody class="tbody">

        <?php
            $get_products = "Select * from `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
        ?>
                <tr class='text-center'>
                    <td><?php echo $product_id; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img src='product_images/<?php echo $product_image1; ?>' class='product_image'></td>
                    <td><?php echo $product_price; ?>/-</td>
                    <td>
                    <?php
                    $get_count = "Select * from `orders_pending` where product_id=$product_id";
                    $result_count = mysqli_query($con, $get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;         
                    ?>
                    </td>
                    <td><?php echo $status; ?></td>

                    
                    <td><a href='admin.php?edit_products' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>

            <?php
            }
            ?>
            <!-- <tr class="text-center">
                <td>1</td>
                <td>mango</td>
                <td>image</td>
                <td>1</td>
                <td>0</td>
                <td>true</td>
                <td><a href="" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="" class="text-light"><i class="fa-solid fa-trash"></i></a></td>
            </tr> -->
            
        </tbody >

        
    </table>

    
</body>
</html>