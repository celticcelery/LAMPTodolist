<?php
require('config.php');
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
<?php include 'header.php' ?>
<div class="container ml-2">
    <form action="registration.php" method="post">
        <h1>Registration</h1>
        <p>Fill up form with correct values</p>
        <div class="form-group row">
            <label for="firstname" class="col-sm-2 col-form-label">First name</label>
            <div class="col-sm-10">
                <input type="text" id="firstname" name="firstname" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
            <div class="col-sm-10">
                <input type="text" id="lastname" name="lastname" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" id="email" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" id="password" name="password" required>
            </div>
        </div>
        <input type="submit" id="register" name="register" class="btn btn-primary" value="Register">
        <a href="index.php" class="btn btn-secondary">Login</a></div>
</form>
</div>

<?php include 'footer.php' ?>
