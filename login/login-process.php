<?php
require_once("../settings/core.php");
require_once("../controllers/user_controller.php");
require_once("../controllers/cart_controller.php");
$errors = array();
$ip_add = getRealIpAddr();
if(isset($_POST['submit'])){
    //grab form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];
    $enc_password = md5($password);

    //check if email isn't empty
    if(!empty($email)){
        $verify_customer = verify_user_fxn($email);

        if($verify_customer){
            if($verify_customer['password'] == $enc_password){
                $_SESSION['user_id'] = $verify_customer['id'];
                $_SESSION['user_role'] = $verify_customer['user_role'];

                if(isset($_SESSION['notloggedin'])){

                    $update_cart = update_cart_with_user_id($_SESSION['user_id'], $ip_add);

                    header("location: ../view/checkout.php");
                }else{

                    $items = get_cart_items_no_nlog($ip_add);
                    if($items['count']>0){
                        echo "hi";
                        $update_cart = update_cart_with_user_id($_SESSION['user_id'],$ip_add);
                        header("location: ../index.php");
                    }else{
                        header("location: ../index.php");
                    }
                }
            }else{
                array_push($errors, "email or password is wrong");
                $_SESSION['notifs'] = $errors;
                header("location: login.php");
            }
        }else{
            array_push($errors, "user doesn't exist");
            $_SESSION['notifs'] = $errors;
            header("location: login.php");
        }
    }else{
        array_push($errors, "email can't be empty");
            $_SESSION['notifs'] = $errors;
            header("location: login.php");
    }
}
?>
