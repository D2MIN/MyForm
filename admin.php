<?php
$db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
if (!$db) {
    die('Error connecting to database: ' . mysqli_connect_error());
}
mysqli_set_charset($db, 'utf8');

if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    $auth = $_SERVER['HTTP_AUTHORIZATION'];
    $auth = base64_decode(substr($auth, 6));
    list($username, $password) = explode(':', $auth);
}

$result = $db->query("SELECT * FROM users WHERE id = '$username'");
$row = $result->fetch_assoc();
$login = $row['login'];
$password = $row['pass'];


if ($_SERVER['PHP_AUTH_USER'] != $login || $_SERVER['PHP_AUTH_PW'] != $password){
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die("Пожалуйста введите свой логин и пароль");
}
else{
    $flag = "True";
    session_start();
    $_SESSION['admin'] = $flag;
    header("Location: allTable.php");
}
?>
