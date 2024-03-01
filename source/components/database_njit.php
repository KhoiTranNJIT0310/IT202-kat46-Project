<?php
// slide 24
// For special case only
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