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
if ($inactiveTime > 300) {
    session_destroy();
    header('Location: login.php');
    session_write_close();
    exit;
}

# Получение списка заявок из базы данных
$host = 'localhost';
$dbname = 'registration';
$username = 'yawnmain';
$password = '567tyu';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $pdo->prepare(
        "SELECT participants.id, participants.name, participants.lastname, participants.email,
                participants.tel, subjects.name AS subject_name, payments.name AS payment_name, participants.mailing 
         FROM participants 
         JOIN subjects ON participants.subject_id = subjects.id 
         JOIN payments ON participants.payment_id = payments.id 
         WHERE participants.deleted_at IS NULL"
    );
    $stmt->execute();
    $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo "Ошибка запроса: " . $exception->getMessage();
    die();
}

# Удаление заявок
if (isset($_POST['delete'])) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $pdo->prepare("UPDATE participants SET deleted_at = NOW() WHERE id = ?");
        foreach ($_POST['delete'] as $id) {
            $stmt->execute([$id]);
        }
    } catch (PDOException $exception) {
        echo "Ошибка запроса: " . $exception->getMessage();
        die();
    }

    header('Location: admin.php');
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
    <h1>Список заявок на конференцию</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="submit" name="logout" value="Выйти">
    </form>

    <?php
    if (count($applications) > 0) {
        echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
        echo '<table>';
        echo '<tr>';
        echo '<th>Имя</th>';
        echo '<th>Фамилия</th>';
        echo '<th>Email</th>';
        echo '<th>Телефон</th>';
        echo '<th>Тематика</th>';
        echo '<th>Метод оплаты</th>';
        echo '<th>Подписка</th>';
        echo '<th>Удалить</th>';
        echo '</tr>';
        foreach ($applications as $application) {
            echo '<tr>';
            echo '<td>' . $application['name'] . '</td>';
            echo '<td>' . $application['lastname'] . '</td>';
            echo '<td>' . $application['email'] . '</td>';
            echo '<td>' . $application['tel'] . '</td>';
            echo '<td>' . $application['subject_name'] . '</td>';
            echo '<td>' . $application['payment_name'] . '</td>';
            echo '<td>' . ($application['mailing'] == 1 ? 'Да' : 'Нет') . '</td>';
            echo "<td><input type='checkbox' name='delete[]' value='{$application['id']}'></td>";
            echo '</tr>';
        }
        echo '</table>';
        echo '<input type="submit" value="Удалить">';
        echo '</form>';
    } else {
        echo '<p>Заявок на конференцию нет</p>';
    }


    ?>

    <h3 class="main_btn">Уникальных посетителей: <?php echo count($_SESSION['visitors']); ?></h3>
    <h3 class="main_btn">Загрузок страницы: <?php echo $_SESSION['page_views']; ?></h3>
    <a class="main_btn" href="../index.html">Главная</a>
</body>

</html>