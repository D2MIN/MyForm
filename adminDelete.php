<?php 
    $id = $_GET['id'];
    session_start();
    if(empty($_SESSION['admin'] || $_SESSION['admin'] == "True")){
        header("Location: index.php");
    }

    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    mysqli_set_charset($db, 'utf8');

    $db->query("DELETE FROM users WHERE id = '$id'");

    header("Location: admin.php")
?>