<?php
    $active='Account';
    include("includes/header.php");

?>


    <div id="content">

        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Register</li>
                </ul>

            </div>

            <div class="col-md-3">

                <?php

                    include("includes/sidebar.php");

                ?>

            </div>

            <div class="col-md-9">
            
                <div class="box">
                
                    <div class="box-header">
                    
                        <center>

                            <h2>Register new account</h2>

                            <p class="text-muted">

                                Reeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeee

                            </p>
                        
                        </center>

                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                        
                            <div class="form-group">

                                <label>Your Name</label>

                                <input type="text" class="form-control" name="c_name" required>
                            
                            </div>

                            <div class="form-group">

                                <label>Your Email</label>

                                <input type="text" class="form-control" name="c_email" required>
                            
                            </div>

                            <div class="form-group">

                                <label>Your Password</label>

                                <input type="password" class="form-control" name="c_password" required>
                            
                            </div>

                            <div class="form-group">

                                <label>Your address</label>

                                <input type="text" class="form-control" name="c_address" required>
                            
                            </div>

                            <div class="form-group">

                                <label>Your Profile Picture</label>

                                <input type="file" class="form-control" name="c_image">
                            
                            </div>

                            <div class="form-group">

                                <label>Your Contact</label>

                                <input type="text" class="form-control" name="c_contact" required>
                            
                            </div>

                            </div>

                            <div class="text-center">
                            
                                <button type="submit" name="register" class="btn btn-primary">
                            
                                <i class="fa fa-user-md"></i>. Register

                                </button>

                            </div>
                        
                        </form>
                    
                    </div>
                
                </div>
            
            </div>
        
        </div>

    </div>


    <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


    </body>
</html>
<?php

    if(isset($_POST['register'])){

        $c_name =  $_POST['c_name'];

        $c_email =  $_POST['c_email'];

        $c_pass =  $_POST['c_password'];

        $c_pass_hash = password_hash($c_pass, PASSWORD_DEFAULT);

        $c_address =  $_POST['c_address'];
        
        $c_contact =  $_POST['c_contact'];

        $c_image =  $_FILES['c_image']['name'];

        $c_image_tmp =  $_FILES['c_image']['tmp_name'];

        $c_ip = getRealIpUser();

        $find_customer = "select * from customers where customer_email='$c_email'";

        $run_find_customer = mysqli_query($con, $find_customer);

        $if_exist = mysqli_num_rows($run_find_customer);

        if($if_exist > 0) {

            echo "<script>alert('Email existed, please use another email')</script>";

            exit();

        } else {

            move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

            $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_address,customer_image,customer_ip)
            values ('$c_name','$c_email','$c_pass_hash','$c_contact','$c_address','$c_image','$c_ip')";

            $run_customer = mysqli_query($con,$insert_customer);

            $sel_cart = "select * from cart where ip_add='$c_ip'";

            $run_cart = mysqli_query($con,$sel_cart);

            $check_cart = mysqli_num_rows($run_cart);

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('you have been registered successfully')</script>";

            echo "<script>window.open('index.php','_self')</script>";

        }

    }

?>