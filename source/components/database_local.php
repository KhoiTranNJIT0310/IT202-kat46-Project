<?php
// Khoi Tran 
// April  4th 2024
// IT 202-002
// Phase 4 Assignment:  PHP Authentication and Delete SQL Data
// kat46@njit.edu 
function getDB(){
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
return $db;
}
?>