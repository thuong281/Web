<?php

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php', '_self')</script>";
    } else {
?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard">Dasboard / View Orders</i>
            
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            
                <h3 class="panel-title">
                
                    <i class="fa fa-tags"></i> View Orders
                
                </h3>
            
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                    
                        <thead>
                            <tr>
                                <th> Order No: </th>
                                <th> Customer Email: </th>
                                <th> Invoice No: </th>
                                <th> Product Name: </th>
                                <th> Product Qty: </th>
                                <th> Product Size: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th> Status: </th>
                                <th> Delete: </th>
                                <th> Confirm: </th>
                            </tr>
                        </thead>

                        <tbody>
                        
                            <?php

                                $i = 0;

                                $get_orders = "select * from customer_orders";

                                $run_orders = mysqli_query($con, $get_orders);

                                while($row_orders = mysqli_fetch_array($run_orders)){

                                    $order_id = $row_orders['order_id'];

                                    $c_id = $row_orders['customer_id'];

                                    $invoice_no = $row_orders['invoice_no'];

                                    $price_each = $row_orders['due_amount'];

                                    $product_id = $row_orders['product_id'];

                                    $order_date = $row_orders['order_date'];

                                    $qty = $row_orders['qty'];

                                    $size = $row_orders['size'];

                                    $order_status = $row_orders['order_status'];

                                    $get_products = "select * from products where product_id='$product_id'";

                                    $run_products = mysqli_query($con, $get_products);

                                    $row_products = mysqli_fetch_array($run_products);

                                    $product_title = $row_products['product_title'];

                                    $get_customer = "select * from customers where customer_id='$c_id '";

                                    $run_customer = mysqli_query($con, $get_customers);

                                    $row_customer = mysqli_fetch_array($run_customer);

                                    $customer_email = $row_customer['customer_email'];

                                    $i++;

                            ?>

                            <tr>
                                <td> <?php echo $i; ?></td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty * $price_each; ?> </td>
                                <?php
                                    if ($order_status=="Pending"){
                                        echo"<td style='color:red';> $order_status </td>";
                                    }else {
                                        echo"<td style='color:green';> $order_status </td>";
                                    }
                                
                                ?>

                                <td> 
                                    <a href="index.php?delete_order=<?php echo $order_id; ?>">

                                        <i class="fa fa-trash-o"></i> Delete

                                    </a> 
                                </td>
                                <td> 
                                    <a href="index.php?confirm_order=<?php echo $order_id; ?>">

                                        <i class="fa fa-check"></i> Confirm

                                    </a> 
                                </td>
                                
                            </tr>

                                <?php } ?>
                        
                        </tbody>
                    
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>



<?php } ?>