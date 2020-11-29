<?php

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php', '_self')</script>";
    } else {
?>

<?php

    if(isset($_GET['edit_product'])){
        $edit_id = $_GET['edit_product'];

        $get_p = "select * from products where product_id='$edit_id'";

        $run_edit = mysqli_query($con, $get_p);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['product_id'];

        $p_title = $row_edit['product_title'];

        $p_cat_id = $row_edit['p_cat_id'];

        $p_image1 = $row_edit['product_img1'];

        $p_image2 = $row_edit['product_img2'];

        $p_image3 = $row_edit['product_img3'];

        $p_price = $row_edit['product_price'];

        $p_keywords = $row_edit['product_keywords'];

        $p_desc = $row_edit['product_desc'];

    }

        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

        $run_p_cat = mysqli_query($con, $get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert products</title>
    
</head>

<body>
    
    <div class="row">
    
        <div class="col-lg-12">
        
            <ol class="breadcrumb">
            
                <li class="active">
                
                    <i class="fa fa-dashboard"></i> Dashboard / Edit products
                
                </li>
            
            </ol>
        
        </div>
    
    </div>

    <div class="row">
    
        <div class="col-lg-12">
        
            <div class="panel panel-default">

                <div class="panel-heading">
                
                    <h3 class="panel-title">
                    
                        <i class="fa fa-money fa-fw"></i> Edit Product 
                    
                    </h3>
                
                </div>

                <div class="panel-body">
                
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    
                        <div class="form-group">
                        
                            <label class="col-md-3 control-label">Product Title</label>

                            <div class="col-md-6">
                            
                                <input value= "<?php echo $p_title; ?>" name="product_title" type="text" class="form-control" required>
                            
                            </div>

                        </div>

                        <div class="form-group">
                        
                            <label class="col-md-3 control-label">Product Categoy</label>

                            <div class="col-md-6">
                            
                                <select name="product_cat" class="form-control">
                                
                                    <option value= "<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?></option>

                                    <?php

                                        $get_p_cats = "select * from product_categories";
                                        $run_p_cats = mysqli_query($con, $get_p_cats);

                                        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                                            $p_cat_id = $row_p_cats['p_cat_id'];
                                            $p_cat_title = $row_p_cats['p_cat_title'];
                                                                                
                                            echo "<option value='$p_cat_id'> $p_cat_title </option>";
                                        } 
                                    ?>
                                
                                </select>
                            
                            </div>

                        </div>

                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> Product Image 1 </label> 
                      
                            <div class="col-md-6">
                          
                                <input name="product_img1" type="file" class="form-control" required>

                                <br>

                                <img width="70" src="product_images/<?php echo $p_image1; ?>">
                          
                            </div>
                       
                        </div>
                   
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> Product Image 2 </label> 
                      
                            <div class="col-md-6">
                          
                                <input name="product_img2" type="file" class="form-control" >

                                <br>

                                <img width="70" src="product_images/<?php echo $p_image2; ?>">
                          
                            </div>
                       
                        </div>
                   
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> Product Image 3 </label> 
                      
                            <div class="col-md-6">
                          
                                <input name="product_img3" type="file" class="form-control" >

                                <br>

                                <img width="70" src="product_images/<?php echo $p_image3; ?>">
                          
                            </div>
                       
                        </div>
                   
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"> Product Price </label> 
                      
                            <div class="col-md-6">
                          
                                <input value="<?php echo $p_price; ?>" name="product_price" type="text" class="form-control" required>
                          
                            </div>
                       
                        </div>
                   
                        <div class="form-group">
                        
                            <label class="col-md-3 control-label"> Product Keywords </label> 
                        
                            <div class="col-md-6">
                            
                                <input  value="<?php echo $p_keywords; ?>" name="product_keywords" type="text" class="form-control" required>
                            
                            </div>
                        
                        </div>
                   
                        <div class="form-group">
                        
                            <label class="col-md-3 control-label"> Product Desc </label> 
                        
                            <div class="col-md-6">
                            
                                <textarea name="product_desc" cols="19" rows="6" class="form-control">
                                        
                                <?php echo $p_desc; ?>

                                </textarea>
                            
                            </div>
                        
                        </div>
                    
                        <div class="form-group">
                       
                            <label class="col-md-3 control-label"></label> 
                      
                            <div class="col-md-6">
                          
                                <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
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
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    $update_product = "update products set p_cat_id='$product_cat', date=NOW(), product_title='$product_title', product_img1 ='$product_img1', product_img2 ='$product_img2',
    product_img3 ='$product_img3',product_price='$product_price', product_keywords='$product_keywords', product_desc='$product_desc' where product_id='$p_id'";

    $run_product = mysqli_query($con, $update_product);
    
    if($run_product){

        echo "<script>alert('Update Successfully')</script>";

        echo "<script>window.open('index.php?view_products', '_self')</script>";

    }

} 
?>

<?php
} ?>