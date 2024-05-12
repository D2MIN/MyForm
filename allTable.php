<?php
    session_start();
    if(empty($_SESSION['admin']) || $_SESSION['admin'] != "True"){
        header('Location: index.php');
    }

    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    $result = $db->query("SELECT * FROM users");
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
                    </tr>"
                );
            }
        ?>
    </table>
    <div>
        <input type="text" placeholder="id">
        <button class="change" >Изменить</button>
        <button class="delete" >Удалить</button>
    </div>
    <a href="http://95.213.139.91/MyForm/lengStatus.php"><button>Посмотреть статиcтику</button></a>
    <a href="logout.php"><button name="exit" type="submit">Выход</button><a/>
</body>
<script src="admin.js" defer></script>
</html>