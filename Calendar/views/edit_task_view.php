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
        <h1>Редактировать задачу</h1>
        <form method="post" action="">
            <label>Тема:</label><br>
            <input type="text" name="title" value="<?php echo $task['title']; ?>"><br>

            <label>Тип:</label><br>
            <select name="type">
                <option value="встреча" <?php if ($task['type'] == 'встреча') echo 'selected'; ?>>Встреча</option>
                <option value="звонок" <?php if ($task['type'] == 'звонок') echo 'selected'; ?>>Звонок</option>
                <option value="совещание" <?php if ($task['type'] == 'совещание') echo 'selected'; ?>>Совещание</option>
                <option value="дело" <?php if ($task['type'] == 'дело') echo 'selected'; ?>>Дело</option>
            </select><br>
            <label>Место:</label><br>
            <input type="text" name="location" value="<?php echo $task['location']; ?>"><br>

            <label>Дата и время:</label><br>
            <input type="datetime-local" name="datetime" value="<?php echo date('Y-m-d\TH:i', strtotime($task['datetime'])); ?>"><br>

            <label>Длительность:</label><br>
            <input type="number" name="duration" value="<?php echo $task['duration']; ?>"><br>

            <label>Комментарий:</label><br>
            <textarea name="comment"><?php echo $task['comment']; ?></textarea><br>

            <input type="submit" value="Сохранить">
    </div>

    <body>

</html>