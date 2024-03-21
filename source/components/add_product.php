<!-- Khoi Tran 
March 10  16th 2024
IT 202-002
Phase 3 Assignment:  Read SQL Data using PHP
kat46@njit.edu -->
<?php
$sustaincategories_id = filter_input(INPUT_POST, 'sustaincategories_id', FILTER_VALIDATE_INT);
// print_r($_POST);
$code = filter_input(INPUT_POST, 'code' );
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// fetch the code in the database to check if the code is already used
require_once('database_njit.php');
$query = 'SELECT * FROM sustainitems WHERE sustainCode = :code';
$statement = $db->prepare($query);
$statement->bindValue(':code', $code);
$statement->execute();
$exist_code = $statement->fetch();
$statement->closeCursor();

// Validate inputs
$max_price = 30;
$error = "";
$success ="";
// check for the file get the data
if ($sustaincategories_id == NULL || $sustaincategories_id == FALSE) {
    $error = "We couldn't get the data!";
}
// check if the code is empty
else if ($code == NULL) {
    $error = " Product code cannot be empty!";
}
// check if the description is empty
else if ($description == NULL) {
    $error = " Product description cannot be empty!";
}
// check if the name is empty
else if ($name == NULL) {
    $error = " Product name cannot be empty!";
}
// check if the price is empty or not a float or invalid
else if ($price == NULL || $price == FALSE || is_int($price) || $price <= 0) {
    $error = " Product price cannot be empty nor be an integer!";
}
// check if the price is less than max value
else if ($price > $max_price) {
    $error = " Product price exceed 30$ ";
}
// check if the product code is used 
else if ($exist_code) {
    $error = "Product code has already been used!";
}
// if all are valid we display success 

else {
    require_once('database_njit.php');
    // Add the product to the database  
    $query = 'INSERT INTO  sustainitems (sustainCategoryID, sustainCode, sustainName, description, price, dateCreated) VALUES (:sustaincategories_id, :code,:name, :description, :price, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':sustaincategories_id', $sustaincategories_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $success = $statement->execute(); // execute
    $statement->closeCursor();
    // create a sucess statement
    if ($success == 1) {
        $success = " Your insert statement status is completed!";
    } else {
        $success = " Your insert statement status is not good!";
    };
}
// Show error if there is any
?>
<html>

<head>
    <title>Create Product</title>
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="../style/create.css">
</head>

<body>
    <?php
    include("header.php");
    // Show error if there is any
    ?>
    <div class="container">
    <h1><?php echo "$error <br>"; 
    echo " $success ";?> </h1>
    <button class="button"><a href="product.php">View Product List</a></button>
    </div>
</body>

</html>