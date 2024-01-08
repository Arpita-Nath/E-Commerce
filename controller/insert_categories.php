<?php
include('../model/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];

    //select data from database
    $select_query = "Select * from `categories` where category_title = '$category_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
        echo"<script>alert('This category is already present in database')</script>";
    }
    else{
        $insert_query = "insert into `categories` (category_title) values ('$category_title')";
        $result = mysqli_query($con,$insert_query);
        if($result){
            echo"<script>alert('Category has been inserted successfully')</script>";
        }
    }

}
?>

<div class="ctg">
    <h2 class="text-center">Insert Categories</h2>
    <form action="" method="post" class="mb-2">
        <div class=" input-group w-90 mb-3">
            <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat_title" placeholder="Category Title " aria-label="Categories" aria-describedby="basic-addon1">
        </div>
        <div class="">
            <input type="submit" class="insert-ctg" name="insert_cat" value="Insert Categories">
        </div>
    </form>
</div>