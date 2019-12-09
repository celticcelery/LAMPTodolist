<?php
require('config.php');
if(isset($_POST['login'])){
    $email = $_POST['username'];
    $password = $_POST['password'];
    $sql = "Select count(*) from users where email='{$email}' and password='{$password}'";
    $result = $db->prepare($sql);
    $result->execute();
    $numRows = $result->fetchColumn();
    if($numRows == 1) {
        Header("Location: todolist.php");
        exit();
    }
    else {
        session_start();
        $_SESSION['message'] = "Invalid email or password.";
        Header("Location: index.php");
        exit();
    }
}
//?>