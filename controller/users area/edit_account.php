<?php
    if(isset($_GET['edit_account'])){
        $user_session_name = $_SESSION['username'];
        $select_query = "Select * from `user_table` WHERE username='$user_session_name'";
        $result_query = mysqli_query($con, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_phone = $row_fetch['user_phone'];
    }
    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"user_images/$user_image");
        // update query
        $update_data = "Update `user_table` set username='$username', user_email='$user_email',
        user_email='$user_email', user_image='$user_image', user_address='$user_address', user_phone='$user_phone' where 
        user_id=$update_id";
        $result_query_update = mysqli_query($con, $update_data);
        if($result_query_update){
            echo "<script>alert('Data has been updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<style>
    form{
        background-color: rgba(165, 135, 135, 0.687);
        padding: 12px;
    }
    .edit_img{
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>
<body>
    <h2 class="text-center text-black fw-bold bg-info">Edit Account</h2>

    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_phone ?>" name="user_phone">
        </div>
        <input type="submit" value="Update" class="bg-warning py-2 px-3 border-0"  name="user_update">
    </form>

</body>
</html>