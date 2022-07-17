<?php
function getConnection(): mysqli {
    $host = "localhost:3306";
    $user = "root";
    $pass = "eC#Q5X&vyaXH";
    $db = "db_pa_semana06";
    $connection = new mysqli($host, $user, $pass, $db);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}

function destroyConnection($connection): bool {
    $connection->close();
    return true;
}