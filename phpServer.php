<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setcookie("email", $email, time() + (86400 * 30), "/"); // 86400 = 1 day
    } else {
        $emailErr = "Invalid email format";
    }
}
?>

<html>
<body>

<form method="post" action="./phpServer.php">
    Email: <input type="text" name="email" value="<?php echo $_COOKIE["email"]; ?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>