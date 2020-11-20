<?php


//check whether user already exist with the same username and/or email
function checkuser($user, $email) {
    global $conn, $errors;
    $check_query = "SELECT * FROM users WHERE username='$user' OR email='$email'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($user === $row['username']) {
                $errors[] = array('input'=>'username', 'msg'=>'Username already exists');
            } 
            if ($email === $row['email']) {
                $errors[] = array('input'=>'email', 'msg'=>'Email already exists');
            }
        }
        return $errors;
    } 

    return false;
}

// register user if there are no errors in the form
function registeruser($user, $pass, $email) {
    global $conn, $errors;
    if (sizeof($errors) == 0) {
        $sql = "INSERT INTO users (username, password, email) VALUES('".$user."', '".$pass."', '".$email."')";
        if ($conn->query($sql) === true) {
            $_SESSION['userdata']['username'] = $user;
            $_SESSION['success'] = "You are now logged in";
            header('Location: members/index.php');
        } else {
            $errors[] = array('input'=>'form', 'msg'=>$conn->error);
            return $errors;
        }
    
        $conn->close();
    }
    return false;
}

//login user if there are no errors in the form
function loginuser($user, $pass) {
    global $conn, $errors;
    if (sizeof($errors) == 0) {
        $sql = "SELECT * FROM users WHERE 
        username='".$user."' AND password='".$pass."'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // output data of selected row
            $row = $result->fetch_assoc();
            $_SESSION['userdata'] = array('username'=>$row['username'],'user_id'=>$row['user_id']);
            $_SESSION['success'] = "You are now logged in";
            header('Location: members/index.php');
        } else {
            $errors[] = array('input'=>'form', 'msg'=>'Invalid login details');
            return $errors;
        }

        $conn->close();
    }
    return false;
}

?>