<?php
//require customer class
include_once (dirname(__FILE__)).'/../classes/user_class.php';

//function to register new user
function register_new_user_fxn($username, $email, $password, $country, $city, $street_name, $contact){
    //create instance of class
    $user_object = new user_class;

    //run the register query
    $run_query = $user_object->register_new_user($username, $email, $password, $country, $city, $street_name, $contact);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

//function check for existing customer
function check_for_existing_user_fxn($email){
    //create instance of class
    $user_object = new user_class;

    //run the register query
    $run_query = $user_object->check_for_user($email);

    if($run_query){
        $email_arr = array();
        $email_arr = $user_object->db_fetch();
        return $email_arr['email'];
    }else{
        return false;
    }
}

//function to verify customer for login
function verify_user_fxn($email){
    //create instance of class
    $user_object = new user_class;

    //run the register query
    $run_query = $user_object->check_for_user($email);

    if($run_query){
        $email_arr = array();
        $email_arr = $user_object->db_fetch();
        return $email_arr;
    }else{
        return false;
    }
}

function select_user_details($user_id){
    //create instance of class
    $user_object = new user_class;

    //run the register query
    $run_query = $user_object->select_user_details($user_id);

    if($run_query){
        $email_arr = array();
        $email_arr = $user_object->db_fetch();
        return $email_arr;
    }else{
        return false;
    }
}

function update_to_seller($username, $email, $country, $city, $street_name, $contact, $id){
    //create instance of class
    $user_object = new user_class;

    //run the register query
    $run_query = $user_object->update_to_seller($username, $email, $country, $city, $street_name, $contact, $id);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function add_seller_payment($user_id, $acc_name, $acc_number, $bank_name, $amount){
$user_object = new user_class;

$run_query = $user_object -> add_seller_payment($user_id, $acc_name, $acc_number, $bank_name, $amount);

if($run_query){
    return $run_query;
}else{
    return false;
}
}

function select_payment_details($user_id){
    //create instance of class
    $user_object = new user_class;

    //run the register query
    $run_query = $user_object->select_payment_details($user_id);

    if($run_query){
        $amount_arr = array();
        $amount_arr = $user_object->db_fetch();
        return $amount_arr["amt"];
    }else{
        return false;
    }
}

?>
