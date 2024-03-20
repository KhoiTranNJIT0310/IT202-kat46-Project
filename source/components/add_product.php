<?php 
$sustaincategories_id = filter_input(INPUT_POST, 'sustaincategories_id', FILTER_VALIDATE_INT);
print_r($_POST);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price');

require_once('database_njit.php');
$query = 'SELECT * FROM sustainitems WHERE sustainCode = :code';
$statement = $db->prepare($query);
$statement->bindValue(':code', $code);
$statement->execute();
$exist_code = $statement->fetch();
$statement->closeCursor();

// Validate inputs
$max_price =30;
$error = "";
if ($sustaincategories_id == NULL || $sustaincategories_id == FALSE){
    $error = "We couldn't get the data!";
}
else if ($code == NULL){
    $error = " Product code cannot be empty!";
}
else if ($description == NULL){
    $error = " Product description cannot be empty!";
}
else if ($name == NULL){
    $error = " Product name cannot be empty!";
}
else if ($price == NULL || $price == FALSE || is_int($price) || $price <= 0 ){
    $error = " Product price cannot be empty nor be an integer!";
}
else if ($price >$max_price){
    $error = " Product price exceed 30$ ";
}
else if ($exist_code ){
    $error = "Product code has already been used!";
}


        else{
            require_once('database_njit.php');
            // Add the product to the database  
            $query = 'INSERT INTO  sustainitems (sustainCategoryID, sustainCode, sustainName, description, price, dateCreated) VALUES (:sustaincategories_id, :code,:name, :description, :price, NOW())';
            $statement = $db->prepare($query);
            $statement->bindValue(':sustaincategories_id', $sustaincategories_id);
            $statement->bindValue(':code', $code);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $success = $statement->execute();
            $statement->closeCursor();
            echo "<p>Your insert statement status is $success </p>";
        }
        echo "$error <br>"; 
        ?>
        <p><a href="product.php">View Product List</a></p>