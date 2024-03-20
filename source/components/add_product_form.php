<!-- Khoi Tran 
March 10  16th 2024
IT 202-002
Phase 3 Assignment:  Read SQL Data using PHP
kat46@njit.edu -->
<?php
require_once('database_njit.php');
$query = 'SELECT * FROM sustaincategories ORDER BY sustainCategoryID';
$statement = $db->prepare($query);
$statement->execute();
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
?>
    <header class="container">
        <h1  class="container" > Product Manager</h1>
        </header>
        <main>
            <form action="add_product.php" method="POST" class="create_product_form">
                
            <h1> Add Product</h1>
                <label for="">Category:</label>
                <select  class="option" name="sustaincategories_id">
                    <?php foreach ($sustaincategories as $sustaincategory) : ?>
                        <option  class="option" value="<?php echo $sustaincategory['sustainCategoryID']; ?>"><?php echo $sustaincategory['sustainCategoryName'] ?></option>
                    <?php endforeach; ?>

                </select>
                <br>
                <label>Code:</label>
                <input type="text" name="code"><br>

                <label>Name:</label>
                <input type="text" name="name"><br>
                <label>Description:</label>

                <input type="text" name="description"><br>

                <label>List Price:</label>
                <input type="text" name="price" placeholder="Price must less than 30.00$"><br>

                <input class = "button" type="submit" value="Add Product"><br>
                <!-- <p ><a href="product.php">View Product List</a></p> -->
            </form>
            
        </main>

<?php
include("footer.php");
?>;
</body>