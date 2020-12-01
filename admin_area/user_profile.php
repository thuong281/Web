<?php

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php', '_self')</script>";
    } else {

?>

<?php
    
    if(isset($_GET['user_profile'])){

        $edit_user = $_GET['user_profile'];

        $get_user = "select * from admins where admin_id='$edit_user'";

        $run_user = mysqli_query($con, $get_user);

        $row_user = mysqli_fetch_array($run_user);

        $user_id = $row_user['admin_id'];

        $user_name = $row_user['admin_name'];

        $user_email = $row_user['admin_email'];

        $user_pass = $row_user['admin_pass'];

        $user_image = $row_user['admin_image'];

        $user_address = $row_user['admin_address'];

        $user_contact = $row_user['admin_contact'];

        $user_about = $row_user['admin_about'];

        $user_job = $row_user['admin_job'];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert User</title>
    
</head>

<body>
    
    <div class="row">
    
        <div class="col-lg-12">
        
            <ol class="breadcrumb">
            
                <li class="active">
                
                    <i class="fa fa-dashboard"></i> Dashboard / Edit User
                
                </li>
            
            </ol>
        
        </div>
    
    </div>

    <div class="row">
    
        <div class="col-lg-12">
        
            <div class="panel panel-default">

                <div class="panel-heading">
                
                    <h3 class="panel-title">
                    
                        <i class="fa fa-money fa-fw"></i> Edit User
                    
                    </h3>
                
                </div>

                <div class="panel-body">
                
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    
                        <div class="form-group">
                        
                            <label class="col-md-3 control-label">Username</label>

                            <div class="col-md-6">
                            
                                <input value="<?php echo $user_name; ?>" name="admin_name" type="text" class="form-control" required>
                            
                            </div>

                        </div>

                        <div class="form-group">
                        
                            <label class="col-md-3 control-label">E-mail</label>

                            <div class="col-md-6">

                                <input value="<?php echo $user_email; ?>" name="admin_email" type="text" class="form-control" required>
                            
                            </div>

                        </div>

                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> Password </label> 
                      
                            <div class="col-md-6">
                          
                                <input value="<?php echo $user_pass; ?>" name="admin_password" type="password" class="form-control" required>
                          
                            </div>
                       
                        </div>
                   
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> Address </label> 
                      
                            <div class="col-md-6">
                          
                                <input value="<?php echo $user_address; ?>" name="admin_address" type="text" class="form-control" required>
                          
                            </div>
                       
                        </div>
                   
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> Contact </label> 
                      
                            <div class="col-md-6">
                          
                                <input value="<?php echo $user_contact; ?>" name="admin_contact" type="text" class="form-control" required>
                          
                            </div>
                       
                        </div>

                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> job </label> 
                      
                            <div class="col-md-6">
                          
                                <input value="<?php echo $user_job; ?>"name="admin_job" type="text" class="form-control" required>
                          
                            </div>
                       
                        </div>

                        <div class="form-group">
                        
                            <label class="col-md-3 control-label"> Image </label> 
                        
                            <div class="col-md-6">
                            
                                <input type="file" name="admin_image" class="form-control" required>

                                <img width=20% src="admin_images/<?php echo $user_image; ?>" alt="" class="img-responsive">

                            </div>
                        
                        </div>
                   
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> About </label> 
                      
                            <div class="col-md-6">
                          
                                <textarea name="admin_about" rows="6"><?php echo $user_about; ?></textarea>
                          
                            </div>
                       
                        </div>
                              
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"></label> 
                      
                            <div class="col-md-6">
                          
                                <input name="update" value="Update User" type="submit" class="btn btn-primary form-control">
                          
                            </div>
                       
                        </div>
                    
                    </form>
                
                </div>
            
            </div>
        
        </div>
    
    </div>
    
</body>
</html>

<?php

if (isset($_POST['update'])) {
    $user_name = $_POST['admin_name'];
    $user_email = $_POST['admin_email'];
    $user_pass = $_POST['admin_password'];
    $user_address = $_POST['admin_address'];
    $user_contact = $_POST['admin_contact'];
    $user_job = $_POST['admin_job'];
    
    $user_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];

    $user_about = $_POST['admin_about'];
 
    move_uploaded_file($temp_admin_image, "admin_images/$user_image");

    $update_user = "update admins set admin_name='$user_name', admin_email='$user_email', admin_pass='$user_pass',
    admin_address='$user_address', admin_contact='$user_contact', admin_job='$user_job', admin_about='$user_about', admin_image='$user_image'";
    
    $run_user = mysqli_query($con, $update_user);
    
    if ($run_user) {
        echo "<script>alert('User has been updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
} ?>

<?php
} ?>