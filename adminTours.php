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

if (isset($_POST['addTours'])) {
    include "./DBConnect.php";
    $name = $_POST['name'];
    $description = $_POST['description'];
    $places_covered = $_POST['places_covered'];
    $price = $_POST['price'];
    $image = basename($_FILES["image"]["name"]);
    $target = './images/tour-package-images/' . basename($_FILES['image']['name']);

    $query = "INSERT INTO tours(name,description,places_covered,price,image)
                VALUES('$name','$description','$places_covered','$price','$image')";

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    if ($conn->query($query)) {
        echo '<script> alert("Tour added successfully"); </script>';
        header('location:adminTours.php');
    } else {
        $msg = "$conn->error";
        echo $msg;
    }
}

if (isset($_POST['updateTours'])) {
    include "./DBConnect.php";
    $tid = $_POST['tid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $places_covered = $_POST['places_covered'];
    $price = $_POST['price'];


    $query = "UPDATE tours SET name='$name', description='$description', places_covered='$places_covered', price='$price' WHERE t_id='$tid'";

    if ($conn->query($query)) {
        echo '<script> alert("Tour updated successfully"); </script>';
        header('location:adminTours.php');
    } else {
        $msg = "$conn->error";
        echo '<script> alert($msg); </script>';
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
                    <a href="adminDashboard.php" class="list-group-item list-group-item-action list-group-item-info">Users</a>
                    <a href="adminTours.php" class="list-group-item list-group-item-action list-group-item-info active">Tours</a>
                    <a href="adminPackages.php" class="list-group-item list-group-item-action list-group-item-info">Packages</a>
                    <a href="adminBooking.php" class="list-group-item list-group-item-action list-group-item-info">Bookings</a>
                    <a href="adminMyBooking.php" class="list-group-item list-group-item-action list-group-item-info">My Bookings</a>
                    <a href="adminProfile.php" class="list-group-item list-group-item-action list-group-item-info">Account</a>
                </div>
            </div>
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-2">
                        <?php include "./partials/addTour.php" ?>
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
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Places Covered</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                <?php
                                include "./DBConnect.php";
                                if (isset($_POST['submit'])) {
                                    $search =  $_POST['search'];
                                    $q = "SELECT * FROM tours WHERE name LIKE ('%$search%')";
                                    $res = $conn->query($q);
                                    while ($row = $res->fetch_assoc()) {
                                        echo '<tr>';

                                        echo '<td>';
                                        echo $row['t_id'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['name'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['description'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['places_covered'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['price'];
                                        echo '</td>';


                                        echo '<td>';
                                        include "./partials/editTour.php";
                                        echo '</td>';

                                        echo '<td>';
                                ?>
                                        <a href="./partials/deleteTour.php?delete=<?php echo $row['t_id']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php
                                        echo '</td>';

                                        echo '</tr>';
                                    }
                                } else {
                                    $q = "SELECT * FROM tours";
                                    $res = $conn->query($q);
                                    while ($row = $res->fetch_assoc()) {
                                        echo '<tr>';

                                        echo '<td>';
                                        echo $row['t_id'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['name'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['description'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['places_covered'];
                                        echo '</td>';

                                        echo '<td>';
                                        echo $row['price'];
                                        echo '</td>';

                                        echo '<td>';
                                        include "./partials/editTour.php";
                                        echo '</td>';

                                        echo '<td>';
                                    ?>
                                        <a href="./partials/deleteTour.php?delete=<?php echo $row['t_id']; ?>" class="btn btn-danger">
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