<?php
    session_start();
    require_once "db.php";

    function sanitize_filed($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $email = sanitize_filed($_POST['email']);
    $password = $_POST['password'];

    $flag = false;

    if(empty($email)) {
        $flag = true;
        $_SESSION['email_err'] = "Email should be given!";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
        $_SESSION['email_err'] = "Email should be a valid email!";
        $_SESSION['old_email'] = $email;
    }else {
        if(empty($password)) {
            $flag = true;
            $_SESSION['old_email'] = $email;
            $_SESSION['password_err'] = "Password should be given!";
        }else {
            $select_user = "SELECT COUNT(*) AS authenticate_user FROM users WHERE email = '$email'";
            $select_user_result = mysqli_query($db_connect, $select_user);
            $select_user_assoc = mysqli_fetch_assoc($select_user_result);

            if($select_user_assoc['authenticate_user'] == 1) {
                $authenticate_user = "SELECT * FROM users WHERE email = '$email'";
                $authenticate_user_result = mysqli_query($db_connect, $authenticate_user);
                $authenticate_user_assoc = mysqli_fetch_assoc($authenticate_user_result);

                if(password_verify($password, $authenticate_user_assoc['password'])) {
                    $_SESSION['login_check'] = '';
                    $_SESSION['authenticate_user_id'] = $authenticate_user_assoc['id'];
                    header('location:dashboard.php');
                }else {
                    $flag = true;
                    $_SESSION['email_err'] = "Wrong credentials!";
                    $_SESSION['password_err'] = "";
                }
            }else {
                $flag = true;
                $_SESSION['old_email'] = $email;
                $_SESSION['email_err'] = "Email not match!";
            }
        }
    }

    if($flag) {
        header('location:login.php');
    }