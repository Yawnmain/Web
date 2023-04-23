<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['delete'])) {
        // list of applications to be deleted
        $toDelete = $_POST['delete'];
        foreach ($toDelete as $file) {
            // del file
            unlink($file);
        }
    }
    header('Location: admin.php');
    exit;
}
?>