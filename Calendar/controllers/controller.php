<?php
require_once('./models/model.php');

class Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Model();
    }

    function add_task()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->model->create_task($_POST);
            header("Location: index.php");
        }
        require_once('./views/add_task_view.php');
    }

    function edit_task($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->model->update_task($id, $_POST);
            header("Location: index.php");
        }
        $task = $this->model->get_task_by_id($id);
        require_once('./views/edit_task_view.php');
    }

    function delete_task($id)
    {
        $result = $this->model->delete_task($id);
        header("Location: index.php");
    }

    function show_tasks()
    {
        $tasks = $this->model->get_tasks();
        require_once('./views/show_tasks_view.php');
    }
    function complete_task($id)
    {
        $this->model->complete_task($id);
        header("Location: index.php");
    }
    function show_completed_tasks()
    {
        $completed_tasks = $this->model->get_completed_tasks();
        require_once('./views/completed_tasks.php');
    }

    function delete_completed_task($id)
    {
        $result = $this->model->delete_completed_task($id);
        header("Location: ../index.php?action=show_completed_tasks");
    }

    function overdue_tasks()
    {
        $overdue_tasks = $this->model->get_overdue_tasks();
        require_once('./views/overdue_tasks.php');
    }
}
