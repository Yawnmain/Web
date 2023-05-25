<?php
require_once('./controllers/controller.php');

$model = new Model();
$controller = new Controller($model);

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

    case 'show_tasks_by_date':
        $date = $_GET['date'];
        $tasks = $controller->getModel()->get_tasks_by_date($date);

        require_once('./views/show_tasks_view.php');
        break;
    case 'show_tasks_today':
        $date = date('Y-m-d');
        $tasks = $controller->getModel()->get_tasks_by_date($date);
        require_once('./views/show_tasks_view.php');
        break;
    case 'show_tasks_tomorrow':
        $date = date('Y-m-d', strtotime("+1 day"));
        $tasks = $controller->getModel()->get_tasks_by_date($date);
        require_once('./views/show_tasks_view.php');
        break;

    case 'show_tasks_this_week':
        $current_day_of_week = date('w');
        $sunday = date('Y-m-d', strtotime("-{$current_day_of_week} day"));
        $saturday = date('Y-m-d', strtotime("+" . (6 - $current_day_of_week) . " day"));
        $tasks = $controller->getModel()->get_tasks_by_date_range($sunday, $saturday);
        require_once('./views/show_tasks_view.php');
        break;

    case 'show_tasks_next_week':
        $next_sunday = date('Y-m-d', strtotime('next Sunday'));
        $next_saturday = date('Y-m-d', strtotime('+6 days', strtotime($next_sunday)));
        $tasks = $controller->getModel()->get_tasks_by_date_range($next_sunday, $next_saturday);
        require_once('./views/show_tasks_view.php');
        break;
    default:
        $controller->show_tasks();
        break;
}
