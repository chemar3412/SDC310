<?php
require_once('database.php');

//Get all entries in the productsinfo table
function get_all_products()
{
    //Query for all users
    $conn = get_db_conn();
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    return $result;
}

?>
