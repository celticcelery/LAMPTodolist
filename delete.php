<?php
require("config.php");
session_start();
$id = $_GET['id'];
$query = "Delete from tasks where id='$id'";
$statement_delete = $db->prepare($query);
$result = $statement_delete->execute();
Header("Location: todolist.php");
exit();
?>