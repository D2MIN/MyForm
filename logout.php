<?php
session_start();
$_SESSION = array();
session_destroy();
$_SERVER['PHP_AUTH_USER'] = "";
$_SERVER['PHP_AUTH_PW'] = "";
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
