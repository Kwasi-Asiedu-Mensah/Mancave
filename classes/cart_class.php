<?php
//connect to database class
include_once (dirname(__FILE__)).'/../settings/db_class.php';



class cart_class extends db_connection
{
    public function add_to_cart_log($product_id, $customer_id, $ip_add, $qty){
        $sql = "INSERT INTO `cart`(`product_id`, `customer_id`, `ip_add`, `qty`) VALUES ('$product_id', '$customer_id', '$ip_add', '$qty')";
        return $this->db_query($sql);
    }

    public function add_to_cart_nlog($product_id, $ip_add, $qty){
        $sql = "INSERT INTO `cart`(`product_id`, `ip_add`, `qty`) VALUES ('$product_id', '$ip_add', '$qty')";
        return $this->db_query($sql);
    }

    public function check_duplicate_log($product_id, $customer_id){
        $sql = "SELECT `product_id`, `customer_id` FROM `cart` WHERE `product_id` = '$product_id' AND `customer_id` = '$customer_id'";
        return $this->db_query($sql);
    }

    public function check_duplicate_nlog($product_id, $ip_add){
        $sql = "SELECT `product_id`, `ip_add` FROM `cart` WHERE `product_id` = '$product_id' AND `ip_add` = '$ip_add'";
        return $this->db_query($sql);
    }

    public function get_stock($product_id){
        $sql = "SELECT `stock` FROM `products` WHERE `id`='$product_id'";
        return $this->db_query($sql);
    }

    public function view_cart($customer_id){
        $sql = "SELECT `cart`.`product_id`, `cart`.`customer_id`, `cart`.`qty`, `products`.`product_name`, `products`.`product_img`, `products`.`product_price`,`products`.`stock` FROM `cart` JOIN `products` ON (`cart`.`product_id` = `products`.`id`) WHERE `cart`.`customer_id` = '$customer_id'";
        return $this->db_query($sql);
    }

    public function view_cart_nlog($ip_add){
        $sql = "SELECT `cart`.`product_id`, `cart`.`ip_add`, `cart`.`qty`, `products`.`product_name`, `products`.`product_img`,`products`.`product_price` FROM `cart` JOIN `products` ON (`cart`.`product_id` = `products`.`id`) WHERE `cart`.`ip_add` = '$ip_add'";
        return $this->db_query($sql);
    }

    public function update_stock($product_id, $r_qty){
        $sql = "UPDATE `products` SET `stock`='$r_qty' WHERE `id`='$product_id'";
        return $this->db_query($sql);
    }

    public function update_cart_item_qty($product_id, $customer_id, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `product_id`='$product_id' AND `customer_id`='$customer_id'";
        return $this->db_query($sql);
    }

