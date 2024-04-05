<!-- Khoi Tran 
March 10  16th 2024
IT 202-002
Phase 3 Assignment:  Read SQL Data using PHP
kat46@njit.edu -->
<?php
// get the database
require_once('database_njit.php');
$query = 'SELECT * FROM sustaincategories ORDER BY sustainCategoryID';
$statement = $db->prepare($query);
$statement->execute(); //execute;
$sustaincategories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->

<head>
    <title>Create Product</title>
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="../style/create.css">
</head>

<!-- the body section -->

<body>
    <?php
include("header.php");
// Check if you have login or not
if (isset($_SESSION['is_valid_admin'])) {
    ?>
    
    <header class="container">
        <?php if ( isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) { ?>
        <div>Welcome <?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"]."! (". $_SESSION["emailAddress"].")" ?></div>
        <?php }?>
        <h1> Product Manager</h1>

    </header>
    <main>
        <form action="add_product.php" method="POST" class="create_product_form">

            <h1> Add Product</h1>
            <label for="">Category:</label>
            <!-- display the list of changing options  -->
            <select class="option" name="sustaincategories_id">
                <?php foreach ($sustaincategories as $sustaincategory) : ?>
                <option value="<?php echo $sustaincategory['sustainCategoryID']; ?>">
                    <?php echo $sustaincategory['sustainCategoryName'] ?></option>
                <?php endforeach; ?>

            </select>
            <br>
            <!-- Ask for the product code -->
            <label>Code:</label>
            <input type="text" name="code"><br>
            <!-- Ask for the product name -->
            <label>Name:</label>
            <input type="text" name="name"><br>
            <!-- Ask for the product description -->
            <label>Description:</label>
            <input type="text" name="description"><br>
            <!-- Ask for the product price -->
            <label>List Price:</label>
            <input type="text" name="price" placeholder="Price must less than 30.00$"><br>
            <!-- submit button -->
            <input class="button" type="submit" value="Add Product"><br>
            <!-- <p ><a href="product.php">View Product List</a></p> -->
        </form>

    </main>
    <!-- include the footer -->
    <?php
include("footer.php");
?>;
<?php } else { ?>
<h1> You must login to view this page</h1>
<?php } ?>
</body>