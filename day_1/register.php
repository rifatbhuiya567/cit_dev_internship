<?php
    require_once "header.php";
?>

    <!-- Register Start -->
    <main>
        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hey there, Register here!</h5>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_SESSION['register_successfully'])) { ?>
                                <div class="alert alert-success"><?= $_SESSION['register_successfully'] ?></div>
                            <?php } ?>
                            <form action="./register_post.php" method="POST">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Name *</label>
                                    <input type="text" name="name" placeholder="Enter your name!" class="form-control <?= isset($_SESSION['name_err']) ? 'is-invalid' : '' ?>">
                                    <?php if(isset($_SESSION['name_err'])) { ?>
                                        <small class="text-danger"><?= $_SESSION['name_err'] ?></small>
                                    <?php } unset($_SESSION['name_err']) ?>
                                </div>
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
                                    <button class="btn btn-secondary" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Register End -->

<?php
    require_once "footer.php";
?>

<?php 
    unset($_SESSION['old_name']);
    unset($_SESSION['old_email']);
    unset($_SESSION['register_successfully']);
?>