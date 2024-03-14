<?php
    session_start();
    require_once "db.php";

    $user_id = isset($_SESSION['authenticate_user_id']);

    if(!$user_id == null) {
        $select_user = "SELECT * FROM users WHERE id = $user_id";
        $select_user_result = mysqli_query($db_connect, $select_user);
        $select_user_assoc = mysqli_fetch_assoc($select_user_result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day 2 | CIT Dev Internship</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
</head>
<body>
    <!-- Nav Start -->
    <nav
        class="navbar navbar-expand-sm navbar-dark bg-dark"
    >
        <div class="container">
            <a class="navbar-brand" href="./index.php">Navbar</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <?php if($user_id == null): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">Users</a>
                        </li>
                        <li>
                            <a class="nav-link" href="logout.php">Log Out</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Nav End -->