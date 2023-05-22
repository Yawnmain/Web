<?php
class Model {
    // Подключение к базе данных
    private $db;

    function __construct() {
        $this->db = new mysqli('localhost', 'yawnmain', '567tyu', 'my_calendar');
        if ($this->db->connect_error) {
            die("Ошибка подключения: " . $this->db->connect_error);
        }
    }

    function get_tasks() {
        $query = "SELECT * FROM tasks";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function create_task($data) {
        $title = $this->db->real_escape_string($data['title']);
        $type = $this->db->real_escape_string($data['type']);
        $location = $this->db->real_escape_string($data['location']);
        $datetime = date('Y-m-d H:i:s', strtotime($data['datetime']));
        $duration = intval($data['duration']);
        $comment = $this->db->real_escape_string($data['comment']);

        $query = "INSERT INTO tasks (title, type, location, datetime, duration, comment) VALUES ('$title', '$type', '$location', '$datetime', $duration, '$comment')";
        return $this->db->query($query);
    }

    function get_task_by_id($id) {
        $query = "SELECT * FROM tasks WHERE id=$id";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    function update_task($id, $data) {
        $title = $this->db->real_escape_string($data['title']);
        $type = $this->db->real_escape_string($data['type']);
        $location = $this->db->real_escape_string($data['location']);
        $datetime = date('Y-m-d H:i:s', strtotime($data['datetime']));
        $duration = intval($data['duration']);
        $comment = $this->db->real_escape_string($data['comment']);

        $query = "UPDATE tasks SET title='$title', type='$type', location='$location', datetime='$datetime', duration=$duration, comment='$comment' WHERE id=$id";
        return $this->db->query($query);
    }

    function delete_task($id) {
        $query = "DELETE FROM tasks WHERE id=$id";
        return $this->db->query($query);
    }
    
    function complete_task($id) {
        $query = "SELECT * FROM tasks WHERE id=$id";
        $result = $this->db->query($query);
        $task = $result->fetch_assoc();
    
        $title = $this->db->real_escape_string($task['title']);
        $type = $this->db->real_escape_string($task['type']);
        $location = $this->db->real_escape_string($task['location']);
        $datetime = $task['datetime'];
        $duration = intval($task['duration']);
        $comment = $this->db->real_escape_string($task['comment']);
        $completed_at = date('Y-m-d H:i:s');
    
        $query = "INSERT INTO completed_tasks (title, type, location, datetime, duration, comment, completed_at) VALUES ('$title', '$type', '$location', '$datetime', $duration, '$comment', '$completed_at')";
        $this->db->query($query);
    
        $query = "DELETE FROM tasks WHERE id=$id";
        return $this->db->query($query);
    }
    
    function get_completed_tasks() {
        $query = "SELECT * FROM completed_tasks";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    function delete_completed_task($id) {
        $query = "DELETE FROM completed_tasks WHERE id=$id";
        return $this->db->query($query);
    }

    function get_overdue_tasks() {
        $query = "SELECT * FROM tasks WHERE datetime < NOW()";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_tasks_by_date($date) {
        $query = "SELECT * FROM tasks WHERE DATE(datetime)='$date'";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
}
