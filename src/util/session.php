<?php
session_start();
const SESSION_TIMEOUT = 1800;
function validateSession(): void {
    if(!isset($_SESSION['userName'])) {
        header("Location: login.php");
    }else {
        if(isset($_SESSION['timeout'])) {
            $session_life = time() - $_SESSION['timeout'];
            if($session_life > SESSION_TIMEOUT) {
                session_destroy();
                header("Location: login.php");
            }
        }
        $_SESSION['timeout'] = time();
    }
}

function createSession($user) {
    session_start();
    $_SESSION['userId'] = $user->getId();
    $_SESSION['userName'] = $user->getEmail();
    $_SESSION['name'] = $user->getName();
    $_SESSION['timeout'] = time();
}