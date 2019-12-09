<?php
require("config.php");
session_start();
$userId = $_SESSION['userId'];
//unset($_SESSION['userId']);
//session_destroy();
?>

<?php include 'header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="display-4">Todo List</h2>
        </div>
        <div class="border-right">
            <a href="index.php" class="btn-lg btn-link">Logout</a>
        </div>
    </div>
    <div class="row-cols-lg-1">
        <form action="search.php" method="post">
            <div class="form-row">
                <div class="col-7">
                    <input type="text" name="search_item" class="form-control" placeholder="Search a task" required>
                </div>
                <div class="col">
                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                    <a href="create.php" class="btn btn-secondary">Add Task</a>
                </div>
            </div>
        </form>
    </div>
        <?php
        $query = "Select * from tasks where userId='$userId'";
        $statement_select = $db->prepare($query);
        $statement_select->execute();
        $tasks = $statement_select->fetchAll(PDO::FETCH_OBJ);
        ?>
        <div>
            <table class="table">
                <tr>
                    <th>Task</th>
                    <th>Date created</th>
                    <th>Due date</th>
                </tr>
                <?php foreach ($tasks as $task): ?>
                    <form action="todolist.php" method="post">
                        <tr>
                            <td class="task"><?php echo $task->task; ?></td>
                            <td class="task"><?php echo $task->start; ?></td>
                            <td class="task"><?php echo $task->end; ?></td>
                            <td>
                                <a href="delete.php?id=<?php echo $task->id; ?>" class="btn btn-danger">Delete</a>
                                <a href="update.php?id=<?php echo $task->id; ?>" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </table>
        </div>
    <div>
        <?php include 'footer.php' ?>
