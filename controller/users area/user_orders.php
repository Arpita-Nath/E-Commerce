
<style>
    .heading{
        background-color: rgba(250, 221, 4, 0.895);
    }
    .table_heading{
        background-color: rgba(234, 212, 45, 0.653);
    }
    .tbody{
        background-color: rgba(52, 129, 1, 0.204);
        font-weight: 500
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "Select * from `user_table` where username='$username'";
    $result = mysqli_query($con,$get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    ?>
    <h3 class="text-center text-danger heading mt-5">All My Orders</h3>
    <table class="table table-bordered table_heading mt-3">
        <thead class="table_heading text-center">
            <tr>
                <th>SL no.</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="tbody text-center">
            <?php
            $number = 1;
            $get_order_details = "Select * from `user_orders` where user_id=$user_id";
            $result_orders = mysqli_query($con,$get_order_details);
            while($row_orders=mysqli_fetch_assoc($result_orders)){
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number = $row_orders['invoice_number'];
                $order_date = $row_orders['order_date'];
                $order_status = $row_orders['order_status'];
                if($order_status=='pending'){
                    $order_status = 'Incomplete';
                }
                else{
                    $order_status = 'Complete';
                }
                
                echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>";
            ?>
                        <?php
                        if($order_status=='Complete'){
                            echo "<td>Paid</td>";
                        }
                        else{
                            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-danger'>Confirm</a></td>
                            </tr>";
                        }
                    
                $number++;
            }

            
            ?>
            
        </tbody>
        
    </table>
</body>
</html>