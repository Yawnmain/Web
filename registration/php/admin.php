<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adm_style.css">
    <title>Список заявок на конференцию</title>
</head>

<body>
    <h1>Список заявок на конференцию</h1>
    <?php
    $fileContent = file_get_contents('../data/applications.txt');
    $applications = explode(PHP_EOL, $fileContent);
    $nonDeletedApplications = array_filter($applications, function ($application) {
        $fields = explode('**', $application);
        return count($fields) > 1 && $fields[count($fields) - 1] !== 'deleted';
    });

    if (count($nonDeletedApplications) > 0) {
        echo '<form method="post" action="delete.php">';
        echo '<table>';
        echo '<tr>';
        echo '<th>Дата</th>';
        echo '<th>IP</th>';
        echo '<th>Имя</th>';
        echo '<th>Фамилия</th>';
        echo '<th>Email</th>';
        echo '<th>Телефон</th>';
        echo '<th>Тематика</th>';
        echo '<th>Метод оплаты</th>';
        echo '<th>Подписка</th>';
        echo '<th>Удалить</th>';
        echo '</tr>';
        foreach ($nonDeletedApplications as $index => $application) {
            $fields = explode('**', $application);
            echo '<tr>';
            echo "<input type='hidden' name='index[]' value='$index'>";
            foreach (array_slice($fields, 0, count($fields) - 1) as $field) {
                echo "<td>$field</td>";
            }
            echo "<td><input type='checkbox' name='delete[]' value='$index'></td>";
            echo '</tr>';
        }
        echo '</table>';
        echo '<input type="submit" value="Удалить">';
        echo '</form>';
    } else {
        echo '<p>Заявок на конференцию нет</p>';
    }
    ?>
</body>

</html>