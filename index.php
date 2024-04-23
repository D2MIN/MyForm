<?php 

    $username = $_GET['name'];
    $password = $_GET['password'];

    if($username == 'admin' && $password == "admin"){
        header('https://www.youtube.com/watch?v=sEpXl-AbvrA&t=987s');
    }else{
        header('/');
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="content">
        <div class="loginForm">
            <h1>Войдите что бы менять таблицу</h1>
            <form action="">
                <input name="name" type="text">
                <input name="password" type="password">
                <div class="buttons">
                    <button>Вход</button>
                </div>
            </form>
            <a href="http://95.213.139.91/MyForm/form.php"><button>Я новый пользователь</button></a>
        </div>
    </div>
</body>
</html>