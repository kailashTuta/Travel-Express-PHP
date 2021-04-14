<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'user') {
        header("Location:adminDashboard.php");
    }
} else {
    header("location:login.php");
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
                    <a href="userDashboard.php" class="list-group-item list-group-item-action list-group-item-info">My Bookings</a>
                    <a href="userProfile.php" class="list-group-item list-group-item-action list-group-item-info active">Account</a>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                include "./DBConnect.php";
                $uid = $_SESSION['id'];
                $q = "SELECT * from users where id='$uid'";
                $res = $conn->query($q);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center text-uppercase text-white bg-dark p-3">My Profile Page</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src=".<?php echo $row['image']; ?>" class="w-50 ml-5" alt="profile-image" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="hidden" name="uid" Value="<?php echo $row['id'] ?>">
                                            <div class="form-group">
                                                <label for="">First Name</label>
                                                <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <input name="gender" type="text" class="form-control" value="<?php echo $row['gender']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Mobile</label>
                                                <input type="number" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Alternate Mobile (Optional)</label>
                                                <input type="number" name="alternate_mobile" class="form-control" value="<?php echo $row['alternate_mobile']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email Id</label>
                                        <input type="email" name="email" class="form-control" readonly value="<?php echo $row['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control" value="<?php echo $row['city']; ?>" readonly>
                                    </div>
                                </div>
                                <div class=" col-md-3">
                                    <div class="form-group">
                                        <label for="">Pincode</label>
                                        <input type="number" name="pincode" class="form-control" value="<?php echo $row['pincode']; ?>" readonly>
                                    </div>
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