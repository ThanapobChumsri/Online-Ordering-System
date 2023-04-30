<?php include('header.php');?>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
    <form action="editCart.php" method="POST">
        <h1 class="page-header text-center">YOUR CART PRODUCTS</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                        $no = 1;
                        $total = 0;
                        foreach($_SESSION as $product){
                            $price = 0;
                            $quantity = 0;
                            echo "<form action='editCart.php' method='POST'>";
                            echo "<tr>";
                                echo "<td>".$no++."</td>";
                                foreach($product as $key => $value){
                                    if($key == 0){
                                        echo "<td>".$value."</td>";
                                        echo "<input type='hidden' name='pro$key' value='".$value."'>";
                                    }else if($key == 1){
                                        echo "<td>".$value."</td>";
                                        echo "<input type='hidden' name='pro$key' value='".$value."'>";
                                        $price = $value;
                                    }else if($key == 2){
                                        echo "<td><input type='number' min='1' required='required' name='pro$key' value='".$value."' class='form-control'></td>";
                                        $quantity = $value;
                                    }else if($key == 3){
                                        echo "<input type='hidden' name='pro$key' value='".$value."'>";
                                    }
                                }
                                $total = $price * $quantity;
                                echo "<td>".$total."</td>";
                                echo "<td><input type='submit' name='event' value='Update' class='btn btn-warning'></td>";
                                echo "<td><input type='submit' name='event' value='Delete' class='btn btn-danger'></td>";
                            echo "</tr>";
                            echo "</form>";
                        }
                    ?>
            </tbody>
        </table>
        <?php if($no - 1 != 0){?>
            <input type='text' placeholder="Customer name" id="customer" name="customer">
            <input type='submit' name='checkOut' value='Check out' class='btn btn-success'>
        <?php } ?>
        <a href="index.php" class="btn btn-primary col-lg-1.5">Back to menu</a>
        </form>
    </div>
</body>
<?php
// foreach($_SESSION as $val){
//     print_r($val);
// }
?>