<?php
    session_start();
    unset($_SESSION['authenticate_user_id']);
    header('location:index.php');