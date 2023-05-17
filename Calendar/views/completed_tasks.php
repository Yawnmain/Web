<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <title>Регистрация на конференцию</title>
</head>

<body>
    <div class="center">
        <table>
            <th>Тема</th>
            <th>Тип</th>
            <th>Место</th>
            <th>Дата и время</th>
            <th>Длительность</th>
            <th>Комментарий</th>
            <th>Время выполнения</th>

            <?php
            foreach ($completed_tasks as $task) : ?>
                <tr>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo $task['type']; ?></td>
                    <td><?php echo $task['location']; ?></td>
                    <td><?php echo date('d.m.Y H:i', strtotime($task['datetime'])); ?></td>
                    <td><?php echo $task['duration']; ?></td>
                    <td><?php echo $task['comment']; ?></td>
                    <td><?php echo date('d.m.Y H:i:s', strtotime($task['completed_at'])); ?></td>
                    <td><a href="../index.php?action=delete_completed_task&id=<?php echo $task['id']; ?>" onclick="return confirm('Вы уверены?')" id="b2">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="../index.php" id="4">Back to tasks</a>
    </div>
</body>

</html>