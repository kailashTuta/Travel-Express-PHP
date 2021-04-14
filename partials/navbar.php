<?php
if (isset($_SESSION['is_login'])) {
?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <span class="navbar-text"><i class="fa fa-plane" aria-hidden="true"></i> Travel Express</span>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse_target">
            <ul class="navbar navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><span class="material-icons">home</span> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">
                        <span class="material-icons">
                            collections
                        </span>
                        Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tours.php">
                        <span class="material-icons">
                            explore
                        </span>
                        Tours
                    </a>
                </li>
                <li class="nav-item dropdown ml-auto">
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                    ?>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
                            <?php echo $_SESSION['name'] ?><span class="material-icons">expand_more</span>
                        </a>

                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdown_target">
                            <a href="adminProfile.php" class="dropdown-item text-info">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item text-info">Logout</a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
                            <?php echo $_SESSION['name'] ?><span class="material-icons">expand_more</span>
                        </a>

                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdown_target">
                            <a href="userProfile.php" class="dropdown-item text-info">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item text-info">Logout</a>
                        </div>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
<?php
} else {
?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <span class="navbar-text"><i class="fa fa-plane" aria-hidden="true"></i> Travel Express</span>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse_target">
            <ul class="navbar navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><span class="material-icons">home</span> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">
                        <span class="material-icons">
                            collections
                        </span>
                        Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tours.php">
                        <span class="material-icons">
                            explore
                        </span>
                        Tours
                    </a>
                </li>
                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
                        Account<span class="material-icons">expand_more</span>
                    </a>

                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown_target">
                        <a href="login.php" class="dropdown-item text-info">Login</a>
                        <div class="dropdown-divider"></div>
                        <a href="register.php" class="dropdown-item text-info">Register</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<?php
}
?>