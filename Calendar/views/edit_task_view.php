<h1>Редактировать задачу</h1>
<form method="post" action="">
    <label>Тема:</label><br>
    <input type="text" name="title" value="<?php echo $task['title']; ?>"><br>

    <label>Тип:</label><br>
    <select name="type">
        <option value="встреча" <?php if ($task['type'] == 'встреча') echo 'selected'; ?>>Встреча</option>
        <option value="звонок" <?php if ($task['type'] == 'звонок') echo 'selected'; ?>>Звонок</option>
        <option value="совещание" <?php if ($task['type'] == 'совещание') echo 'selected'; ?>>Совещание</option>
        <option value="дело" <?php if ($task['type'] == 'дело') echo 'selected'; ?>>Дело</option>
    </select><br>
    <label>Место:</label><br>
    <input type="text" name="location" value="<?php echo $task['location']; ?>"><br>

    <label>Дата и время:</label><br>
    <input type="datetime-local" name="datetime" value="<?php echo date('Y-m-d\TH:i', strtotime($task['datetime'])); ?>"><br>

    <label>Длительность:</label><br>
    <input type="number" name="duration" value="<?php echo $task['duration']; ?>"><br>

    <label>Комментарий:</label><br>
    <textarea name="comment"><?php echo $task['comment']; ?></textarea><br>

    <input type="submit" value="Сохранить">