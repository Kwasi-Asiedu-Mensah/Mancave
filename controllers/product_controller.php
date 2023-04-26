<?php
include_once (dirname(__FILE__)).'/../classes/product_class.php';

function add_new_category($name){
    $product_object = new product_class;

    $run_query = $product_object->add_new_category($name);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function display_categories(){
    $product_object = new product_class;

    $run_query = $product_object->display_categories();

    if($run_query){
        $categories_arr = array();
        while($record = $product_object->db_fetch()){
            $categories_arr[] = $record;
        }
        return $categories_arr;
    }else{
        return false;
    }
}

function display_one_category($id){
    $product_object = new product_class;

    $run_query = $product_object->display_one_category($id);
    if($run_query){
        $category = $product_object->db_fetch();
        return $category;
    }else{
        return false;
    }
}

function update_one_category_fxn($id, $new_name){
    $product_object = new product_class;

    $run_query = $product_object->update_one_category($id, $new_name);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_one_category($id){
    $product_object = new product_class;

    $run_query = $product_object->delete_one_category($id);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function add_new_product_fxn($product_cat, $seller_id, $product_name, $product_price, $product_desc, $product_img, $stock){

    $product_object = new product_class;

    $run_query = $product_object->add_new_product($product_cat, $seller_id, $product_name, $product_price, $product_desc, $product_img, $stock);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function display_seller_products_fxn($seller_id){
    $product_object = new product_class;

    $run_query = $product_object->display_seller_products($seller_id);

    if($run_query){
        $products_arr = array();
        while($record = $product_object->db_fetch()){
            $products_arr[] = $record;
        }
        return $products_arr;
    }else{
        return false;
    }
}

function display_one_product($id){
    $product_object = new product_class;

    $run_query = $product_object->display_one_product($id);
    if($run_query){
        $product = $product_object->db_fetch();
        return $product;
    }else{
        return false;
    }
}

function update_one_product($product_cat, $product_name, $product_price, $product_desc, $product_img, $stock, $pid){
    $product_object = new product_class;

    $run_query = $product_object->update_one_product($product_cat, $product_name, $product_price, $product_desc, $product_img, $stock, $pid);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_one_product($id){
    $product_object = new product_class;

    $run_query = $product_object->delete_one_product($id);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function display_all_products_fxn(){
    $product_object = new product_class;

    $run_query = $product_object->display_all_products();

    if($run_query){
        $products_arr = array();
        while($record = $product_object->db_fetch()){
            $products_arr[] = $record;
        }
        return $products_arr;
    }else{
        return false;
    }

    
}

function search_products_fxn($term){
    $product_object = new product_class;

    $run_query = $product_object->search_products($term);

    if($run_query){
        $products_arr = array();
        while($record = $product_object->db_fetch()){
            $products_arr[] = $record;
        }
        return $products_arr;
    }else{
        return false;
    }
}

function display_products_by_cat($id){
    $product_object = new product_class;

    $run_query = $product_object->display_products_by_cat($id);

    if($run_query){
        $products_arr = array();
        while($record = $product_object->db_fetch()){
            $products_arr[] = $record;
        }
        return $products_arr;
    }else{
        return false;
    }
}
?>
