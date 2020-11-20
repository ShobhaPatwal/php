<?php

session_start();
include('config.php');
$title = "Register";
include('header.php');
include('functions.php');
$errors = array(); 

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    if ($password != $repassword) {
        $errors[] = array('input'=>'password', 'msg'=>'Passwords do not match');
    }

    // check whether user already exist with the same username and/or email
    $check_user = checkuser($username, $email);

    // register user if there are no errors in the form
    $register_user = registeruser($username, $password, $email);
} 

?>

            <div id="signup-form">
                <div id="errors">
                    <?php  if (sizeof($errors) > 0) : ?>
                        <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo $error['msg']; ?></li>
                        <?php endforeach ?>
                        </ul> 
                    <?php  endif ?>
                </div>
                <h2>Sign Up</h2>
                <form action="register1.php" method="POST">
                    <p>
                        <label for="username">Username: <input type="text" name="username" required></label>
                    </p>
                    <p>
                        <label for="password">Password: <input type="password" name="password" required></label>
                    </p>
                    <p>
                        <label for="repassword">Re-Password: <input type="password" name="repassword" required></label>
                    </p>
                    <p>
                        <label for="email">Email: <input type="email" name="email" required></label>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Submit">
                    </p>
                </form>
                <p>
                    Already a member? <a href="login.php">Log in</a>
                </p>
            </div>
        </div>
    </body>
</html>