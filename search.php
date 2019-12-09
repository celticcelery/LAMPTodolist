<?php
require('config.php');
session_start();
if(isset($_POST['search'])){
    $userId = $_SESSION['userId'];
    $searchedTask = $_POST['search_item'];
    $sql = "Select * from tasks where task like (?) and userId='$userId'";
    $statement_search = $db->prepare($sql);
    $result = $statement_search->execute(["%".$searchedTask."%"]);

}
?>

<?php include("header.php") ?>
<div class="row">
    <h1 class="col-10 display-4">Searches</h1>
    <a href="todolist.php" class="btn-lg btn-link col-2">Back TodoList</a>
</div>

<?php

$countsql = "Select Count(*) from tasks where task like (?) and userId='$userId'";
$statement_count = $db->prepare($countsql);
$statement_count->execute(["%".$searchedTask."%"]);
$numRows = $statement_count->fetchColumn();
if($numRows < 1 ) {
    ?>
    <p class="h2">No searches contained <?php echo $searchedTask;?></p>
    <?php
}
else {
$tasks = $statement_search->fetchAll(PDO::FETCH_OBJ);
?>
<table class="table border">
    <tr>
        <th>Task</th>
        <th>Date created</th>
        <th>Due date</th>
    </tr>
    <?php foreach($tasks as $task): ?>
        <form action="todolist.php" method="post">
            <tr>
                <td class="task"><?php echo $task->task; ?></td>
                <td class="task"><?php echo $task->start; ?></td>
                <td class="task"><?php echo $task->end; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $task->id;?>" class="btn btn-danger">Delete</a>
                    <a href="update.php?id=<?php echo $task->id;?>" class="btn btn-success">Edit</a>
                </td>
            </tr>
        </form>
    <?php endforeach;?>
</table>
<?php } ?>
<?php include("footer.php")?>
