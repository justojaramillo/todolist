<?php
require_once("conn.php");

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    $data = $conn->query("SELECT * FROM task WHERE task_id='$task_id'");
    $task = $data->fetch(PDO::FETCH_OBJ);
}

if (isset($_POST['submit'])) {
    $name = $_POST['mytask'];
    $update = $conn->prepare("UPDATE task SET name=:name WHERE task_id=:task_id");
    $update->execute([':name'=>$name,':task_id'=>$task_id]);
    header("location: http://todolist.test");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update task</title>
</head>
<body>
    <form method="POST" action="update.php?task_id=<?= $task_id ?>" class="form-inline" id="user_form">
        <div class="form-group mx-sm-3 mb-2">
            <label for="mytask" class="sr-only">Update</label>
           <input name="mytask" type="text" class="form-control" id="task" placeholder="update task" value="<?= $task->name ?>">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="update" />
    </form>
</body>
</html>