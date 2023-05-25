<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $indicesToDelete = isset($_POST['delete']) ? $_POST['delete'] : [];

    $data = file_get_contents('../data/applications.txt');

    $lines = explode(PHP_EOL, $data);
    $nonDeletedLines[] = $line;
    foreach (array_keys($lines) as $index) {
        if (strlen($lines[$index]) > 0 && !in_array($index, $indicesToDelete)) {
            $nonDeletedLines[] = $lines[$index];
        } else {
            $fields = explode('**', $lines[$index]);
            $fields[count($fields) - 1] = 'deleted';
            $nonDeletedLines[] = implode('**', $fields);
        }
    }

    $data = implode(PHP_EOL, $nonDeletedLines);
    file_put_contents('../data/applications.txt', $data);

    header('Location: admin.php');
    exit;
}
