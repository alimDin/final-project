<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}
if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
    include('product_list.php');
} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_product($product_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('product_add.php');    
} else if ($action == 'add_product') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $date = filter_input(INPUT_POST, 'dateID');
    $time = filter_input(INPUT_POST, 'timeID');
    $item = filter_input(INPUT_POST, 'item');
    $message = filter_input(INPUT_POST, 'message');


    if ($category_id == NULL || $category_id == FALSE || $date == NULL || 
            $item == NULL || $message == NULL || $time == NULL)  {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_product($category_id, $date, $time, $item, $message);
        header("Location: .?category_id=$category_id");
    }
}    
?>