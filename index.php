<?php
require('config.php');
session_start();
echo $_SESSION['message'];
session_destroy();
unset($_SESSION['message']);
//?>

<?php include 'header.php'?>
<div class="container h-100">
    <div class="jumbotron justify-content-center">
        <div class="user_card">
            <div class="d-flex justify-content-center form_container">
                <form action="login.php" method="POST" class="form-check">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" id="useranme" class="form-control input_user" placeholder="email" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input_pass" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInLine">
                            <label class="custom-control-label" for="customControlInLine">Remember me</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? <a href="registration.php" class="ml-2">Sign Up</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'?>