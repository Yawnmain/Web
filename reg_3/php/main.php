<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $conferenceTheme = $_POST['topic'];
    $paymentMethod = $_POST['payment_method'];
    $subscribe = isset($_POST['newsletter']);
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $timestamp = date('Y-m-d H:i:s');

    $separator = '**';

    // check fields
    if (
        strpos($firstName, $separator) !== false
        || strpos($lastName, $separator) !== false
        || strpos($email, $separator) !== false
        || strpos($phone, $separator) !== false
        || strpos($conferenceTheme, $separator) !== false
        || strpos($paymentMethod, $separator) !== false
        || strpos($ipAddress, $separator) !== false
        || strpos($timestamp, $separator) !== false
    ) {
        echo 'Введенный разделитель недопустим';
    } else {

        $data = $timestamp . $separator . $ipAddress . $separator . $firstName . $separator . $lastName . $separator . $email . $separator . $phone . $separator . $conferenceTheme . $separator . $paymentMethod . $separator . ($subscribe ? 'Да' : 'Нет') . $separator . 'active';

        file_put_contents('../data/applications.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);

        echo 'Ваша заявка успешно отправлена';
    }
}
