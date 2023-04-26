<?php
require_once("../settings/core.php");
require_once("../controllers/user_controller.php");
$errors = array();
//if button is clicked
if(isset($_POST['submit'])){
    //grab form inputs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $contact = $_POST['contact'];
    $id = $_POST['id'];

    //validate inputs
    //check if empty
    if(empty($username)){ array_push($errors, "name cannot be empty");}
    if(empty($email)){ array_push($errors, "email cannot be empty");}
    if(empty($country)){ array_push($errors, "country cannot be empty");}
    if(empty($city)){ array_push($errors, "city cannot be empty");}
    if(empty($street)){ array_push($errors, "street cannot be empty");}
    if(empty($contact)){ array_push($errors, "contact cannot be empty");}

    //check for appropriate lengths
    if(strlen($username) > 100){ array_push($errors, "name is too long");}
    if(strlen($email) > 50){ array_push($errors, "email is too long");}
    if(strlen($country) > 50){ array_push($errors, "country is too long");}
    if(strlen($city) > 50){ array_push($errors, "city is too long");}
    if(strlen($street) > 50){ array_push($errors, "street is too long");}
    if(strlen($contact) > 15){ array_push($errors, "contact is too long");}

    //if there are no errors
    if(count($errors) == 0){
        $update_user = update_to_seller($username, $email, $country, $city, $street, $contact, $id);

        if($update_user){
            $_SESSION['user_role'] = 2;
            header("location: ../index.php");
        }else{
            echo "asdf";
        }
    }else{
        session_start();
        $_SESSION['notifs'] = $errors;
        header("location: seller.php");
    }
}

?>
