<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adm_style.css">
    <title>Список заявок на конференцию</title>
</head>
<body>
    <h1>Список заявок на конференцию</h1>
    <?php
    // get a list of files with applications
    $files = glob("data\*.txt");
    // check if there are any applications
    if (count($files) > 0) {
        // display a list of applications
        echo '<form method="post" action="delete.php">';
        echo '<table>';
        echo '<tr>';
        echo '<th>Имя</th>';
        echo '<th>Фамилия</th>';
        echo '<th>Email</th>';
        echo '<th>Телефон</th>';
        echo '<th>Тематика</th>';
        echo '<th>Метод оплаты</th>';
        echo '<th>Подписка на рассылку</th>';
        echo '<th>Удалить</th>';
        echo '</tr>';
        foreach ($files as $file) {
            $data = file($file);
            echo '<tr>';
            foreach ($data as $field) {
                echo "<td>$field</td>";
            }
            echo "<td><input type='checkbox' name='delete[]' value='$file'></td>";
            echo '</tr>';
        }
        echo '</table>';
        echo '<input type="submit" value="Удалить">';
        echo '</form>';
    } else {
        // info that there are no applications
        echo '<p>Заявок на конференцию нет</p>';
    }
    ?>
</body>
</html>
