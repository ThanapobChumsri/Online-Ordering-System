<?php
    include('conn.php');
    session_start();

    if(isset($_POST['event'])){
        $name = $_POST['pro0'];
        $price = $_POST['pro1'];
        $quantity = $_POST['pro2'];
        $productid = $_POST['pro3'];
        $btn = $_POST['event'];

        $product = array($name,$price,$quantity,$productid);
        if($btn == "Update"){
            $_SESSION[$name] = $product;
            header('location:viewCart.php?value=updated');
        }else if($btn == "Delete"){
            unset($_SESSION[$name]);
            header('location:viewCart.php?value=deleted');
        }
        
    }
    else if(isset($_POST['checkOut'])){
        $customer = $_POST['customer'];
        if($customer == ''){
            $customer = "Guest";
        }
        $sql="insert into purchase (customer, date_purchase) values ('$customer', NOW())";
		$conn->query($sql);
		$pid=$conn->insert_id;
        $total = 0;
        foreach($_SESSION as $product){
            $sql="select * from product where productid='$product[3]'";
            $query=$conn->query($sql);
		    $row=$query->fetch_array();

            $subt=$row['price']*$product[2];
			$total+=$subt;

            $sql="insert into purchase_detail (purchaseid, productid, quantity) values ('$pid', '$product[3]', '$product[2]')";
			$conn->query($sql);

            $sql="update purchase set total='$total' where purchaseid='$pid'";
 		    $conn->query($sql);
		    header('location:sales.php');
        }
        session_destroy();
    }
?>