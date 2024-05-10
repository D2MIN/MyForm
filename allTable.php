<?php
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    $result = $db->query("SELECT * FROM users");
    $row = $result->fetch_assoc();

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
</head>
<body>
    <table border="1">
        <tr>
            <th>Header 1</th>
            <th>Header 2</th>
        </tr>
        <tr>
            <td>Row 1, Cell 1</td>
            <td>Row 1, Cell 2</td>
        </tr>
        <tr>
            <td>Row 2, Cell 1</td>
            <td>Row 2, Cell 2</td>
        </tr>
    </table>
</body>
</html>