<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST["login"];
    $password = $_POST["password"];

    session_start();
    // Подключение к базе данных
    $db = new mysqli('localhost', 'd2min', 'Qwerty40982', 'Form');

    // Запрос к базе данных
    $result = $db->query("SELECT pass FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    $hash = $row['pass'];

    if(password_verify($password, $hash)){
        // Сохранение данных в сессию
        $_SESSION['login'] = $login;

        // Использование данных из сессии
        echo "Hello, " . $_SESSION['login'];
    } else {
        echo "Неправильный пароль";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="content">
        <div class="loginForm">
            <h1>Войдите что бы менять таблицу</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
                <input name="login" type="text" placeholder="Login">
                <input name="password" type="password" placeholder="Password">
                <div class="buttons">
                    <button>Вход</button>
                </div>
            </form>
            <a href="http://95.213.139.91/MyForm/form.php"><button>Я новый пользователь</button></a>
        </div>
    </div>
</body>
</html>