<center>

    <h1>My orders</h1>

    <p class="lead">Your orders on one place</p>

    <P class="text-muted">

        Reeeeeeeeeee eeeeeeeee eeeeeeeee eeeeeeeee eeeeeeeeee eeeeeeee eeeee

    </P>

</center>

<hr>

<div class="table-responsive">

    <table class="table table-bordered table-hover">

        <thead>

            <tr>

                <th> ON: </th>
                <th> Due Amount: </th>
                <th>Invoice No: </th>
                <th> Quantity: </th>
                <th> Size: </th>
                <th> Order Date: </th>
                <th>Status: </th>

            </tr>

        </thead>

        <tbody>

            <?php

                if(isset($_SESSION['customer_email'])){

                $customer_session = $_SESSION['customer_email'];

                $get_customer = "select * from customers where customer_email='$customer_session'";

                $run_customer = mysqli_query($con,$get_customer);

                $row_customer = mysqli_fetch_array($run_customer);
                
                $customer_id = $row_customer['customer_id'];

                $get_orders = "select * from customer_orders where customer_id='$customer_id'";

                $run_orders = mysqli_query($con,$get_orders);

                $i = 0;

                while($row_orders=mysqli_fetch_array($run_orders)){

                    $order_id = $row_orders['order_id'];

                    $due_amount = $row_orders['due_amount'];

                    $invoice_no = $row_orders['invoice_no'];

                    $qty = $row_orders['qty'];

                    $size = $row_orders['size'];

                    $order_date = substr($row_orders['order_date'],0,11);

                    $order_status = $row_orders['order_status'];

                    $i++;

                    if($order_status=='Pending'){

                        $order_status = 'Pending';

                    } else{

                        $order_status = 'Confirm';

                    }

            ?>

            <tr>

                <th> <?php echo $i; ?> </th>
                <td> <?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>

            </tr>

            <?php } } ?>

        </tbody>

    </table>

</div>