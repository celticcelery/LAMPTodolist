<?php
if(isset($_POST['login'])){
    $email = $_POST['username'];
    $password = $_POST['password'];
}
require('config.php');

//?>

<?php include 'header.php'?>
    <form action="login.php" method="POST">
        <div>
            <label for="useranme">username</label>
            <input type="text" name="username" id="useranme" placeholder="email" required>
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password" id="password" placeholder="password" required>
        </div>
        <button type="submit" name="login">login</button>
    </form>
    <div>
        <a href="registration/registration.php">Sign up</a>
    </div>
<?php include 'footer.php'?>