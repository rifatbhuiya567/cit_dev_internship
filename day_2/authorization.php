<?php
    if(!isset($_SESSION['authenticate_user_id'])) {
        header('location:login.php');
    }