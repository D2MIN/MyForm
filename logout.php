<?php
session_start();
session_destroy();
$_SERVER['PHP_AUTH_USER'] = "";
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
