<?php
$answer = $_GET["answer"];

// Оибка в условиях где-то
if($_GET['exit'] == "exit"){
    echo $_GET['exit']." has been geted";
    unset($_SESSION['id']);
    session_destroy();
    header("Location: index.php");
} elseif(isset($_SESSION['id'])) {
    header("Location: change.php?");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST["login"];
    $password = $_POST["password"];
    if(!empty($_SESSION['user_id'])){
        header("Location:change.php?"."&id=".$_SESSION['id']);
    }
    
    
    // Подключение к базе данных
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    mysqli_set_charset($db, 'utf8');
    
    //Запрос к базе данных
    $result = $db->query("SELECT * FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $name = $row['name'];
    $number = $row['number'];
    $email = $row['mail'];
    $date = $row['date'];
    $about = $row['about'];
    $pass = $row['pass'];
    
    if($password == $pass){
        setcookie("nameC", $name, time()+5000,"/");
        setcookie("numberC", $number, time()+5000,"/");
        setcookie("emailC", $email, time()+5000,"/");
        setcookie("dateC", $date, time()+5000,"/");
        setcookie("aboutC", $about, time()+5000,"/");
        // Использование данных из сессии
        session_start();
        $_SESSION['id'] = $id;
        header("Location:change.php?");
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
            <p class="error"><?php echo $answer; ?></p>
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