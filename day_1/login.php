<?php
    require_once "header.php";
?>

    <!-- LogIn Start -->
    <main>
        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hey there, LogIn here!</h5>
                        </div>
                        <div class="card-body">
                            <form action="./login_post.php" method="POST">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="text" name="email" placeholder="Enter your email!" class="form-control <?= isset($_SESSION['email_err']) ? 'is-invalid' : '' ?>" id="email" value="<?= isset($_SESSION['old_email']) ? $_SESSION['old_email'] : '' ?>">
                                    <?php if(isset($_SESSION['email_err'])) { ?>
                                        <small class="text-danger"><?= $_SESSION['email_err'] ?></small>
                                    <?php } unset($_SESSION['email_err']) ?>
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" name="password" placeholder="Enter your password!" class="form-control <?= isset($_SESSION['password_err']) ? 'is-invalid' : '' ?>" id="password">
                                    <?php if(isset($_SESSION['password_err'])) { ?>
                                        <small class="text-danger"><?= $_SESSION['password_err'] ?></small>
                                    <?php } unset($_SESSION['password_err']) ?>
                                </div>
                                <div class="mt-1">
                                    <button class="btn btn-secondary" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- LogIn End -->

<?php
    require_once "footer.php";
?>

<?php 
    unset($_SESSION['old_name']);
    unset($_SESSION['old_email']);
?>