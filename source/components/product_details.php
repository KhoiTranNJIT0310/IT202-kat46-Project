<?php
require_once('database_njit.php');
// <!-- Khoi Tran 
// April 19th 2024
// IT 202-002
// Phase 5 Assignment: Read SQL Data with PHP and JavaScript
// kat46@njit.edu -->

// get category ID
$sustain_code = filter_input(INPUT_GET, 'sustain_code');
// create condition for sustain_code

// Get product 
$queryProduct = 'SELECT * FROM sustainitems
WHERE sustainCode = :sustain_code
ORDER BY sustainCategoryID ';;
$statement = $db->prepare($queryProduct);
$statement->bindValue(':sustain_code', $sustain_code);
$statement->execute(); //execute 
$product = $statement->fetch();
$statement->closeCursor();
$exist_page = true;
if ($sustain_code == NULL || $sustain_code == false || $product == false) {
    $exist_page = false;
}
?>

<html>
<!-- the head section -->
<head>
    <title>Sustainable Living Shop</title>
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="../style/product.css">
</head>
<!-- The body section -->

<body>
    <?php
include("header.php");
?>
<?php if ($exist_page) { ?>
    <main>
        <aside class="container">
            <?php if ( isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) { ?>
            <div>Welcome
                <?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"]."! (". $_SESSION["emailAddress"].")" ?>
            </div>
            <?php }?>
            
        </aside>

        <section class="container">
            <!-- display a table of product detail -->
            <table class="responsive-table">
                <tr class="table-header">
                    <th> Product Code</th>
                    <th> Product Name</th>
                    <th> Description</th>
                    <th>Price</th>
                </tr>
                <tr class="table-row">
                    <!-- table bale item -->
                    <td><?php echo $product['sustainCode']; ?></td>
                    <td><?php echo $product['sustainName']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                </tr>
            </table>
        </section>
        <section class="container">
            <!-- display the image -->
                    <img class = "image" src="../images/details/<?php echo $product['sustainCode']; ?>.jpg" alt="<?php echo $product['sustainCode']; ?>.jpg"
                     width="30%" height="auto  ">
        </section>
    </main>

    <?php } else { ?>
        <h2> Page not exist!</h2>
    <?php }?>
</body>
<!-- script -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous">
</script>
<script>
    $(document).ready( () => {
    console.log("ready");
      // display color image
      $("img").mouseover( function() {
        // change the style blur
        $(this).css("filter", " blur(2px)");
        $(this).css("transition", ".2s ease-in-out");
      });
  
      // display bw image
    //   mouse on event
      $("img").mouseout( function() {
        // change back to normal
        $(this).css("filter", " blur(0px)");

      });
      
  
  });

</script>
<?php
include("footer.php");
?>;
</html>