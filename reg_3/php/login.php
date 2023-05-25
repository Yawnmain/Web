<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adm_style.css">
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>
    <form method="post" action="log.php">
        <label for="username">Логин:</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" value="Войти">
    </form>
</body>
</html>
