<?php
session_start();
$_SESSION = array();
session_destroy();
header('Expires: Thu, 21 Jul 1977 07:30:00 GMT'); // When yours truly first set eyes on this world! :)
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache'); // For HTTP/1.0 compatibility
header("Location: index.php"); // перенаправление на главную страницу после выхода
?>
