<?php
$user = "root";
$password = "password";
$database = "todolist";
$dsn = 'mysql:host=localhost;dbname=' . $database . '';
try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "database connection fail" . $e->getMessage();
}
?>
