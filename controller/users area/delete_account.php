<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-danger my-4 text-center">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" name="delete" value="Delete Account" class="form-control w-50 m-auto">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" name="dont_delete" value="Don't Delete Account" class="form-control w-50 m-auto">
        </div>
    </form>
    <?php
        $username_session = $_SESSION['username'];
        if(isset($_POST['delete'])){
            $delete_query = "Delete from `user_table` where username='$username_session'";
            $result = mysqli_query($con, $delete_query);
            if($result){
                session_destroy();
                echo "<script>alert('Account has been deleted successfully')</script>";
                echo "<script>window.open('../../view/index.php','_self')</script>";
            }
        }

        if(isset($_POST['dont_delete'])){
           echo "<script>window.open('profile.php','_self')</script>";
        }

    ?>
</body>
</html>