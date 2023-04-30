<?php 
    session_start();
    // session_destroy();
    $id = $_POST['productid'];
    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $quantity = $_POST['quantity'];

    $product = array($name,$price,$quantity,$id);
    // print_r($product);
    $_SESSION[$name] = $product;
    header('location:index.php')
?>