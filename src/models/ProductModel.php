<?php
require_once 'connection.php';
include '../entities/Product.php';
//get productos from database
function getProducts(): array {
    $products = [];
    $db = getConnection();
    $sql = "SELECT * FROM Product";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $product = new Product($row['Id'], $row['Name'], $row['Price'], $row['Stock']);
            array_push($products, $product);
        }
    }
    $db->close();
    return $products;
}