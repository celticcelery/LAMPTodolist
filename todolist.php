<?php
require("config.php");

//For Deletion
if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    $query = "DELETE FROM tasks where id={$delete_id}";
    $statement_delete = $db->prepare($query);
    $result = $statement_delete->execute();
}



?>

<?php include 'header.php'?>
<h2>Todo List</h2>
<form action="search.php" method="post">
    <input type="text" name="search_item" required>
    <button type="submit" name="search">Search</button>
    <a href="create.php">Add Task</a>
    <a href="index.php">Logout</a>
</form>
<div>

    <?php
    $statement_select = $db->query('Select * from tasks');
    $tasks = $statement_select->fetchAll(PDO::FETCH_OBJ);
    ?>
    <table>
        <tr>
            <th>task</th>
            <th>date created</th>
            <th>due date</th>
        </tr>
        <?php foreach($tasks as $task): ?>
            <form action="todolist.php" method="post">
                <tr>
                    <td class="task"><?php echo $task->task; ?></td>
                    <td class="task"><?php echo $task->start; ?></td>
                    <td class="task"><?php echo $task->end; ?></td>
                    <td class="delete">
                        <input type="hidden" name="delete_id" value="<?php echo $task->id; ?>">
                        <input type="submit" name="delete" value="remove">
                        <input type="hidden" name="update_id" value="<?php echo $task->id; ?>">
                        <a href="update.php?id=<?php echo $task->id;?>" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            </form>
        <?php endforeach;?>
    </table>


</div>
<?php include 'footer.php'?>
