<?php
session_start();
$_SESSION = array();
session_destroy();
unset($_SERVER['HTTP_AUTHORIZATION']);
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
