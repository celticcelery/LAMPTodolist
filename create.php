<?php
require("config.php");
if(isset($_POST['submit'])){
    $task = $_POST['task'];
    $dueDate = $_POST['date'];
    $timeAdded = date("Y-m-d H:i:s");
    $query = "Insert into tasks (task, start, end) values((?), '{$timeAdded}', '{$dueDate}')";
    $statement_create = $db->prepare($query);
    $result = $statement_create->execute([$task]);
}

?>

<?php include('header.php')?>
    <h2>Add a new task</h2>
    <form action="create.php" method="post">
        <div>
            <label for="task">Task</label>
            <input type="text" name="task" required>
        </div>
        <div>
            <label for="date">Due date</label>
            <input type="datetime-local" id="date" name="date" required>
        </div>
        <input type="submit" name="submit" value="add task">


    </form>
    <a href="todolist.php" id="todolist">back todolist</a>

<?php include('footer.php')?>