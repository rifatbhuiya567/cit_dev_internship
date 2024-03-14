<?php 
    require_once "header.php";
    include_once "authorization.php";

    $edit_user_id = $_GET['id'];

    require_once "db.php";

    $edit_user = "SELECT * FROM users WHERE id = $edit_user_id";
    $edit_user_result = mysqli_query($db_connect, $edit_user);
    $edit_user_assoc = mysqli_fetch_assoc($edit_user_result);
?>
    <!-- Edit User Start -->
    <main>
        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit User Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Name *</label>
                                    <input type="text" name="name" value="<?= $edit_user_assoc['name'] ?>" class="form-control">
                                    <?php if(isset($_SESSION['name_err'])) { ?>
                                        <small class="text-danger"><?= $_SESSION['name_err'] ?></small>
                                    <?php } unset($_SESSION['name_err']) ?>
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="text" name="email" disabled value="<?= $edit_user_assoc['email'] ?>" class="form-control">
                                </div>
                                <div class="mt-1">
                                    <button type="submit" class="btn btn-secondary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Edit User End -->
<?php 
    require_once "footer.php";
?>