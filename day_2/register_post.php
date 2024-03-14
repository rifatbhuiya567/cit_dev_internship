<?php 
    session_start();
    require_once "db.php";

    date_default_timezone_set('Asia/Dhaka');
    $present_time =  date("Y-m-d h:i:s");

    function sanitize_filed($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $name = sanitize_filed($_POST['name']);
    $email = sanitize_filed($_POST['email']);
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $flag = false;

    if(empty($name)) {
        $flag = true;
        $_SESSION['name_err'] = "Name should be given!";
    }else {
        $_SESSION['old_name'] = $name;
    }

    if(empty($email)) {
        $flag = true;
        $_SESSION['email_err'] = "Email should be given!";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
        $_SESSION['email_err'] = "Email should be a valid email!";
        $_SESSION['old_email'] = $email;
    }else {
        $_SESSION['old_email'] = $email;
    }

    if(empty($password)) {
        $flag = true;
        $_SESSION['password_err'] = "Password should be given!";
    }

    if($flag) {
        header('location:register.php');
    }else {
        $_SESSION['old_name'] = '';
        $_SESSION['old_email'] = '';

        header('location:register.php');
        $_SESSION['register_successfully'] = "Registration successfully!";

        $insert = "INSERT INTO users(name, email, password, created_at) VALUES('$name', '$email', '$password_hash', '$present_time')";
        mysqli_query($db_connect, $insert);

    }