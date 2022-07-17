<?php
if(!isset($_SESSION['userName'])) {
    header("Location: views/login.php");
}else {
    header("Location: views/products.php");
}
?>
