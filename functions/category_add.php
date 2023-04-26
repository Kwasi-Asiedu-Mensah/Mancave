<?php
require_once("../controllers/product_controller.php");
if(isset($_POST['submit'])){
    $name = $_POST['cat_name'];
    if(!empty($name)){
        if(strlen($name)<=50){
            $add_cat = add_new_category($name);
            if($add_cat){
                header("location: ../view/categories.php");
            }else{
                echo "failed";
            }
        }
    }
}


?>
