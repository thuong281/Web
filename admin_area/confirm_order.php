<?php

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php', '_self')</script>";
    } else {
?>

<?php

    if(isset($_GET['confirm_order'])){

        $confirm_order_id = $_GET['confirm_order'];

        $confirm_order = "update customer_orders set order_status='Confirmed' where order_id='$confirm_order_id'";

        $run_confirm = mysqli_query($con, $confirm_order);

        if($run_confirm){

            echo "<script>alert('Order Confirmed')</script>";

            echo "<script>window.open('index.php?view_orders','_self')</script>";

        }

    }

?>

<?php } ?>