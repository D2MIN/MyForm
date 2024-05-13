<?php
session_start();
$_SESSION = array();
session_destroy();
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Authorization:');
header('WWW-Authenticate: Basic realm=""');
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
