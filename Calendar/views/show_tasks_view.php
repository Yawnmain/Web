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
    
    <title>Мой календарь</title>
</head>

<body>
        <h1>Текущие задачи</h1>
        <div class="href_cont">
            <select onchange="window.location=this.value;" id="list">
                <option selected>Выберите действие</option>
                <option value="../index.php?action=add_task" id="1">Добавить задачу</option>
                <option value="../index.php?action=overdue_tasks" id="2">Просроченные задачи</option>
                <option value="../index.php?action=show_completed_tasks" id="3">Выполненные задачи</option>
                <option value="../index.php?action=show_tasks_by_date&date=<?php echo date('Y-m-d'); ?>" id="4">Задачи на сегодня</option>
                <option value="../index.php?action=show_tasks=">Все задачи</option>
            </select>

            <form action="../index.php" method="get" id="date">
                <input type="hidden" name="action" value="show_tasks_by_date">
                <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">
                <button type="submit">Искать</button>
            </form>
            <a href="index.php?action=show_tasks_today">Задачи на сегодня</a> |
            <a href="index.php?action=show_tasks_tomorrow">Задачи на завтра</a> |
            <a href="index.php?action=show_tasks_this_week">Задачи на эту неделю</a> |
            <a href="index.php?action=show_tasks_next_week">Задачи на следующую неделю</a>

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
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td>
                            <?php echo $task['title']; ?>
                        </td>
                        <td>
                            <?php echo $task['type']; ?>
                        </td>
                        <td>
                            <?php echo $task['location']; ?>
                        </td>
                        <td>
                            <?php echo date('d.m.Y H:i', strtotime($task['datetime'])); ?>
                        </td>
                        <td>
                            <?php echo $task['duration']; ?>
                        </td>
                        <td>
                            <?php echo $task['comment']; ?>
                        </td>
                        <td class="btns">
                            <a href="../index.php?action=complete_task&id=<?php echo $task['id']; ?>"
                                onclick="return confirm('Вы уверены?')" id="b3">Выполнено</a>  | 
                            <a href="../index.php?action=edit_task&id=<?php echo $task['id']; ?>" id="b1">Редактировать</a>  | 
                            <a href="../index.php?action=delete_task&id=<?php echo $task['id']; ?>"
                                onclick="return confirm('Вы уверены?')" id="b2">Удалить</a>
                        </td>
                    </tr>
                </tbody>
    <?php endforeach; ?>
    </table>

    <body>

</html>