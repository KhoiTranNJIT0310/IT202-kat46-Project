<!-- Khoi Tran 
Febuary 16th 2024
IT 202-002
Phase 2 Assignment:  Read SQL Data using PHP
kat46@njit.edu -->
<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=my_sustain_shop';
$username = 'root';
$password = '';

try{
    $db = new PDO ($dsn, $username,$password);
    // echo '<h1> You have connected to the Sustainable Living Store </h1>';
}
catch (PDOException $ex){
    $error_message = $ex ->getMessage();
    include('database_error.php');
    exit();
}

?>