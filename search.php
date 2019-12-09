<?php
require('config.php');
if(isset($_POST['search'])){
    $searchedTask = $_POST['search_item'];
    $sql = "Select * from tasks where task like (?)";
    $statement_search = $db->prepare($sql);
    $result = $statement_search->execute(["%".$searchedTask."%"]);
}
?>

<?php include("header.php") ?>
<h2>Searches</h2>
<a href="todolist.php">back todo</a>
<?php
$countsql = "Select Count(*) from tasks where task like (?)";
$statement_count = $db->prepare($countsql);
$statement_count->execute(["%".$searchedTask."%"]);
$numRows = $statement_count->fetchColumn();
if($numRows < 1) {
    echo 'no searches contained '.$searchedTask;
}
else {
$tasks = $statement_search->fetchAll(PDO::FETCH_OBJ);
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
<?php } ?>
<?php include("footer.php")?>
