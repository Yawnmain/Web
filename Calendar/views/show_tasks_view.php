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
    <h1>Текущие задачи</h1>
    <div class="href_cont">
        <div class="bg">
            <a href="../index.php?action=add_task" id="1">Добавить задачу</a>
        </div>
        <div class="bg">
            <a href="overdue_tasks.php" id="2">Просроченные задачи</a>
        </div>
        <div class="bg">
            <a href="completed_tasks.php" id="3">Выполненные задачи</a>
        </div>
    </div>
    <table cellspacing="0">
        <tbody>
        <tr>
            <th>Тема</th>
            <th>Тип</th>
            <th>Место</th>
            <th>Дата и время</th>
            <th>Длительность</th>
            <th>Комментарий</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?php echo $task['title']; ?></td>
                <td><?php echo $task['type']; ?></td>
                <td><?php echo $task['location']; ?></td>
                <td><?php echo date('d.m.Y H:i', strtotime($task['datetime'])); ?></td>
                <td><?php echo $task['duration']; ?></td>
                <td><?php echo $task['comment']; ?></td>
                <td class="btns">
                    <a href="../index.php?action=edit_task&id=<?php echo $task['id']; ?>" id="b1">Редактировать</a>
                    <div>|</div>
                    <a href="../index.php?action=delete_task&id=<?php echo $task['id']; ?>" onclick="return confirm('Вы уверены?')" id="b2">Удалить</a>
                </td>
            </tr>
        </tbody>
        </div>
        <?php endforeach; ?>
    </table>

    <body>

</html>