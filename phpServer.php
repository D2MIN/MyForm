<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        if($name == 'Roman'){
            setcookie("name",$name, time() + 86400,"/");
        }else{
            $nameErr = "invalid Name";
        }
    }
?>
