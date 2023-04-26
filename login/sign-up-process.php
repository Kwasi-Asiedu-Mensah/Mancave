<?php
require_once("../controllers/user_controller.php");
$errors = array();
//if button is clicked
if(isset($_POST['submit'])){
    //grab form inputs
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_con = $_POST['con_password'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $contact = $_POST['contact'];

    //validate inputs
    //check if empty
    if(empty($name)){ array_push($errors, "name cannot be empty");}
    if(empty($email)){ array_push($errors, "email cannot be empty");}
    if(empty($password)){ array_push($errors, "password cannot be empty");}
    if(empty($country)){ array_push($errors, "country cannot be empty");}
    if(empty($city)){ array_push($errors, "city cannot be empty");}
    if(empty($street)){ array_push($errors, "street cannot be empty");}
    if(empty($contact)){ array_push($errors, "contact cannot be empty");}

    //check for appropriate lengths
    if(strlen($name) > 100){ array_push($errors, "name is too long");}
    if(strlen($email) > 50){ array_push($errors, "email is too long");}
    if(strlen($country) > 50){ array_push($errors, "country is too long");}
    if(strlen($city) > 50){ array_push($errors, "city is too long");}
    if(strlen($street) > 50){ array_push($errors, "street is too long");}
    if(strlen($contact) > 15){ array_push($errors, "contact is too long");}

    //check if the user already exists
    $email_arr = check_for_existing_user_fxn($email);
    if(!empty($email_arr)){
      array_push($errors, "user already exists");
    }

    //check if passwords match
    if($password != $password_con){ array_push($errors, "passwords don't match");}

    //if there are no errors
    if(count($errors) == 0){
        $enc_password = md5($password);
        $register_user = register_new_user_fxn($name, $email, $enc_password, $country, $city, $street, $contact);

        if($register_user){
            header("location: login.php");
        }else{
            echo "asdf";
        }
    }else{
        session_start();
        $_SESSION['notifs'] = $errors;
        header("location: sign-up.php");
    }
}

?>
