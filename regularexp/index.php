<?php
$str = '43242312';
$res = preg_match('/^\d+$/', $str, $matches);
echo "1. Целое число: \n";
print_r ($matches[0]);
echo '<br/>';

$str = '432fwqfw3223';
$res = preg_match('/^[a-zA-Z0-9]+$/', $str, $matches);
echo "2. Набор из букв и цифр (латиница): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '432fwqfw32мдущдуц23';
$res = preg_match('/^[a-zA-Zа-яА-Я0-9]+$/u', $str, $matches);
echo "3. Набор из букв и цифр (латиница + кириллица): \n";
print_r ($matches[0]);
echo '<br/>';

$str = 'google.com';
$res = preg_match('/^[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+[a-zA-Z0-9]$/', $str, $matches);
echo "4. Домен (google.com): \n";
print_r ($matches[0]);
echo '<br/>';

$str = 'Yawnishe671';
$res = preg_match('/^[a-zA-Z][a-zA-Z0-9]{2,24}$/', $str, $matches);
echo "5. Имя пользователя (с ограничением 3-25 символов, которыми могут быть буквы и цифры, первый символ обязательно буква): \n";
print_r ($matches[0]);
echo '<br/>';

$str = 'AbRaCadAbrA64682';
$res = preg_match('/^[a-zA-Z0-9]+$/', $str, $matches);
echo "6. Пароль (строчные и прописные латинские буквы, цифры): \n";
print_r ($matches[0]);
echo '<br/>';

$str = 'regExp123!';
$res = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $str, $matches);
echo "7. Пароль (строчные и прописные латинские буквы, цифры, спецсимволы, минимальная длина - 8 символов): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '2023-12-12';
$res = preg_match('/^\d{4}-\d{2}-\d{2}$/', $str, $matches);
echo "8. Дата в формате YYYY-MM-DD: \n";
print_r ($matches[0]);
echo '<br/>';

$str = '12/12/2023';
$res = preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $str, $matches);
echo "9. Дата в формате DD/MM/YYYY: \n";
print_r ($matches[0]);
echo '<br/>';

$str = '12.12.2023';
$res = preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $str, $matches);
echo "10. Дата в формате DD.MM.YYYY: \n";
print_r ($matches[0]);
echo '<br/>';

$str = '13:15:49';
$res = preg_match('/^\d{2}:\d{2}:\d{2}$/', $str, $matches);
echo "11. Время в формате HH:MM:SS: \n";
print_r ($matches[0]);
echo '<br/>';

$str = '13:15';
$res = preg_match('/^\d{2}:\d{2}$/', $str, $matches);
echo "12. Время в формате HH:MM: \n";
print_r ($matches[0]);
echo '<br/>';

$str = 'http://yandex.ru/';
$res = preg_match('/^(http:\/\/|https:\/\/)?[a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]\.[^\s]{2,}$/', $str, $matches);
echo "13. URL (http://yandex.ru/): \n";
print_r ($matches[0]);
echo '<br/>';

