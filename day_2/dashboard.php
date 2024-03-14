<?php 
    require_once "header.php";
    include_once "authorization.php";
?>

    <!-- Dashboard Start -->
    <main>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Hey <span class="text-primary"><?= $select_user_assoc['name'] ?></span>, Welcome to Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Dashboard End -->

<?php 
    require_once "footer.php";
?>