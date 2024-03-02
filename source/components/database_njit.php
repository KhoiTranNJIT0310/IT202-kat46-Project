<?php
// Khoi Tran 
// Febuary 16th 2024
// IT 202-002
// Phase 2 Assignment:  Read SQL Data using PHP
// kat46@njit.edu 
$dsn = "mysql:host=sql1.njit.edu;port=3306;dbname=kat46";
$username = "kat46";
$password = "Amvnx2023@";
try {
    $db = new PDO($dsn, $username, $password);
    // echo '<h1> You are connected to the local database!</h1>';

}
catch (Exception $ex) {
    $error_message = $ex ->getMessage();
    include('database_error.php');
    exit();
}
?>