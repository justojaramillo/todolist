<?php
require_once("conn.php");

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    $delete = $conn->prepare("DELETE FROM task WHERE task_id=:task_id");
    $delete->execute([':task_id'=>$task_id]);
    header("location: http://todolist.test");
}

?>