<?php
require("config.php");
$id = $_GET['id'];
$query = "Select task, end from tasks where id={$id}";
$statement_search = $db->prepare($query);
$result = $statement_search->execute();
$task = $statement_search->fetch(PDO::FETCH_OBJ);
$endTime = $task->end;
$endTime = str_replace(" ", "T", $endTime);
$endTime = substr($endTime, 0, -3);
echo $endTime;

if(isset($_POST['update'])){
    $newTask = $_POST['newTask'];
    $id = $_GET['id'];
    $newEndTime = $_POST['date'];
    $newStartTime = $timeAdded = date("Y-m-d H:i:s");
    $query = "update tasks set task=(?), start='$newStartTime', end='$newEndTime' where id=(?)";
    $statement_update = $db->prepare($query);
    $result = $statement_update->execute([$newTask, $id]);
    Header("Location: todolist.php");
    exit();
}
?>

<?php include('header.php')?>
<div class="container-fluid">
    <h2 class="display-4">Edit List</h2>
    <form action="update.php?id=<?php echo $_GET['id'];?>" method="post" id="update">
        <div class="input-group">
            <label for="newTask" class="col-sm-1 h4" >Edit Task</label>
            <input type="text" name="newTask" id="newTask" placeholder="<?php echo $task->task; ?>" class="col-3" required>
            <input type="hidden" name="id" value="<?php $id ?>">

        </div>
        <div class="input-group mt-0">
            <label for="date" class="col-sm-1 h4">Due date</label>
            <input type="datetime-local" id="date" name="date" class="col-3" value="<?php echo $endTime?>" required>
        </div>
        <div class="input-group">
            <span class="col-1"></span>
            <div class="mt-2">
                <button type="submit" name="update" class="btn btn-primary mr-0">update</button>
                <a href="todolist.php" class="btn btn-secondary">Cancel</a>
            </div>
        </div>

    </form>
</div>
<?php include('footer.php')?>