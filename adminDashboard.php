<?php

$msg = "";
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'admin') {
        header("Location:userDashboard.php");
    }
} else {
    header("location:login.php");
}

if (isset($_POST['addUsers'])) {
    include "./DBConnect.php";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role_as = $_POST['role_as'];
    $password = $_POST['password'];

    $query = "INSERT INTO users(fname,lname,name,email,role_as,password)
                VALUES('$fname','$lname','$name','$email','$role_as','$password')";

    if ($conn->query($query)) {
        echo '<script> alert("User added successfully"); </script>';
        header('location:adminDashboard.php');
    } else {
        $msg = "$conn->error";
        echo '<script> alert($msg); </script>';
    }
}

if (isset($_POST['updateUsers'])) {
    include "./DBConnect.php";

    $uid = $_POST['uid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role_as = $_POST['role_as'];
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $query = "UPDATE users SET fname='$fname', lname='$lname', name='$name', email='$email', role_as='$role_as' WHERE id='$uid'";

    if ($conn->query($query)) {
        header('location:adminDashboard.php');
        exit();
    } else {
        $msg = "$conn->error";
        echo '<script> alert("$msg"); </script>';
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Express</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&family=DM+Sans&family=Karantina:wght@300&family=Libre+Baskerville&family=Lobster&family=Mulish:wght@500&family=Open+Sans&family=Pacifico&family=Patua+One&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">

    <!-- JavaScript -->
    <script src="./js/script.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
</head>

<body>
    <?php include "./partials/navbar.php" ?>
    <div class="container-fluid mt-3 mb-5">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group list-group-flush bg-dark">
                    <h3 class="text-white text-center text-uppercase">Dashboard</h3>
                    <a href="adminDashboard.php" class="list-group-item list-group-item-action list-group-item-info active">Users</a>
                    <a href="adminTours.php" class="list-group-item list-group-item-action list-group-item-info">Tours</a>
                    <a href="adminPackages.php" class="list-group-item list-group-item-action list-group-item-info">Packages</a>
                    <a href="adminBooking.php" class="list-group-item list-group-item-action list-group-item-info">Bookings</a>
                    <a href="adminMyBooking.php" class="list-group-item list-group-item-action list-group-item-info">My Bookings</a>
                    <a href="adminProfile.php" class="list-group-item list-group-item-action list-group-item-info">Account</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2">
                        <?php include "./partials/addUser.php" ?>
                    </div>
                    <div class="col-md-4 offset-md-6">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="search" class="form-control" name="search" placeholder="Search" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" name="submit" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr class="bg-dark text-white">
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role_As</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                include "./DBConnect.php";
                                if (isset($_POST['submit'])) {
                                    $search =  $_POST['search'];
                                    $q = "SELECT * FROM users WHERE name LIKE ('%$search%')";
                                    $res = $conn->query($q);
                                    while ($row = $res->fetch_assoc()) {
                                        echo '<tr>';

                                        echo '<td>';
                                        echo $row['id'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['fname'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['lname'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['name'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['email'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['role_as'];
                                        echo '</td>';

                                        echo '<td>';
                                        include "./partials/editUser.php";
                                        echo '</td>';

                                        echo '<td>';
                                ?>
                                        <a href="./partials/deleteUser.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php
                                        echo '</td>';

                                        echo '</tr>';
                                    }
                                } else {
                                    $q = "SELECT * FROM users";
                                    $res = $conn->query($q);
                                    while ($row = $res->fetch_assoc()) {
                                        echo '<tr>';

                                        echo '<td>';
                                        echo $row['id'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['fname'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['lname'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['name'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['email'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['role_as'];
                                        echo '</td>';

                                        echo '<td>';
                                        include "./partials/editUser.php";
                                        echo '</td>';

                                        echo '<td>';
                                    ?>
                                        <a href="./partials/deleteUser.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                <?php
                                        echo '</td>';

                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./partials/footer.php" ?>
</body>

</html>