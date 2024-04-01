
<?php
// Khoi Tran 
// April  4th 2024
// IT 202-002
// Phase 4 Assignment:  PHP Authentication and Delete SQL Data
// kat46@njit.edu 

require_once('admin_db.php');
// start sesion
session_start();
// get the input 
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');


if (is_valid_admin_login($email, $password)) {

  $_SESSION['is_valid_admin'] = true;
  // redirect logged in user to default page

  echo "<p>You have successfully logged in.</p>";
  //  ì success go to landing page
  require_once("landing.php");
} else {
  // if not go to login page again
 if ($email == NULL && $password == NULL) {

  $login_message ='You must login to view this page.';

 } else {

  $login_message = 'Invalid credentials.';

 }

  include('login.php');

}

?>