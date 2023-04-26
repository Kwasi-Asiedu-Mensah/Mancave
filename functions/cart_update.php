<?php
require_once("../controllers/cart_controller.php");
require_once("../settings/core.php");

//check if form submit is clickec
if(isset($_GET['submit'])){
    $qty = $_GET['qty'];
    $product_id = $_GET['id'];
    $stock = get_stock($product_id);
    if(($stock['stock'] - $qty) >= 0){
        if(isset($_SESSION['user_id'])){
            $customer_id = $_SESSION['user_id'];
            $update = update_cart_item_qty($product_id, $customer_id, $qty);
            if($update){
                add_to_notifs("Cart has been updated");
            }else{
                add_to_notifs("Update Failed");
            }
        }else{
            $ip_add = getRealIpAddr();
            $update = update_cart_item_qty_nlog($product_id, $ip_add, $qty);
            if($update){
                add_to_notifs("Cart has been updated");
            }else{
                add_to_notifs("Update failed");
            }
        }

    }else{
        add_to_notifs("We don't have that amount in stock consider reducing the amount. We have ".$stock['stock']." of the product available");
    }
}


?>
