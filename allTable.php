<?php
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    $result = $db->query("SELECT * FROM users");
    // $row = $result->fetch_assoc();

    // while ($row = $result->fetch_assoc()) {
    //     echo '<tr>';
    //     echo '<td>' . $row['name'] . '</td>';
    //     echo '<td>' . $row['number'] . '</td>';
    //     echo '<td>' . $row['mail'] . '</td>';
    //     echo '<td>' . $row['date'] . '</td>';
    //     echo '<td>' . $row['gen'] . '</td>';
    //     echo '<td>' . $row['about'] . '</td>';
    //     echo '</tr>';
    // }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tables</title>
    <link rel="stylesheet" href="css/allTables.css">
</head>
<body>
    <table border="0">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Mail</th>
            <th>Date</th>
            <th>Gender</th>
            <th>About</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()){
                print(
                    "<tr>
                        <td>". $row['name'] ."</td>
                        <td>". $row['number'] ."</td>
                        <td>". $row['mail'] ."</td>
                        <td>". $row['date'] ."</td>
                        <td>". $row['gen'] ."</td>
                        <td>". $row['about'] ."</td>
                    </tr>".
                    "<button>Изменить</button>"."<button>Удалить</button>"
                );
            }
        ?>
    </table>
    <a href="http://95.213.139.91/MyForm/lengStatus.php"><button>Посмотреть статиcтику</button></a>
    <a href="index.php"><button>Назад</button></a>
</body>
</html>