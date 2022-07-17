<?php
require_once '../../models/UserModel.php';
require_once '../../util/session.php';
require_once '../../entities/User.php';

//get email and password from login form
$email = $_POST['email'];
$password = $_POST['password'];
//get user from database
$user = getUserByEmailAndPassword($email, $password);
//if user is not null
if($user != null) {
    //create session for user
    createSession($user);
    //redirect to home page
   header('Location: ../../views/products.php');
}else {
    //redirect to login page
    header('Location: ../../views/login.php');
}