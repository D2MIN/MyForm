<?php
    $db = mysqli_connect('localhost', 'd2min', 'Qwerty40982', 'Form');
    if (!$db) {
        die('Error connecting to database: ' . mysqli_connect_error());
    }
    $result = $db->query("SELECT * FROM users");
    // $row = mysqli_fethc_assoc($result);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['column_name1'] . '</td>';
        echo '<td>' . $row['column_name2'] . '</td>';
        echo '<td>' . $row['column_name3'] . '</td>';
        echo '</tr>';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tables</title>
</head>
<body>
    <h1>Empty Project</h1>
</body>
</html>