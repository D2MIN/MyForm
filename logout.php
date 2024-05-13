<?php
session_start();
$_SESSION = array();
session_destroy();
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
header('Pragma: no-cache');
header('Authorization:');
header('WWW-Authenticate: Basic realm=""');
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
