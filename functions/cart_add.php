<?php
require_once("../controllers/cart_controller.php");
require_once("../settings/core.php");

$id = $_GET['id'];
$qty = $_GET['qty'];
$ip_add = getRealIpAddr();
$stock = get_stock($id);
$r_qty = $stock['stock'] - 1;
if($stock['stock'] > 0){
    //check for log in
    if(isset($_SESSION['user_id'])){
        $customer_id = $_SESSION['user_id'];

        //check for duplicate
        $is_duplicate = check_duplicate_log($id, $customer_id);

        //if item is already in cart
        if($is_duplicate){
            add_to_notifs("Product is already in cart. Consider increasing qty in your cart");
        }else{
            $add_to_cart = add_to_cart_fxn($id, $customer_id, $ip_add, $qty);

            if($add_to_cart){
                add_to_notifs("Product has been added to cart");
            }else{
                echo "failed";
            }
        }
    }else{
        //check for duplicate
        $is_duplicate = check_duplicate_nlog($id, $ip_add);

        //if item is already in cart
        if($is_duplicate){
            add_to_notifs("Product is already in cart. Consider increasing qty in your cart");
        }else{
            $add_to_cart = add_to_cart_nlog($id, $ip_add, $qty);

            if($add_to_cart){
                add_to_notifs("Product has been added to cart");
            }else{
                echo "failed";
            }
        }
    }

}

?>
