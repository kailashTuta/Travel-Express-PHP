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
    $password = $_POST['password'];

    $query = "UPDATE users SET fname='$fname', lname='$lname', name='$name', email='$email', role_as='$role_as' WHERE id='$uid'";

    if ($conn->query($query)) {
        echo '<script> alert("User updated successfully"); </script>';
        header('location:adminDashboard.php');
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
                    <a href="adminTours.php" class="list-group-item list-group-item-action list-group-item-info">Tours</a>
                    <a href="adminPackages.php" class="list-group-item list-group-item-action list-group-item-info">Packages</a>
                    <a href="adminBooking.php" class="list-group-item list-group-item-action list-group-item-info">Bookings</a>
                    <a href="adminMyBooking.php" class="list-group-item list-group-item-action list-group-item-info active">My Bookings</a>
                    <a href="adminProfile.php" class="list-group-item list-group-item-action list-group-item-info">Account</a>
                </div>
            </div>

            <div class="col-md-9">
                <?php
                include "./DBConnect.php";
                $uid = $_SESSION['id'];
                $q = "SELECT * from bookings where user_id= '$uid'";
                $res = $conn->query($q);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <div class="card text-white" style="width: 25rem;" id="<?php echo $row['status']; ?>">
                        <div class="card-body">
                            <h4 class="card-title">
                                <span class="material-icons">
                                    place
                                </span><?php echo $row['trip_name']; ?>
                            </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><span>Booking Id: </span><?php echo $row['booking_id']; ?></p>
                                </div>
                                <div class="col-md-8">
                                    <p><span>No of Persons: </span><?php echo $row['persons']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><span>Price: </span><?php echo $row['price']; ?></p>
                                </div>
                                <div class="col-md-8">
                                    <p><span>Journey Date: </span><?php echo $row['journey_date']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Status: <?php echo $row['status']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php include "./partials/footer.php" ?>
</body>

</html>