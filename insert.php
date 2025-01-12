<?php
require_once("conn.php");
if (isset($_POST['submit'])) {
    $task = $_POST['mytask'];
    $insert = $conn->prepare("INSERT INTO task (name) VALUES (:name);");
    $insert->execute([':name'=>$task]);
    header("location: http://todolist.test");
}


?>