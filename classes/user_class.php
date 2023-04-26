<?php
//connect to database class
include_once (dirname(__FILE__)).'/../settings/db_class.php';


class user_class extends db_connection
{
    public function register_new_user($username, $email, $password, $country, $city, $street_name, $contact){
        $sql = "INSERT INTO `users`(`username`, `email`, `password`, `country`, `city`, `street_name`, `contact`, `user_role`) VALUES ('$username', '$email', '$password', '$country', '$city', '$street_name', '$contact', 3)";

        return $this->db_query($sql);
    }

    public function check_for_user($email){
        $sql = "SELECT * FROM `users` WHERE `email`='$email'";
        return $this->db_query($sql);
    }

    public function select_user_details($user_id){
        $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
        return $this->db_query($sql);
    }

    public function update_to_seller($username, $email, $country, $city, $street_name, $contact, $id){
        $sql = "UPDATE `users` SET `username`='$username',`email`='$email', `country`='$country',`city`='$city',`street_name`='$street_name',`contact`='$contact',`user_role`=2 WHERE `id`='$id'";

        return $this->db_query($sql);
    }

    public function add_seller_payment($user_id, $acc_name, $acc_number, $bank_name, $amount){
        $sql = "INSERT INTO `seller_payment` (`user_id`, `acc_name`, `acc_number`, `bank_name`,`amt`) VALUES ('$user_id', '$acc_name', '$acc_number', '$bank_name', '$amount')";
        return $this->db_query($sql);
    }

    public function select_payment_details($user_id){
        $sql = "SELECT SUM(amt) AS amt FROM `seller_payment` WHERE `user_id`='$user_id'";
        return $this->db_query($sql);
    }

}

?>
