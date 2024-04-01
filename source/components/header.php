<!DOCTYPE html>
 <!-- Khoi Tran 
 April  4th 2024
 IT 202-002
 Phase 4 Assignment:  PHP Authentication and Delete SQL Data
kat46@njit.edu  -->
<html>

<head>
    <link rel="stylesheet" href="../style/header.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
</head>

<body>
    <figure>
        <!-- wrapper that cover the whole upper page -->
        <div class="navbar-wrapper">
            <header>
                <div class="navbar">
                    <div class='navbar-left'>
                        <!-- Our lego -->
                        <a class="navbar-title" href="landing.php">Home</a>
                        <!-- <svg class="menulist" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" /></svg> -->
                    </div>
                    <div class="navbar-right">
                        <?php
                        if(session_status()===PHP_SESSION_NONE){
                            session_start();
                        };
                        if (isset($_SESSION['is_valid_admin'])) { ?>
                        <!-- Create product page -->
                            <a class="navbar-title" href="add_product_form.php">Create</a>
                            <!-- Product page -->
                            <a class="navbar-title" href="product.php">Product</a>
                            <!-- shipping page -->
                            <a class="navbar-title" href="shipping.php">Shipping</a>
                            <a class="navbar-title" href="logout.php">Logout</a>
                        <?php } else { ?>
                            <a class="navbar-title" href="product.php">Product</a>  
                            <a class="navbar-title" href="login.php">Login</a>
                        <?php } ?>
                        

                    </div>
                </div>
            </header>
        </div>
    </figure>
</body>

</html>