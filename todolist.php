<?php
require("config.php");
//For insertion
if (isset($_POST['submit'])) {
    $task = $_POST['task'];
//     inserts into tablename(tablecol) values (values)
    $sql = "INSERT INTO tasks (task) values ('$task')";
    $statement_insert = $db->prepare($sql);
    $result = $statement_insert->execute();
}

//For Deletion
if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    $query = "DELETE FROM tasks where id={$delete_id}";
    $statement_delete = $db->prepare($query);
    $result = $statement_delete->execute();
}

//For Update
if(isset($_POST['update'])){
    $update_id = $_POST['update_id'];
    $newTask = $_POST['newTask'];
    echo $newTask;
    echo $update_id;
}

?>

<?php include 'header.php'?>
<h2>Todo List</h2>
<form action="todolist.php" method="post">
    <input type="text" name="task" required>
    <button type="submit" name="submit">Add Task</button>
    <a href="index.php">Logout</a>
</form>
<div>

    <?php
    $statement_select = $db->query('Select * from tasks');
    $tasks = $statement_select->fetchAll(PDO::FETCH_OBJ);
    ?>
    <?php foreach($tasks as $task): ?>
        <form action="todolist.php" method="post">
            <tr>
                <td class="task"><?php echo $task->task; ?></td>
                <td class="delete">
                    <input type="hidden" name="delete_id" value="<?php echo $task->id; ?>">
                    <input type="submit" name="delete" value="remove">
                    <input type="hidden" name="update_id" value="<?php echo $task->id; ?>">
                    <a href="update.php?id=<?php echo $task->id;?>" class="btn btn-success">Edit</a>
                </td>
            </tr>
        </form>

    <?php endforeach;?>

</div>
<?php include 'footer.php'?>
