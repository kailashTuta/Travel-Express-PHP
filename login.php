<?php

session_start();
include "DBConnect.php";
$message = "";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["role_as"] == "admin") {
                $_SESSION['is_login'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['User'] = $row["email"];
                $_SESSION['role'] = $row['role_as'];
                header("location:./admin/adminDashboard.php");
            } else {
                $_SESSION['is_login'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['User'] = $row["email"];
                $_SESSION['role'] = $row['role_as'];
                header("location:./user/userDashboard.php");
            }
        }
    } else {
        $message = "Invalid Credentials";
        // header("location: login.php");
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
    <div class="bg">
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-4">
                    <form class="form-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email">
                            <small class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        
                        <h5 class="text-center text-danger"><?= $message; ?></h5>
                        <button type="submit" name="login" class="btn btn-info btn-block">Login</button>
                    </form>
                </section>
            </section>
        </section>
    </div>
</body>

</html>