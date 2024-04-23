<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin") {
        header('Location: /');
    }
}
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
                <input name="name" type="text" value="<?php echo $username; ?>">
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