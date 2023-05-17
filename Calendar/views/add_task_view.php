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
    <div class="center">
    <h1>Добавить задачу</h1>
    <form method="post" action="">
        <label>Тема:</label><br>
        <input type="text" name="title"><br>

        <label>Тип:</label><br>
        <select name="type">
            <option value="встреча">Встреча</option>
            <option value="звонок">Звонок</option>
            <option value="совещание">Совещание</option>
            <option value="дело">Дело</option>
        </select><br>

        <label>Место:</label><br>
        <input type="text" name="location"><br>

        <label>Дата и время:</label><br>
        <input type="datetime-local" name="datetime"><br>

        <label>Длительность:</label><br>
        <input type="number" name="duration"><br>

        <label>Комментарий:</label><br>
        <textarea name="comment"></textarea><br>

        <input type="submit" value="Добавить">
    </form>
    </div>
    <body>

</html>