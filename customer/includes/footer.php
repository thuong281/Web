<div id="footer">

    <div class="container">

        <div class="row">

            <div class="col-sm-6 col-md-3">

                <h4>Pages</h4>

                <ul>
                    <?php 
                        
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                </ul>

                <hr>

                <h4>User section</h4>

                <ul>
                    <li><a href="checkout.php">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>

            <div class="col-sm-6 col-md-3">
            
                <h4>Top Product Categories</h4>

                <ul>
                    <?php 
                        
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                </ul>

                <hr class="hidden-md hidden-lg ">

            </div>

            <div class="col-sm-6 col-md-3">

                <h4>Find Us:</h4>

                <p>
                
                    <strong>E-Store</strong>
                    <br/>Cibubur
                    <br/>Ciracas
                    <br/>0981-9888-20
                    <br/>thuongvip28117@gmail.com
                    <br/><strong>MR.Thuong</strong>
                
                </p>

                <a href="contact.php">Check our contact</a>

                <hr class="hidden-md hidden-lg ">

            </div>

            <div class="col-sm-6 col-md-3">
            
                <h4>Keep in touch</h4>

                    <p class="social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-envelope"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                        <a href="#" class="fa fa-instagram"></a>
                    </p>

                <hr>
            
            </div>

        </div>

    </div>

</div>
<div id="bottom">
</div>