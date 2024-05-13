<?php
$db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
if (!$db) {
    die('Error connecting to database: ' . mysqli_connect_error());
}
mysqli_set_charset($db, 'utf8');

// Получаем имя пользователя и пароль из заголовка Authorization
$auth = $_SERVER['HTTP_AUTHORIZATION'];
$auth = base64_decode(substr($auth, 6));
list($username, $pass) = explode(':', $auth);

$result = $db->query("SELECT * FROM admins WHERE login = '$username'");
$row = $result->fetch_assoc();
$login = $row['login'];
$password = $row['pass'];


if ($_SERVER['PHP_AUTH_USER'] != $login || $_SERVER['PHP_AUTH_PW'] != $password || $_SERVER['PHP_AUTH_USER'] == "" || $_SERVER['PHP_AUTH_PW'] == ""){
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die("Пожалуйста введите свой логин и пароль".$username.$pass);
}
else{
    $flag = "True";
    session_start();
    $_SESSION['admin'] = $flag;
    header("Location: allTable.php");
}
?>
