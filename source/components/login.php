<?php 
// Khoi Tran 
// April  4th 2024
// IT 202-002
// Phase 4 Assignment:  PHP Authentication and Delete SQL Data
// kat46@njit.edu 

// create a login mesage
if (!isset($login_message)) {
$login_message = 'You must login to view this page.';
}
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Sustainable Store Login Page</title>
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="../style/create.css">

 </head>
 <body style="background-color: #E7F9D5;">
  <header  class="container" >
   <h1>My Sustain Shop</h1>
   <h1>Login</h1>
   </header>
 <main>
   
   <form action="authenticate.php" method="post" class="create_product_form">
     <label>Email:</label>
     <input type="text" name="email" value="">
     <br>
     <label>Password:</label>
     <input type="password" name="password" value="">
     <br>
     <input class="button" type="submit" value="Login">
   </form>
   <div class="container" ><h1><?php echo $login_message; ?></h1> </div>
 </main>
 </body>
</html>