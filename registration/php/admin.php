<?php
session_set_cookie_params(300);
session_start();

# Проверяем, авторизован ли пользователь
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    session_write_close();
    exit;
}

# Функция выхода из системы
if (isset($_POST['logout'])) {
    session_regenerate_id(true);
    session_destroy();
    header('Location: login.php');
    session_write_close();
    exit;
}

# Обновляем время последней активности пользователя
if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
}

# Проверяем, сколько времени прошло с момента последней активности
$inactiveTime = (time() - ($_SESSION['last_activity']));

# Если прошло более 10 сек бездействия, разлогиниваем пользователя
if ($inactiveTime > 10) {
    session_destroy();
    header('Location: login.php');
    session_write_close();
    exit;
}

# Подсчет уникальных посетителей по IP
$ip = $_SERVER['REMOTE_ADDR'];
if (!isset($_SESSION['visitors']) || !in_array($ip, $_SESSION['visitors'])) {
    $_SESSION['visitors'][] = $ip;
}

# Подсчет загрузок страницы
if (isset($_SESSION['page_views'])) {
    $_SESSION['page_views']++;
} else {
    $_SESSION['page_views'] = 1;
}

header("Cache-Control: no-cache, must-revalidate");
?>
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
    <?php
    $fileContent = file_get_contents('../data/applications.txt');
    $applications = explode(PHP_EOL, $fileContent);
    $nonDeletedApplications = array_filter($applications, function ($application) {
        $fields = explode('**', $application);
        return count($fields) > 1 && $fields[count($fields) - 1] !== 'deleted';
    });
    ?>

    <h1>Список заявок на конференцию</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="submit" name="logout" value="Выйти">
    </form>

    <?php
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

    echo '<a href="../index.html">Главная</a>';

    ?>

    <h3>Уникальных посетителей: <?php echo count($_SESSION['visitors']); ?></h3>
    <h3>Загрузок страницы: <?php echo $_SESSION['page_views']; ?></h3>
</body>

</html>