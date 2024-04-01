<?php
// Khoi Tran 
// April  4th 2024
// IT 202-002
// Phase 4 Assignment:  PHP Authentication and Delete SQL Data
// kat46@njit.edu 
require_once("database_local.php");
function is_valid_admin_login($email, $password)
{

    $db = getDB();

    $query = 'SELECT firstName, lastName, emailAddress, password FROM sustainManagers WHERE emailAddress = :email';

    $statement = $db->prepare($query);

    $statement->bindValue(':email', $email);

    $statement->execute();

    $row = $statement->fetch();

    $statement->closeCursor();

    if ($row === false) {

        return false;
    } else {

        $hash = $row['password'];

        if (password_verify($password, $hash)){
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['emailAddress'] = $row['emailAddress'];
            return password_verify($password, $hash);
        }
    }
}
