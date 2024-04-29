<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    session_start();
    
    // Подключение к базе данных
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    mysqli_set_charset($db, 'utf8');

    //Запрос к базе данных
    $result = $db->query("SELECT pass FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    $pass = $row['pass'];
    echo "Pass: ".$pass;
    // if ($result->num_rows > 0) {
    //     // далее идет проверка пароля и т.д.
    // } else {
    //     echo "Пользователь с таким логином не найден";
    // }
    
    if($password == $pass){
        // Сохранение данных в сессию
        $_SESSION['login'] = $login;
    
        // Использование данных из сессии
        echo "Hello, " . $_SESSION['login'];
    }else{
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