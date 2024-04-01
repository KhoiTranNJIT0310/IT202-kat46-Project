<?php
// Khoi Tran 
// April  4th 2024
// IT 202-002
// Phase 4 Assignment:  PHP Authentication and Delete SQL Data
// kat46@njit.edu 

require_once("database_njit.php");
// get IDs
$product_id = filter_input(INPUT_POST, "product_id",FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, "sustaincategories_id", FILTER_VALIDATE_INT);

if($product_id != false && $category_id != false){
    $query = 'DELETE FROM sustainitems WHERE sustainID = :product_id';
    // prepare, bindValue, execute, closeCursor;
    $statement = $db-> prepare($query);
    $statement->bindValue('product_id', $product_id); // bind the value
    $success = $statement ->execute();
    $statement->closeCursor();
    // create a status statement
    echo"<p> Your delete statement status is $success </p>";
}


?>
