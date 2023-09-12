<nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
    <a class="navbar-brand" href="dashboard.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <?php
            $user_role = $_SESSION['role'];
            ?>
            <li class="nav-item">
                <a class="nav-link" href="user_list.php"><i class="fas fa-users mr-2"></i>User lists </a>
            </li>
            <li class="nav-item" <?php if($user_role == 3) { echo "style='display:none';"; }?>>
                <a class="nav-link" href="add_user.php"><i class="fas fa-user-plus mr-2"></i>Add user </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="emp_details.php"><i class="fas fa-user-plus mr-2"></i>Employee Details </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>