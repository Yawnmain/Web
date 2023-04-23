<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$conferenceTheme = $_POST['topic'];
	$paymentMethod = $_POST['payment_method'];
	$subscribe = isset($_POST['newsletter']);

	// check fields
	if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($conferenceTheme) || empty($paymentMethod)) {
		echo 'Заполните все поля';
	} else {
		$fileName = 'data/' . date('YmdHis') . '.txt';
		$fileHandle = fopen($fileName, 'w');
		fwrite($fileHandle, "Имя: $firstName\n");
		fwrite($fileHandle, "Фамилия: $lastName\n");
		fwrite($fileHandle, "Электронный адрес: $email\n");
		fwrite($fileHandle, "Телефон: $phone\n");
		fwrite($fileHandle, "Тематика конференции: $conferenceTheme\n");
		fwrite($fileHandle, "Метод оплаты: $paymentMethod\n");
		fwrite($fileHandle, "Подписка: " . ($subscribe ? 'Да' : 'Нет') . "\n");
		fclose($fileHandle);
		echo 'Ваша заявка успешно отправлена';
	}
}
?>