$str = 'bommba.671@yandex.ru';
$res = preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $str, $matches);
echo "14. E-mail (user@maildomain.com): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '94.137.192.81';
$res = preg_match('/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $str, $matches);
echo "15. IPv4 (94.137.192.81): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '2001:0:9d38:6abd:c70:2d3c:a176:3398';
$res = preg_match('/^([0-9a-fA-F]{1,4}:){7}[0-9a-fA-F]{1,4}$/', $str, $matches);
echo "16. IPv6 (2001:0:9d38:6abd:c70:2d3c:a176:3398): \n";
print_r ($matches[0]);
echo '<br/>';

$str = 'ec:23:3d:1b:7a:e7';
$res = preg_match('/^([0-9a-fA-F]{2}:){5}[0-9a-fA-F]{2}$/', $str, $matches);
echo "17. Mac-адрес (ec:23:3d:1b:7a:e7): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '+79021234567';
$res = preg_match('/^\+7[0-9]{10}$/', $str, $matches);
echo "18. Российский номер мобильного телефона (+79021234567): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '4048 4323 9889 3301';
$res = preg_match('/^4[0-9]{3}\s?[0-9]{4}\s?[0-9]{4}\s?[0-9]{4}$/', $str, $matches);
echo "19. Номер кредитной карты (4048 4323 9889 3301): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '380870115601';
$res = preg_match('/^([0-9]{10}|[0-9]{12})$/', $str, $matches);
echo "20. ИНН (3808753981 или 380870115601): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '666036';
$res = preg_match('/^[0-9]{6}$/', $str, $matches);
echo "21. Почтовый индекс (664000): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '2546,10 руб.';
$res = preg_match('/^\d+(\,\d{1,2})?\sруб.$/', $str, $matches);
echo "22. Цена в рублях (2546,10 руб.): \n";
print_r ($matches[0]);
echo '<br/>';

$str = '$39.99';
$res = preg_match('/^\$\d+(\.\d{1,2})?$/', $str, $matches);
echo "23. Цена в долларах ($39.99): \n";
print_r ($matches[0]);
echo '<br/>';

echo 'Упражнение 2 <br/>';
function getFileExt($filename) {
    return preg_replace('/^.*\.([^.]+)$/D', '$1', $filename);
  }

$filename = "dz.jpg";
$ext = getFileExt($filename);
echo "1. Из имени файла (например, picture.jpg) получите его расширение (например, jpg): \n";
echo $ext;
echo '<br/>';

function checkFormat($filename) {
    if (preg_match('/\.(zip|rar|7z)$/i', $filename)) {
      return 'архив';
    } elseif (preg_match('/\.(mp3|wav|flac)$/i', $filename)) {
      return 'аудиофайл';
    } elseif (preg_match('/\.(mp4|avi|mov)$/i', $filename)) {
      return 'видеофайл';
    } elseif (preg_match('/\.(jpg|jpeg|png|gif)$/i', $filename)) {
      return 'картинка';
    } else {
      return 'неизвестный формат';
    }
  }

$filename = "video.mp4";
$filetype = checkFormat($filename);
echo "2. По имени файла проверьте соответствует ли оно: \n";
echo $filetype;
echo '<br/>';


function getTitle($html) {
    preg_match('/<title>(.*?)<\/title>/is', $html, $matches);
    return $matches[1];
  }

$html = '<html><head><title>Document</title></head><body>blablabla</body></html>';
$title = getTitle($html);
echo "3. В произвольном HTML-коде найдите строку, заключенную в теги <title></title>: \n";
echo $title;
echo '<br/>';

function getLinks($html) {
    preg_match_all('/<a.*?href=[\'"](.*?)[\'"].*?>/is', $html, $matches);
    return $matches[1];
  }

$html = '<html><body><a href="https://bki.forlabs.ru/app/learning/157/studies/7687/tasks/8524"></a><a href="https://bki.forlabs.ru/app"></a></body></html>';
$links = getLinks($html);
echo "4. В произвольном HTML-коде найдите все ссылки в тегах <a> (атрибут href): \n";
print_r ($links);
echo '<br/>';

function getImageLinks($html) {
    preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/is', $html, $matches);
    return $matches[1];
  }

$html = '<html><body><img src="image1.png"><img src="panda.jpg"></body></html>';
$links = getImageLinks($html);
echo "5. В произвольном HTML-коде найдите все ссылки на картинки в тегах <img> (атрибут src): \n";
print_r ($links);
echo '<br/>';

function highlight($text, $string) {
    return preg_replace('/(' . preg_quote($string, '/') . ')/i', '<strong>$1</strong>', $text);
  }

$text = "Жирный текст";
$ans = highlight($text, 'Жирный');
echo "6. В произвольном тексте найдите и подсветите с помощью тега (strong) заданную строку: \n";
print_r ($ans);
echo '<br/>';

function Emoji($text) {
    $smileys = array(':)' => 'smile.png', ';)' => 'wink.png', ':(' => 'sad.png');
    foreach ($smileys as $smile => $image) {
      $text = preg_replace('/' . preg_quote($smile, '/') . '/', '<img src="' . $image . '" alt="' . $smile . '">', $text);
    }
    return $text;
  }

$text = ":), ;), :(";
$ans = Emoji($text);
echo "7. В произвольном тексте найдите определенный набор текстовых смайликов :), ;), :(на соответствующие им картинки: \n";
print_r ($ans);
echo '<br/>';

function removeSpace($text) {
    return preg_replace('/\s+/', ' ', $text);
  }

$text = "Привет!   Как    дела   ?";
$ans = removeSpace($text);
echo "8. В заданной строке избавьтесь от случайных повторяющихся пробелов.: \n";
print_r ($ans);
echo '<br/>';