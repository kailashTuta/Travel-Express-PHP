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
                <a class="nav-link" href="../index.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../gallery.php"><i class="fas fa-images"></i> Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-address-card" aria-hidden="true"></i> Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-globe" aria-hidden="true"></i> Booking</a>
            </li>
            <li class="nav-item dropdown ml-auto">
                <?php
                if (isset($_SESSION['is_login'])) {
                ?>
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
                        <?= $_SESSION['name'] ?>
                        <span><i class="fas fa-chevron-circle-down"></i></span>
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown_target">
                        <a href="../logout.php" class="dropdown-item text-info">Logout</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-info">Profile</a>
                    </div>
                <?php } else { ?>
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
                        Account
                        <span><i class="fas fa-chevron-circle-down"></i></span>
                    </a>

                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown_target">
                        <a href="login.php" class="dropdown-item text-info">Login</a>
                        <div class="dropdown-divider"></div>
                        <a href="register.php" class="dropdown-item text-info">Register</a>
                    </div>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>