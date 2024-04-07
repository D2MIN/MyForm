<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];

    echo "Name: $name<br>";
    echo "Message: $message<br>";
  }
?>