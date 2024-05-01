<?php
$answer = $_POST["answer"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    
    // Подключение к базе данных
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    mysqli_set_charset($db, 'utf8');
    
    //Запрос к базе данных
    $result = $db->query("SELECT id,pass FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    $pass = $row['pass'];
    $id = $row['id'];
    
    if($password == $pass){
        // Использование данных из сессии
        header("Location:change.php?"."&id=".$id);
    }else{
        $answer = "Неправильный пароль";
        header("Location:index.php?answer=".$answer);
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
            <p>Ответ: <?php echo $answer; ?></p>
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