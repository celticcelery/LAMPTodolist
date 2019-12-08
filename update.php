<?php
require("config.php");
$id = $_GET['id'];
$query = "Select task from tasks where id={$id}";
$statement_search = $db->prepare($query);
$result = $statement_search->execute();
$task = $statement_search->fetch(PDO::FETCH_OBJ);



if(isset($_POST['update'])){
    $newTask = $_POST['newTask'];
    $id = $_GET['id'];
    $query = "update tasks set task='$newTask' where id={$id}";
    $statement_update = $db->prepare($query);
    $resutl = $statement_update->execute();
    Header("Location: todolist.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<h2>Edit List</h2>
<form action="update.php?id=<?php echo $_GET['id'];?>" method="post" id="update">
    <input type="text" name="newTask" placeholder="<?php echo $task->task; ?>" required>
    <input type="hidden" name="id" value="<?php $id ?>">
    <button type="submit" name="update">update</button>
</form>

</body>
</html>