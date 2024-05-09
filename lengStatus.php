<?php
    // Conected to BD
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    mysqli_set_charset($db, 'utf8');

    $lengs = [];
    for($i = 0; $i <= 11; $i++){
        $result = $db->query("SELECT count(*) as leng FROM user_lengs WHERE leng_id = '$i'");
        $row = $result->fetch_assoc();
        $lengs[$i] =  $row['leng'];
    }

    for($i = 0; $i <= 11; $i++){
        print($lengs[$i]);
    }

    // $lengs = array(
    //     "1" => 0,
    //     "2" => 0,
    //     "3" => 0,
    //     "4" => 0,
    //     "5" => 0,
    //     "6" => 0,
    //     "7" => 0,
    //     "8" => 0,
    //     "9" => 0,
    //     "10" => 0,
    //     "11" => 0,
    // );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LengStatus</title>
</head>
<body>
    <div class="statusContent">
        <div class="inputStatus">
            <h1>Hello php site</h1>
        </div>
    </div>
</body>
</html>