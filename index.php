<?php
    $answer = $_GET['answer'];
    $strdate = $_GET['date'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $date = $_POST["date"];
        $gen = $_POST["gen"];
        $lengs = $_POST["leng"];
        $about = $_POST["about"];

        $flag = 0;

        setcookie("email", $email, time()+31536,"/");
        if (!preg_match('/^[а-яёА-ЯЁ]+$/u', $name)){
            setcookie("nameErr", 'error', time()+5000, "/");
            setcookie("name",'',time()-5000,"/");
            $flag = 1;
        }
        else{
            setcookie("nameErr", '', time()-5000, "/");
            setcookie("name",$name,time()+5000, "/");
        }
        if (strlen($number) != 11){
            setcookie("numberErr", 'error', time()+5000, "/");
            setcookie("number","",time()-5000);
            $flag = 1;
        }
        else{
            setcookie("number",$number,time()+5000, "/");
            setcookie("numberErr", '', time()-3600, "/");
        }

        if($flag == 1){
            header("Location: index.php?answer=".$answer);
        }else{
            //Отправка на server.js post запрос (Не проверял)
            $url = 'http://95.213.139.91:600/answer';
            $data = array(
                "name" => $name,
                "email" => $email,
                "number" => $number,
                "date" => $date,
                "lengs" => $lengs,
                "about" => $about
            );
            $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                ),
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $answer = "Данные отправлены!";
            header("Location: index.php?answer=".$answer,$strdate);
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма для записи</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1><?php echo $answer ?></h1>
    <h1><?php echo $date ?></h1>
    <h1>Форма записи в базу данных</h1>
    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="body">
            <div class="info">
                <div class="input">
                    <input class="<?php echo $_COOKIE['nameErr'] ?>" name="name" id="name" type="text" value="<?php echo $_COOKIE["name"]; ?>" placeholder="Имя" required>
                        <span class="span <?php echo $_COOKIE['nameErr'] ?>"> <?php if(isset($_COOKIE['nameErr'])) echo "Неверные символы" ?> </span>
                    <input class="<?php echo $_COOKIE['numberErr'] ?>" name="number" id="number" type="number" value="<?php echo $_COOKIE["number"]; ?>" placeholder="Номер" required>
                        <span class="span <?php echo $_COOKIE['numberErr'] ?>"> <?php if(isset($_COOKIE['numberErr'])) echo "Неправильное количество цифр" ?> </span>
                    <input name="email" id="email" type="email" value="<?php echo $_COOKIE["email"]; ?>" placeholder="Почта" required>
                    <input name="date" id="date" type="date" placeholder="" required>
                </div>
                <div class="cheked">
                    <div class="radio_pol">
                        <label>
                            <input name="gen" value="1" type="radio" required>Мужчина
                        </label>
                        <label>
                            <input name="gen" value="2" type="radio" required>Женщина
                        </label>
                    </div>
                    <div class="langvich_section">
                        <h4>Выберите язык программирования</h4>
                        <select multiple name="leng[]" class="langvich" name="langvich">
                            <option value="Pascal">Pascal</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="PHP">PHP</option>
                            <option value="Python">Python</option>
                            <option value="Java">Java</option>
                            <option value="Haskel">Haskel</option>
                            <option value="Clojure">Clojure</option>
                            <option value="Prolog">Prolog</option>
                            <option value="Scara">Scara</option>
                        </select>
                    </div>
                    <div class="textarea">
                        <h4>Напишите о себе</h4>
                        <textarea name="about" cols="30" rows="8" required></textarea>
                    </div>
                    <label>
                        <input class="custom-checkbox" type="checkbox" name="document" id="" required>Я согласен(а) c условиями <pre> </pre> <a href="#"> коденфиденциальности</a>
                    </label>
                </div>
            </div>
            <button class="button" type="submit">Отправить</button>
        </div>
    </form>
    <a href="http://95.213.139.91:600/tables"><button class="button" type="submit">Таблицы</button></a>
</body>
</html>