<?php
# Проверяем, была ли отправлена форма
if (isset($_POST['username']) && isset($_POST['password'])) {
    # Получаем логин и пароль из формы
    $login = $_POST['username'];
    $password = $_POST['password'];

    # Проверяем, соответствуют ли введенные данные ожидаемым значениям
    if ($login === 'admin' && $password === '1234') {
        # Если данные верны, создаем сессию для пользователя
        session_start();
        $_SESSION['admin'] = true;

        # Перенаправляем пользователя на страницу администратора
        header('Location: admin.php');
        exit;
    } else {
        # Если данные неверны, выводим сообщение об ошибке
        echo '<h1>Неверный логин или пароль<h1>';
    }
}
?>