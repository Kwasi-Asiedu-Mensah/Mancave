<?php
//connect to database class
include_once (dirname(__FILE__)).'/../settings/db_class.php';


class product_class extends db_connection
{
    public function add_new_category($name){
        $sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$name')";

        return $this->db_query($sql);
    }

    public function display_categories(){
        $sql = "SELECT * FROM `categories`";
        return $this->db_query($sql);
    }

    public function display_one_category($id){
        $sql = "SELECT `cat_name` FROM `categories` WHERE `id`='$id'";
        return $this->db_query($sql);
    }

    public function update_one_category($id, $new_name){
        $sql = "UPDATE `categories` SET `cat_name`='$new_name' WHERE `id`='$id'";
        return $this->db_query($sql);
    }

    public function delete_one_category($id){
        $sql = "DELETE FROM `categories` WHERE `id`='$id'";
        return $this->db_query($sql);
    }

    public function add_new_product($product_cat, $seller_id, $product_name, $product_price, $product_desc, $product_img, $stock){
        $sql = "INSERT INTO `products`(`product_cat`, `seller_id`, `product_name`, `product_price`, `product_desc`, `product_img`, `stock`) VALUES ('$product_cat', '$seller_id', '$product_name', '$product_price', '$product_desc', '$product_img', '$stock')";
        return $this->db_query($sql);
    }

    public function display_seller_products($seller_id){
        $sql = "SELECT * FROM `products` WHERE `seller_id`='$seller_id'";
        return $this->db_query($sql);
    }

    public function display_one_product($id){
        $sql = "SELECT `products`.`id`, `products`.`product_cat`, `categories`.`cat_name`, `products`.`product_name`, `products`.`stock`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_img`, `products`.`product_img`, `products`.`seller_id`, `users`.`username`
FROM `products`
JOIN `users` ON (`products`.`seller_id` = `users`.`id`)
JOIN `categories` ON (`products`.`product_cat` = `categories`.`id`)
WHERE `products`.`id` = '$id'";
        return $this->db_query($sql);
    }

    public function update_one_product($product_cat, $product_name, $product_price, $product_desc, $product_img, $stock, $pid){
        $sql = "UPDATE `products` SET `product_cat`='$product_cat', `product_name`='$product_name',`product_price`='$product_price',`product_desc`='$product_desc',`product_img`='$product_img',`stock`='$stock' WHERE `id`='$pid'";
        return $this->db_query($sql);
    }

    public function delete_one_product($id){
        $sql = "DELETE FROM `products` WHERE `id`='$id'";
        return $this->db_query($sql);
    }

    public function display_all_products(){
        $sql = "SELECT * FROM `products`";
        return $this->db_query($sql);
    }

    public function search_products($term){
        $sql = "SELECT `products`.`id`, `products`.`product_cat`, `categories`.`cat_name`, `products`.`product_name`, `products`.`stock`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_img`, `products`.`product_img`, `products`.`seller_id`, `users`.`username`
FROM `products`
JOIN `users` ON (`products`.`seller_id` = `users`.`id`)
JOIN `categories` ON (`products`.`product_cat` = `categories`.`id`)
WHERE `products`.`product_name` LIKE '$term'";
        return $this->db_query($sql);
    }

    public function display_products_by_cat($id){
        $sql = "SELECT * FROM `products` WHERE `product_cat` = '$id'";
        return $this->db_query($sql);
    }
}
?>
