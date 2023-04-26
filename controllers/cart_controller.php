<?php
//require customer class
include_once (dirname(__FILE__)).'/../classes/cart_class.php';

function add_to_cart_fxn($product_id, $customer_id, $ip_add, $qty){
    $cart_object = new cart_class;

    $run_query = $cart_object->add_to_cart_log($product_id, $customer_id, $ip_add, $qty);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function add_to_cart_nlog($product_id, $ip_add, $qty){
    $cart_object = new cart_class;

    $run_query = $cart_object->add_to_cart_nlog($product_id, $ip_add, $qty);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function check_duplicate_log($product_id, $customer_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->check_duplicate_log($product_id, $customer_id);
    if($run_query){
        $record = $new_cart_object->db_fetch();
        if(!empty($record['product_id']) && !empty($record['customer_id'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function check_duplicate_nlog($product_id, $ip_add){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->check_duplicate_nlog($product_id, $ip_add);
    if($run_query){
        $record = $new_cart_object->db_fetch();
        if(!empty($record['product_id']) && !empty($record['ip_add'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function get_stock($product_id){
    $new_cart_object = new cart_class();
    $run_query = $new_cart_object->get_stock($product_id);
    if($run_query){
        $stock = $new_cart_object->db_fetch();
        return $stock;
    }else{
        return false;
    }
}

function view_cart($customer_id){
    $new_cart_object = new cart_class();
    $run_query = $new_cart_object->view_cart($customer_id);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;

        }
        return $cart_arr;
    }else{
        return false;
    }
}

function view_cart_nlog($ip_add){
    $new_cart_object = new cart_class();
    $run_query = $new_cart_object->view_cart_nlog($ip_add);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;

        }
        return $cart_arr;
    }else{
        return false;
    }
}

function update_cart_item_qty($product_id, $customer_id, $qty){
    $cart_object = new cart_class;

    $run_query = $cart_object->update_cart_item_qty($product_id, $customer_id, $qty);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function update_cart_item_qty_nlog($product_id, $ip_add, $qty){
    $cart_object = new cart_class;

    $run_query = $cart_object->update_cart_item_qty_nlog($product_id, $ip_add, $qty);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_cart_item($product_id, $customer_id){
    $cart_object = new cart_class;

    $run_query = $cart_object->delete_cart_item($product_id, $customer_id);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_cart_item_nlog($product_id, $ip_add){
    $cart_object = new cart_class;

    $run_query = $cart_object->delete_cart_item_nlog($product_id, $ip_add);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function get_cart_items_no($customer_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_cart_items_no($customer_id);

    if($run_query){
        $cart_arr = array();
        $cart_arr = $new_cart_object->db_fetch();
        return $cart_arr;
    }else{
        return false;
    }

}

function get_cart_items_no_nlog($ip_add){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_cart_items_no_nlog($ip_add);

    if($run_query){
        $cart_arr = array();
        $cart_arr = $new_cart_object->db_fetch();
        return $cart_arr;
    }else{
        return false;
    }

}

function update_cart_with_user_id($customer_id, $ip_add){
    $cart_object = new cart_class;

    $run_query = $cart_object->update_cart_with_user_id($customer_id, $ip_add);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function get_cart_value($customer_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_cart_value($customer_id);

    if($run_query){
        $cart_arr = array();
        $cart_arr = $new_cart_object->db_fetch();
        return $cart_arr;
    }else{
        return false;
    }
}

function add_order($customer_id, $invoice_no, $ord_date, $order_status){
    $cart_object = new cart_class;

    $run_query = $cart_object->add_order($customer_id, $invoice_no, $ord_date, $order_status);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function add_order_details($order_id, $product_id, $qty, $status){
    $cart_object = new cart_class;

    $run_query = $cart_object->add_order_details($order_id, $product_id, $qty, $status);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function recent_order(){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->recent_order();

    if($run_query){
        $cart_arr = array();
        $cart_arr = $new_cart_object->db_fetch();
        return $cart_arr;
    }else{
        return false;
    }
}

function add_payment($amt, $customer_id, $order_id, $currency, $payment_date){
    $cart_object = new cart_class;

    $run_query = $cart_object->add_payment($amt, $customer_id, $order_id, $currency, $payment_date);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function clear_cart($customer_id){
    $cart_object = new cart_class;

    $run_query = $cart_object->clear_cart($customer_id);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function update_stock($product_id, $r_qty){
    $cart_object = new cart_class;

    $run_query = $cart_object->update_stock($product_id, $r_qty);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function get_order($order_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_order($order_id);

    if($run_query){
        $cart_arr = array();
        $cart_arr = $new_cart_object->db_fetch();
        return $cart_arr;
    }else{
        return false;
    }
}

function get_order_details($order_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_order_details($order_id);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;

        }
        return $cart_arr;
    }else{
        return false;
    }
}

function get_payment($order_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_payment($order_id);

    if($run_query){
        $cart_arr = array();
        $cart_arr = $new_cart_object->db_fetch();
        return $cart_arr;
    }else{
        return false;
    }
}

function get_unfulfilled_seller_orders($seller_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_unfulfilled_seller_orders($seller_id);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;

        }
        return $cart_arr;
    }else{
        return false;
    }
}

function get_fulfilled_seller_orders($seller_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_fulfilled_seller_orders($seller_id);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;

        }
        return $cart_arr;
    }else{
        return false;
    }
}

function update_order_status($product_id, $order_id){
    $cart_object = new cart_class;

    $run_query = $cart_object->update_order_status($product_id, $order_id);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function get_seller_sales($seller_id){
    $new_cart_object = new cart_class();

    $run_query = $new_cart_object->get_seller_sales($seller_id);
    if($run_query){
        $cart_arr = array();
        while($record = $new_cart_object->db_fetch()){
            $cart_arr[] = $record;

        }
        return $cart_arr;
    }else{
        return false;
    }
}


?>
