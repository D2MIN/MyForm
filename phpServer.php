<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        if($name == 'Roman'){
            setcookie("name",$name, time() + 86400,"/");
        }else{
            $nameErr = "invalid Name";
        }
    }

    echo "Ответ сервера ;) ";
?>

<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Email: <input type="text" name="email" value="<?php echo $_COOKIE["email"]; ?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>