<?php
require("../settings/core.php");
require("../controllers/product_controller.php");
$errors = array();

//if submit
if(isset($_POST['submit'])){
    $title = $_POST['product_name'];
    $price = $_POST['product_price'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $seller_id = $_POST['seller_id'];

    //check if fields are empty
    if(empty($title)){array_push($errors, "title is required");}
    if(empty($price)){array_push($errors, "price is required");}
    if(empty($desc)){array_push($errors, "description is required");}
    if(empty($category)){array_push($errors, "Category is required");}
    if(empty($stock)){array_push($errors, "stock is required");}

    //check if fields are of appropriate length
    if(strlen($title) > 200){array_push($errors, "title is too long");}
    if(strlen($desc) > 1000){array_push($errors, "description is too long");}

    //image validation
    $target_dir = "images/products/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //check if image has been uploaded
    if(empty($_FILES["img"]["name"])){
        array_push($errors, "file cannot be empty");
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check == false){
            array_push($errors, "file is not an image");
        }
        //check if file already exists
        if(file_exists($target_file)){
            array_push($errors, "File already exists");
        }
        //limit file size
        if($_FILES["img"]["size"] > 5000000){
            array_push($errors, "file is too large");
        }
        //limit file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
    }

    //if form is fine
    if(count($errors) == 0){
        $uploadImage = move_uploaded_file($_FILES["img"]["tmp_name"],'../'.$target_file);
        if($uploadImage){
            $addProduct = add_new_product_fxn($category, $seller_id, $title, $price, $desc, $target_file, $stock);

            if($addProduct){header("location: ../admin/dashboard.php");}
            else{echo "add failed"; }
        }else{
            echo "upload failed";
        }
    }else{
        $_SESSION['notifs'] = $errors;
        header("location: ../admin/products_add.php");
    }
}
?>
