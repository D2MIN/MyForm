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

    // header("Location: lengStatus.php$")
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
            <h1>Статистика:</h1>
            <div class="lengs">
                <h4>Pascal : <?php echo $lengs['Pascal']?></h4>
                <h4>C : <?php echo $lengs['C']?></h4>
                <h4>C++ : <?php echo $lengs['C++']?></h4>
                <h4>JavaScript : <?php echo $lengs['JavaScript']?></h4>
                <h4>Php : <?php echo $lengs['Php']?></h4>
                <h4>Python : <?php echo $lengs['Python']?></h4>
                <h4>Java : <?php echo $lengs['Java']?></h4>
                <h4>Haskel : <?php echo $lengs['Haskel']?></h4>
                <h4>Clojure : <?php echo $lengs['Clojure']?></h4>
                <h4>Prolog : <?php echo $lengs['Prolog']?></h4>
                <h4>Scarse : <?php echo $lengs['Scarse']?></h4>
            </div>
        </div>
    </div>
</body>
</html>