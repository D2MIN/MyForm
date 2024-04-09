<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        if(preg_match('/[а-яёА-ЯЁ]+/u', $name)){
            setcookie("name",$name, time() + 86400,"/");
        }else{
            $nameErr = "invalid Name";
        }
    }

    echo "Ответ сервера ;) ";
?>

<html>
<body>

<form method="post" action="POST">
    Email: <input type="text" name="name" value="<?php echo $_COOKIE["name"]; ?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>