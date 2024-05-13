<?php
session_start();
$_SESSION = array();
session_destroy();
foreach ($_COOKIE as $name => $value) {
    setcookie($name, '', time() - 3600, '/');
}
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
