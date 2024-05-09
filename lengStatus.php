<?php
    // Conected to BD
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    mysqli_set_charset($db, 'utf8');

    $countLeng = [];
    for($i = 0; $i <= 11; $i++){
        $result = $db->query("SELECT count(*) as leng FROM user_lengs WHERE leng_id = '$i'");
        $row = $result->fetch_assoc();
        $countLeng[$i] =  $row['leng'];
    }

    $lengs = array(
        "Pascal" => $countLeng[0],
        "C" => $countLeng[1],
        "C++" => $countLeng[2],
        "JavaScript" => $countLeng[3],
        "Php" => $countLeng[4],
        "Python" => $countLeng[5],
        "Java" => $countLeng[6],
        "Haskel" => $countLeng[7],
        "Clojure" => $countLeng[8],
        "Prolog" => $countLeng[9],
        "Scarse" => $countLeng[10],
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lengStatus.css">
    <title>LengStatus</title>
</head>
<body>
    <div class="statusContent">
        <div class="inputStatus">
            <h1>Статистика:</h1>
            <div class="lengs">
                <h3>Pascal : <?php echo $lengs['Pascal']?></h3>
                <h3>C : <?php echo $lengs['C']?></h3>
                <h3>C++ : <?php echo $lengs['C++']?></h3>
                <h3>JavaScript : <?php echo $lengs['JavaScript']?></h3>
                <h3>Php : <?php echo $lengs['Php']?></h3>
                <h3>Python : <?php echo $lengs['Python']?></h3>
                <h3>Java : <?php echo $lengs['Java']?></h3>
                <h3>Haskel : <?php echo $lengs['Haskel']?></h3>
                <h3>Clojure : <?php echo $lengs['Clojure']?></h3>
                <h3>Prolog : <?php echo $lengs['Prolog']?></h3>
                <h3>Scarse : <?php echo $lengs['Scarse']?></h3>
            </div>
        </div>
    </div>
</body>
</html>