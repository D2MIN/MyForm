<?php
session_start();
session_destroy();
// unset($_SERVER['HTTP_AUTHORIZATION']);
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
