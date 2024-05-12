<?php
$login = 'admin';
$password = 'secret';

if ($_SERVER['PHP_AUTH_USER'] != $login || $_SERVER['PHP_AUTH_PW'] != $password){
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die("Пожалуйста введите свой логин и пароль");
}
else{
    // sesion_start();
    // $_SESSION['admin'] = "true";
    header("Location: allTable.php");
}
?>
