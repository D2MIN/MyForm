<?php
header('WWW-Authenticate: Basic realm="Restricted Area"');
header('HTTP/1.0 401 Unauthorized');
$login = 'admin';
$password = 'secret';

if ($_SERVER['PHP_AUTH_USER'] != $login || $_SERVER['PHP_AUTH_PW'] != $password){
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die("Пожалуйста введите свой логин и пароль");
}
else{
    $flag = "True";
    session_start();
    $_SESSION['admin'] = $flag;
    header("Location: allTable.php");
}
?>
