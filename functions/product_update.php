<?php
require("../controllers/product_controller.php");
$errors = array();

//if submit
if(isset($_POST['submit'])){
    $title = $_POST['product_name'];
    $price = $_POST['product_price'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $pid = $_POST['pid'];
    $pimg = $_POST['p_img'];


    //check if fields are empty
    if(empty($title)){array_push($errors, "title is required");}
    if(empty($price)){array_push($errors, "price is required");}
    if(empty($desc)){array_push($errors, "description is required");}
    if(empty($category)){array_push($errors, "category is required");}
    if(empty($stock)){array_push($errors, "stock is required");}

    //check if fields are of appropriate length
    if(strlen($title) > 200){array_push($errors, "title is too long");}
    if(strlen($desc) > 1000){array_push($errors, "description is too long");}

    //checking to see if picture is to be updated
    //check if a new file name is set
    if (!empty($_FILES["img"]["name"])){
            //image validation
    $target_dir = "images/products/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    //check if image has been uploaded
    if (empty($_FILES["img"]["name"])){
        array_push($errors, "File cannot be empty");
    }else{
            //check if its an actual image
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if ($check == false){
                array_push($errors, "File is not an image");
            }
            //check if file already exists
            if (file_exists($target_file)){
                array_push($errors, "File already exists");
            }

            //limit file size
            if ($_FILES["img"]["size"] > 5000000){
                array_push($errors, "File is too large");
            }

            //limit file type
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
                array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
        }

        if(count($errors) == 0){
            $uploadImage = move_uploaded_file($_FILES["img"]["tmp_name"], '../'.$target_file);
            if($uploadImage){



                $updateProduct = update_one_product($category, $title, $price, $desc, $target_file, $stock, $pid);

                if($updateProduct){
                    header("location: ../admin/dashboard.php");
                }else{
                    echo "update failed";
                }
            }else{
                echo "upload failed";
            }
        }
    }else{
        if(count($errors) == 0){
            $updateProduct = update_one_product($category, $title, $price, $desc, $pimg, $stock, $pid);

                if($updateProduct){
                  header("location: ../admin/dashboard.php");
                }else{
                    echo "update failed";
                }
        }

    }


}
?>
