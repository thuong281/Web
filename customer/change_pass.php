<h1 align="text-center"> Change Password</h1>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
    
        <label> Old Password:</label>

        <input type="password" name="old_pass" class="form-control" required>
    
    </div>

    <div class="form-group">
    
        <label>  New Password:</label>

        <input type="password" name="new_pass" class="form-control" required>
    
    </div>

    <div class="form-group">
    
        <label>  Confirm New Password:</label>

        <input type="password" name="new_pass_again" class="form-control" required>
    
    </div>

    <div class="text-center">
    
        <button name="submit" type="submit" class="btn btn-primary">
        
            <i class="fa fa-user-md"></i> Update now
        
        </button>
    
    </div>

</form>

<?php

    if (isset($_POST['submit'])) {
        $c_email = $_SESSION['customer_email'];

        $c_old_pass = $_POST['old_pass'];

        $c_new_pass = $_POST['new_pass'];

        $c_new_pass_again = $_POST['new_pass_again'];

        $c_new_pass_hash = password_hash($c_new_pass, PASSWORD_DEFAULT);

        $sel_old_pass = "select * from customers where customer_email='$c_email'";

        $run_c_old_pass = mysqli_query($con, $sel_old_pass);

        $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

        $customer_pass_hash = $check_c_old_pass['customer_pass'];

        if (!password_verify($c_old_pass,$customer_pass_hash)) {
            echo "<script>alert('Wrong password')</script>";

            exit();
        }
        if ($c_new_pass<>$c_new_pass_again) {
            echo "<script>alert('New password didn\'t match')</script>";

            exit();
        }

        $update_c_pass = "update customers set customer_pass='$c_new_pass_hash' where customer_email='$c_email'";

        $run_c_pass = mysqli_query($con, $update_c_pass);

        if ($run_c_pass) {
            echo"<script>alert('your password has been updated')</script>";

            echo"<script>window.open(my_account?my_orders.'_self')</script>";
        }
    }

?>