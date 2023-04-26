<?php
require_once("../controllers/user_controller.php");
$errors = array();
session_start();
//if button is clicked
if(isset($_POST['submit'])){
    //grab form inputs
    $acc_name = $_POST['acc_name'];
    $acc_number = $_POST['acc_number'];
    $bank_name = $_POST['bank_name'];
    $amount = $_POST['amt'];

    //validate inputs
    //check if empty
    if(empty($acc_name)){ array_push($errors, "Account name cannot be empty");}
    if(empty($acc_number)){ array_push($errors, "Account number cannot be empty");}
    if(empty($bank_name)){ array_push($errors, "Bank name cannot be empty");}
    if(empty($amount)){ array_push($errors, " Amount cannot be empty");}


    //check for appropriate lengths
    if(strlen($acc_name) > 100){ array_push($errors, " Account name is too long");}
    if(strlen($acc_number) > 20){ array_push($errors, " Account number is too long");}
    if(strlen($bank_name) > 100){ array_push($errors, " Bank name is too long");}
    if(strlen($amount) > 10){ array_push($errors, " Amount is too long");}




    //check if the user already exists
    //$email_arr = check_for_existing_user_fxn($email);
    //if(!empty($email_arr)){
      //array_push($errors, "user already exists");
    }

    //check if passwords match
    //if($password != $password_con){ array_push($errors, "passwords don't match");}

    //if there are no errors
    if(count($errors) == 0){
        //$enc_password = md5($password);
        $seller_payment = add_seller_payment($_SESSION["user_id"], $acc_name, $acc_number, $bank_name, $amount);

        if($seller_payment){
            header("location: ../admin/orders.php");
        }else{
            echo "asdf";
        }
    }else{
        session_start();
        $_SESSION['notifs'] = $errors;
        header("location: seller_payment.php");
    }


?>
