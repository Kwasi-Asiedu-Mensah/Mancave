<?php
require_once("../controllers/cart_controller.php");
require_once("../settings/core.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_SESSION['user_id'])){
        $customer_id = $_SESSION['user_id'];
        $delete = delete_cart_item($id, $customer_id);
        if($delete){
            header("location: ../view/cart.php");
        }else{
            echo "failed";
        }

    }else{
        $ip_add = getRealIpAddr();
        $delete = delete_cart_item_nlog($id, $ip_add);
        if($delete){
            header("location: ../view/cart.php");
        }else{
            echo "failed";
        }
    }
}

?>
