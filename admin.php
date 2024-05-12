<?php
$realm = 'Restricted area';
$user = 'admin';
$password = 'secret';

if (!isset($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="' . $realm . '", qop="md5", nonce="' . md5(time()) . '", opaque="' . md5($realm) . '"');
    exit;
}

$data = explode(',', $_SERVER['HTTP_AUTHORIZATION']);
$digest = trim($data[1]);

$expected = md5($password . md5($_SERVER['REQUEST_METHOD'] . ':' . $data[2]));

if ($digest != $expected) {
    header('Location:admin.php');
    exit;
}

// Авторизация пройдена успешно
echo 'Welcome, ' . $user;
// echo '<a href="http://95.213.139.91/MyForm/form.php"><button>Я новый пользователь</button></a>'
// echo '<a href="http://95.213.139.91/MyForm/allTable.php"><button>Посмотреть таблицу</button></a>'
?>