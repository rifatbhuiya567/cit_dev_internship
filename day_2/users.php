<?php 
    require_once "header.php";
    include_once "authorization.php";

    $select_user = "SELECT * FROM users WHERE id != $user_id";
    $all_user = mysqli_query($db_connect, $select_user);
?>
    <!-- Users Table Start -->
    <main>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12">
                    <?php if(!mysqli_num_rows($all_user) == null): ?>
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-bordered text-center"
                        >
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($all_user as $sl=>$user): ?>
                                    <tr>
                                        <td><?= $sl + 1 ?></td>
                                        <td><?= $user['name'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td>
                                            <?php if($user['status'] == 0): ?>
                                                <div class="badge text-bg-secondary">Not Assign</div>
                                            <?php elseif($user['status'] == 1): ?>
                                                <div class="badge text-bg-primary">Admin</div>
                                            <?php elseif($user['status'] == 2): ?>
                                                    <div class="badge text-bg-success">Super Admin</div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-dark">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                        <div class="alert alert-warning text-center">No User Found!</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Users Table End -->
<?php 
    require_once "footer.php";
?>