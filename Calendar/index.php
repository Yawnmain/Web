<?php
require_once('./controllers/controller.php');

$controller = new Controller();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_tasks';
}

switch ($action) {
    case 'add_task':
        $controller->add_task();
        break;

    case 'edit_task':
        if (isset($_GET['id'])) {
            $controller->edit_task($_GET['id']);
        } else {
            header("Location: index.php");
        }
        break;

    case 'delete_task':
        if (isset($_GET['id'])) {
            $controller->delete_task($_GET['id']);
        } else {
            header("Location: index.php");
        }
        break;

    case 'complete_task':
        if (isset($_GET['id'])) {
            $controller->complete_task($_GET['id']);
        } else {
            header("Location: index.php");
        }
        break;
    case 'show_completed_tasks':
        $controller->show_completed_tasks();
        break;

    case 'delete_completed_task':
        if (isset($_GET['id'])) {
            $controller->delete_completed_task($_GET['id']);
        } else {
            header("Location: index.php");
        }
    case 'overdue_tasks':
        $controller->overdue_tasks();
        break;
    default:
        $controller->show_tasks();
        break;
}
