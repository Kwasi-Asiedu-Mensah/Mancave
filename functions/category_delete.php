<?php
include_once("../controllers/product_controller.php");
if(isset($_GET['id'])){
    $delete = delete_one_category($_GET['id']);
    if($delete){
        header("location: ../view/categories.php");
    }else{
        echo "failed";
    }
}
?>
