<?php
//create funcion for create password hash for user password
function createPasswordHash($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}
