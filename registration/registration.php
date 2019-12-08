<?php
require('../config.php');
if(isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select count(*) from users where email='{$email}'";
    $statement_check = $db->prepare($sql);
    $result = $statement_check->execute();
    $numRows = $statement_check->fetchColumn();
    if ($numRows >= 1) {
        echo 'A user with that email already exists.';
    } else {
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password')";
        $statement_create_user = $db->prepare($sql);
        $result = $statement_create_user->execute();
    }
}
?>
<?php include('header.php') ?>
<div>
    <form action="registration.php" method="post">
        <h1>Registration</h1>
        <p>Fill up form with correct values</p>
        <label for="firstname">First name</label>
        <input type="text" id="firstname" name="firstname" required>
        <label for="lastname">Last name</label>
        <input type="text" id="lastname" name="lastname" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" id="register" name="register" value="register">
        <a href="../index.php"></a>
    </form>
</div>
<?php include('footer.php') ?>
