<?php
require("config.php");
session_start();
if(isset($_POST['submit'])){
    $task = $_POST['task'];
    $dueDate = $_POST['date'];
    $timeAdded = date("Y-m-d H:i:s");
    $userId = $_SESSION['userId'];
    $query = "Insert into tasks (task, start, end, userId) values((?), '{$timeAdded}', '{$dueDate}', '{$userId}')";
    $statement_create = $db->prepare($query);
    $result = $statement_create->execute([$task]);
}

?>

<?php include('header.php')?>
<div class="container-fluid">
    <h1 >Add a new task</h1>
    <form action="create.php" method="post">
        <div class="form-group">
            <label for="task" class="col-sm-1">Task</label>
            <input type="text" name="task" class="col-6"required>
        </div>
        <div class="form-group">
            <label for="date" class="col-sm-1">Due date</label>
            <input type="datetime-local" id="date" name="date" class="col-6" required>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Add Task">
            <a href="todolist.php" id="todolist" class="btn btn-secondary">Back TodoList</a>
        </div>
    </form>
</div>
<?php include('footer.php')?>