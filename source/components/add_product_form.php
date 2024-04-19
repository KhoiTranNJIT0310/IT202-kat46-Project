<!-- Khoi Tran 
April 19th 2024
IT 202-002
Phase 5 Assignment: Read SQL Data with PHP and JavaScript
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
<html>

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
        <div>Welcome <?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"]."! (". $_SESSION["emailAddress"].")" ?>
        </div>
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
            <input type="text" name="code" id="code" placeholder=""><br>
            <p id="codeError"></p>
            <!-- Ask for the product name -->
            <label>Name:</label>
            <input type="text" name="name" id="name" placeholder=""><br>
            <p id="nameError"></p>
            <!-- Ask for the product description -->
            <label>Description:</label>
            <input type="text" name="description" id="description" placeholder=""><br>
            <p id="descriptionError"></p>
            <!-- Ask for the product price -->
            <label>List Price:</label>
            <input type="text" name="price" id="price" placeholder="Price must less than 30.00$"><br>
            <p id="priceError"></p>
            <!-- submit button -->
            <input class="button" id="submit_button" type="submit" value="Add Product"><br>
            <input class="button" type="reset" value="Reset" id="reset_button" />
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
<!-- Script -->
<script>
const clearErrors = () => {
    // clear /content for the error
    codeError.textContent = "";
    nameError.textContent = "";
    descriptionError.textContent = "";
    priceError.textContent = "";
};

const submit = (event) => {
    const code = document.querySelector("#code").value;
    const name = document.querySelector("#name").value;
    const description = document.querySelector("#description").value;
    const price = document.querySelector("#price").value;
// select all the error field
    const codeError = document.querySelector("#codeError");
    const nameError = document.querySelector("#nameError");
    const descriptionError = document.querySelector("#descriptionError");
    const priceError = document.querySelector("#priceError");

    clearErrors();

// create error line
    let invalid = false
    if (code == "" || code.length < 4 || code.length > 10) {
        codeError.textContent =
            "Product code cannot not be empty, must have a minimum of 4 characters and not exceed 10 characters";
        invalid = true;
    }
    if (name == "" || name.length < 10 || name.length > 100) {
        nameError.textContent =
            "Product name cannot not be empty, must have minimum of 10 characters and not exceed 100 characters";
        invalid = true;
    }
    if (description == "" || description.length < 10 || description.length > 255) {
        descriptionError.textContent =
            "Product description cannot not be empty, must have minimum of 10 characters and not exceed 255 characters";
        invalid = true;
    }

    if (price == "" || isNaN(price) || price <= 0 || price > 100000) {
        priceError.textContent =
            "Product price cannot not be empty, must be greater than 0 and not exceed 100,000$";
        invalid = true;
    }
    if (invalid) {
        event.preventDefault();
    }
}
const reset = () => {
    // reset all those field
    document.querySelector("#code").value = "";
    document.querySelector("#name").value = "";
    document.querySelector("#description").value = "";
    document.querySelector("#price").value = "";
    // clear the error field
    codeError.textContent = "";
    nameError.textContent = "";
    descriptionError.textContent = "";
    priceError.textContent = "";
}
document.addEventListener("DOMContentLoaded", () => {
    console.log("called");
    document.querySelector("#submit_button").addEventListener("click", submit);
    // reset the field
    document.querySelector("#reset_button").addEventListener("click", reset);
});
</script>

</html>