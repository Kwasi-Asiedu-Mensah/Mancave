<?php
require_once("../settings/core.php");
require_once("../controllers/cart_controller.php");
if((isset($_GET['pid'])) && (isset($_GET['ord_id']))){
    $update = update_order_status($_GET['pid'], $_GET['ord_id']);
    if($update){
        header("location: ../admin/orders.php");
    }else{
        echo "w";
    }
}
?>
