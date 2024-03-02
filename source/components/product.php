<!-- Khoi Tran 
Febuary 16th 2024
IT 202-002
Phase 2 Assignment:  Read SQL Data using PHP
kat46@njit.edu -->  

<?php
require_once('database_njit.php');

// get category ID
$sustaincategories_id = filter_input(INPUT_GET, 'sustaincategories_id', FILTER_VALIDATE_INT);
// create condition for sustaincategories_id
if ($sustaincategories_id == NULL || $sustaincategories_id == false) {
    $sustaincategories_id = 1;
}

// Get name for selected category

$queryCategory = 'SELECT * FROM  sustaincategories 
WHERE sustainCategoryID = :sustaincategories_id';
$statement1 = $db->prepare($queryCategory);
// PDOstatemet
$statement1->bindValue(':sustaincategories_id', $sustaincategories_id);
$statement1->execute(); //execute;
$category = $statement1->fetch();
// DEBUGGING PURPOSE ONLY
// echo "<pre>";
// echo print_r($category);
// echo "</pre>";
// Debugging Purpose only
$category_name = $category['sustainCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM sustaincategories
ORDER BY sustainCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();//execute;
$categories = $statement2->fetchAll();
//Debugging only
// echo "<prep>";
// print_r($categories);
// echo "</prep>";
//Debuggin only
$statement2->closeCursor();

// Get products for the selected category
$queryProducts = 'SELECT * FROM sustainitems
WHERE sustainCategoryID = :sustaincategories_id
ORDER BY sustainCategoryID ';;
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':sustaincategories_id', $sustaincategories_id);
$statement3->execute(); //execute 
$products = $statement3->fetchAll();
//Debugging only
// echo "<prep>";
// print_r($products);
// echo "</prep>";
//Debugging only
$statement3->closeCursor();
?>
<html>
<!-- the head section -->

<head>
    <title>Sustainable Living Shop</title>
    <link rel="icon" href="../images/logo.png" type="image/png">
    <!-- <link rel="stylesheet" href=product.css />  -->
    <link rel="stylesheet" href="../style/product.css">
</head>
<!-- The body section -->

<body>
    <?php
include("header.php");
?>
    <main>
        <aside class = "container">
            <h2> Our shop provide:</h2>
            <table class="category-list">
                <!-- from the queryAllCategories -->
                <?php foreach ($categories as $category) : ?>
                    <tr  >
                        <a class="table-row" href="?sustaincategories_id=<?php  echo $category['sustainCategoryID']; ?>">
                            <button ><?php echo $category['sustainCategoryName']; ?></button>
                        </a>
                    </tr>
                <?php endforeach; ?>
            </table>
        </aside>

        <section class="container">
            <!-- display a table of products -->
            <h2><?php echo $category_name; ?></h2>
            <table class="responsive-table">
                <tr class="table-header">
                    <!-- <th> Category Name</th>  redudant code--> 
                    <th> Product Code</th>
                    <th> Product Name</th>
                    <th> Description</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr class="table-row">
                        <!-- <td> <?php echo $category_name; ?></td> -->
                        <!-- table bale item -->
                        <td><?php echo $product['sustainCode']; ?></td>
                        <td><?php echo $product['sustainName']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </section>
    </main>
</body>
<?php
include("footer.php");
?>;
</html>