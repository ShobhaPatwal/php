<?php

session_start();
include('config.php');
$title = "Login";
include('header.php');
include('functions.php');
$errors = array(); 

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    
    $login = loginuser($username, $password);

} 

?>

            <div id="login-form">
                <div id="errors">
                    <?php  if (sizeof($errors) > 0) : ?>
                        <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo $error['msg']; ?></li>
                        <?php endforeach ?>
                        </ul> 
                    <?php  endif ?>
                </div>            
                <h2>Login</h2>
                <form action="login.php" method="POST">
                    <p>
                        <label for="username">Username: <input type="text" name="username" required></label>
                    </p>
                    <p>
                        <label for="password">Password: <input type="password" name="password" required></label>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Log In">
                    </p>
                </form>
                <p>
                    Not yet become a member? <a href="register.php">Sign up</a>
                </p>
            </div>
        </div>
    </body>
</html>