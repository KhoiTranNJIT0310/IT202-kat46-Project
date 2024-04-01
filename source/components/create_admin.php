<?php
require_once("database_local.php");
function addsustainmanager($email, $password, $firstName, $lastName) {
   $db = getDB();
   $hash = password_hash($password, PASSWORD_DEFAULT);
   $query = 'INSERT INTO sustainManagers (emailAddress, password, firstName, lastName, dateCreated)
             VALUES (:email, :password, :firstName, :lastName, NOW() )';
   $statement = $db->prepare($query);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':password', $hash);
   $statement->bindValue(':firstName', $firstName);
   $statement->bindValue(':lastName', $lastName);
   $success = $statement->execute();
   $statement->closeCursor();
   echo"<p> Your create admin statement status is $success </p>";
}
addsustainmanager("kat46@njit.edu","123", "Khoi", "Tran");
addsustainmanager("kma@gmail.com","234", "Anh", "Nguyen");
addsustainmanager("mnp@gmail.com","345", "Phuong", "Nguyen");
addsustainmanager("hdh@gmail.com","456", "Hang", "Hoang");
addsustainmanager("mtt@gmail.com","567", "Thuy", "Mai");
?>