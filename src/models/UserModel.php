<?php
require_once 'connection.php';
function getUserByEmailAndPassword($email, $password) {
    $user = null;
    $db = getConnection();
    $sql = "SELECT * FROM User WHERE Email = '$email'";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['Password'])) {
            $user = new User($row['Id'], $row['Name'], $row['LastName'], $row['Email'], $row['Password'], $row['CreatedAt'], $row['IsActive']);
        }
    }
    $db->close();
    return $user;
}