<?php

    $active='Home';
    include("includes/header.php");

?>


                                                       <!-------IMAGE SLIDER------->


   <div class="container" id="slider">
       
       <div class="col-md-12">
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel">
               
               <ol class="carousel-indicators">
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol>
               
               <div class="carousel-inner">
                   
                   <?php

                        $get_slides = "select * from slider LIMIT 0,1";

                        $run_slider = mysqli_query($con, $get_slides);


                        while ($row_slides = mysqli_fetch_array($run_slider)) {
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "
                            
                                <div class='item active'>
                                <img class='img-responsive' src='admin_area/slides_images/$slide_image'>
                                </div>

                            ";
                        }

                        $get_slides = "select * from slider LIMIT 1,3";

                        $run_slider = mysqli_query($con, $get_slides);


                        while ($row_slides = mysqli_fetch_array($run_slider)) {
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "
                            
                                <div class='item'>
                                <img class='img-responsive'src='admin_area/slides_images/$slide_image'>
                                </div>

                            ";
                        }

                    ?>
                   
               </div>
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a>
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a>
               
           </div>
           
       </div>
       
   </div>
   

                            <!-----------------------------------------PRODUCT LIST--------------------------------------------------------->
                        
    
    <div id="hot">
    
        <div class="box">
        
            <div class="container">
            
                <div class="col-md-12">
                
                    <h2>                 
                        Our Lastest product
                    </h2>
                
                </div>
            
            </div>
        
        </div>

    
    </div>


    <div id="content" class="container">

        <div class="row">

            <?php

              getPro();

            ?>

        </div>

    </div>

    <?php

        include("includes/footer.php");

    ?>

    <a id="button"></a>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/to_top_btn.js"></script>
    

</html>
