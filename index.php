<?php
    $name = $_POST["email"];
    $email = $_POST["name"];
    $number = $_POST["name"];
    if (preg_match('/[а-яёА-ЯЁ]+/u', $name)) {
        setcookie("name",$name,time()+86400, "/");
    } 
    else {
        $name = 1;
    }
    if (strlen($number) == 11) {
        setcookie("number",$number,time()+86400, "/");
    } 
    else {
        $number = 1;
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
    <h1>Форма записи в базу данных</h1>
    <form id="form" action="http://95.213.139.91/MyForm/" method="POST">
        <div class="body">
            <div class="info">
                <div class="input">
                    <input name="name" id="name" type="text" value="<?php echo $_COOKIE["name"]; ?>" placeholder="Имя" required>
                    <span class="error"> <?php echo $name;?> </span>
                    <input name="number" id="number" type="number" value="<?php echo $_COOKIE["number"]; ?>" placeholder="Номер" required>
                    <span class="error"> <?php echo $number;?> </span>
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