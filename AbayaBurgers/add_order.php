<?php
session_start();
$id = $_GET['id'];
$product["id"] = $id;

    if(isset($_SESSION["my_cart"]))
    { 
        if(isset($_SESSION["my_cart"][$product['id']])) 
        {
                unset($_SESSION["my_cart"][$product['id']]); 
        }           
    }
    $_SESSION["my_cart"][$product['id']] = $product;  
header('location: view_tray.php');
?>