    public function update_cart_item_qty_nlog($product_id, $ip_add, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `product_id`='$product_id' AND `ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

    public function delete_cart_item($product_id, $customer_id){
        $sql = "DELETE FROM `cart` WHERE `product_id`='$product_id' AND `customer_id`='$customer_id'";
        return $this->db_query($sql);
    }

    public function delete_cart_item_nlog($product_id, $ip_add){
        $sql = "DELETE FROM `cart` WHERE `product_id`='$product_id' AND `ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

    public function get_cart_items_no($customer_id){
        $sql = "SELECT count(`customer_id`) AS `count` FROM `cart` WHERE `customer_id`='$customer_id'";
        return $this->db_query($sql);
    }

    public function get_cart_items_no_nlog($ip_add){
        $sql = "SELECT count(`ip_add`) AS `count` FROM `cart` WHERE `ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

    public function update_cart_with_user_id($customer_id, $ip_add){
        $sql = "UPDATE `cart` SET `customer_id`='$customer_id' WHERE `ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

    public function get_cart_value($customer_id){
        $sql = "SELECT SUM(`products`.`product_price`*`cart`.`qty`) as result FROM `cart` JOIN `products` ON (`products`.`id` = `cart`.`product_id`) WHERE `cart`.`customer_id` = '$customer_id'";
        return $this->db_query($sql);
    }

    public function add_order($customer_id, $invoice_no, $ord_date, $order_status){
        $sql = "INSERT INTO `orders`(`customer_id`, `invoice_no`, `ord_date`, `order_status`) VALUES ('$customer_id', '$invoice_no', '$ord_date', '$order_status')";
        return $this->db_query($sql);
    }

    public function add_order_details($order_id, $product_id, $qty, $status){
        $sql = "INSERT INTO `order_details`(`order_id`, `product_id`, `qty`, `status`) VALUES ('$order_id', '$product_id', '$qty', '$status')";
        return $this->db_query($sql);
    }

    public function recent_order(){
        $sql = "SELECT MAX(`id`) as recent FROM `orders`";
        return $this->db_query($sql);
    }

    public function add_payment($amt, $customer_id, $order_id, $currency, $payment_date){
        $sql = "INSERT INTO `payment`(`amount`, `customer_id`, `order_id`, `currency`, `payment_date`) VALUES ('$amt', '$customer_id', '$order_id', '$currency', '$payment_date')";
        return $this->db_query($sql);
    }

    public function clear_cart($customer_id){
        $sql = "DELETE FROM `cart` WHERE `customer_id`='$customer_id'";
        return $this->db_query($sql);
    }

    public function get_order($order_id){
        $sql = "SELECT `users`.`username`, `orders`.`id`, `orders`.`invoice_no`, `orders`.`ord_date`, `orders`.`order_status` FROM `orders` JOIN `users` ON (`users`.`id` = `orders`.`id`) WHERE `orders`.`id`='$order_id'";
        return $this->db_query($sql);
    }

    public function get_order_details($order_id){
        $sql = "SELECT `products`.`product_name`, `products`.`product_img`, `products`.`product_price`, `order_details`.`qty`, `order_details`.`qty`*`products`.`product_price` as result FROM `order_details` JOIN `products` ON (`order_details`.`product_id` = `products`.`id`) WHERE `order_id`='$order_id'";
        return $this->db_query($sql);
    }

    public function get_payment($order_id){
        $sql = "SELECT `amount` FROM `payment` WHERE `order_id`='$order_id'";
        return $this->db_query($sql);
    }

    public function get_unfulfilled_seller_orders($seller_id){
        $sql = "SELECT `users`.`username`, `users`.`id`, `users`.`contact`, `products`.`product_name`, `products`.`product_price`,`order_details`.`qty`, `order_details`.`status`, `order_details`.`product_id`, `orders`.`ord_date`,`order_details`.`order_id`
FROM `orders`
JOIN `users` ON (`users`.`id` = `orders`.`customer_id`)
JOIN `order_details` ON (`order_details`.`order_id` = `orders`.`id`)
JOIN `products` ON (`products`.`id` = `order_details`.`product_id`)
WHERE `products`.`seller_id`='$seller_id'
AND `order_details`.`status`='unfulfilled'";
        return $this->db_query($sql);
    }

    public function get_fulfilled_seller_orders($seller_id){
        $sql = "SELECT `users`.`username`, `users`.`id`, `users`.`contact`, `products`.`product_name`, `products`.`product_price`,`order_details`.`qty`, `order_details`.`status`, `order_details`.`product_id`, `orders`.`ord_date`,`order_details`.`order_id`
FROM `orders`
JOIN `users` ON (`users`.`id` = `orders`.`customer_id`)
JOIN `order_details` ON (`order_details`.`order_id` = `orders`.`id`)
JOIN `products` ON (`products`.`id` = `order_details`.`product_id`)
WHERE `products`.`seller_id`='$seller_id'
AND `order_details`.`status`='fulfilled'";
        return $this->db_query($sql);
    }

    public function update_order_status($product_id, $order_id){
        $sql = "UPDATE `order_details` SET `status`='fulfilled' WHERE `order_id`='$order_id' AND `product_id`='$product_id'";
        return $this->db_query($sql);
    }

    public function get_seller_sales($seller_id){
        $sql = "SELECT SUM(`products`.`product_price`*`order_details`.`qty`) as result
FROM `orders`
JOIN `users` ON (`users`.`id` = `orders`.`customer_id`)
JOIN `order_details` ON (`order_details`.`order_id` = `orders`.`id`)
JOIN `products` ON (`products`.`id` = `order_details`.`product_id`)
WHERE `products`.`seller_id`='$seller_id'";
        return $this->db_query($sql);
    }



}


?>
