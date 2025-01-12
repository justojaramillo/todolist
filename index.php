<?php 

require_once("conn.php");
$data = $conn->query("SELECT * FROM task");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TodoList</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
		<form method="POST" action="insert.php" class="form-inline" id="user_form">
		 
		  <div class="form-group mx-sm-3 mb-2">
		    <label for="mytask" class="sr-only">create</label>
		    <input name="mytask" type="text" class="form-control" id="task" placeholder="enter task">
		  </div>
		   
		      <input type="submit" name="submit" class="btn btn-primary" value="Insert" />
		</form>

		<table class="table">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Task Name</th>
		      <th>delete</th>
		      <th>update</th>
		    </tr>
		  </thead>
		  <tbody>
            <?php while($rows = $data->fetch(PDO::FETCH_OBJ)): ?>
		    <tr>
		     <td><?= $rows->task_id ?></td>
		     <td><?= $rows->name ?></td>
		     <td><a href="delete.php?task_id=<?= $rows->task_id ?>" class="btn btn-danger">delete</a></td>
				<td><a href="update.php?task_id=<?= $rows->task_id ?>" class="btn btn-warning">update</a></td>
		    </tr>
            <?php endwhile; ?>

		  </tbody>
		</table>
	</div>

</body>
</html>