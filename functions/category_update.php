<?php
require_once("../controllers/product_controller.php");
if(isset($_POST['submit'])){
    $name = $_POST['cat_name'];
    $id = $_POST['id'];

    if(!empty($name)){
        if(strlen($name)<=50){
            $update_cat = update_one_category_fxn($id, $name);
            if($update_cat){
                header("location: ../view/categories.php");
            }else{
                echo "failed";
            }
        }
    }
}

?>
