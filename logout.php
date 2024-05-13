<?php
session_start();
$_SESSION = array();
session_destroy();
header('Authorization:');
header('WWW-Authenticate: Basic realm=""');
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
