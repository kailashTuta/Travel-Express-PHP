<?php
include "DBConnect.php";
$msg = "";
$fname = $lname = $name = $email = $role_as = $password = $cpassword = "";
function clean_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['register'])) {
    $fname = clean_input($_POST['fname']);
    $lname = clean_input($_POST['lname']);
    $name = clean_input($_POST['name']);
    $email = clean_input($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // $role_as = clean_input($_POST['role_as']);
    $password = clean_input($_POST['password']);
    $cpassword = clean_input($_POST['cpassword']);

    if (
        isset($fname) && $fname != "" && isset($lname) && $lname != "" && isset($name) && $name != "" && isset($password) && $password != "" &&
        isset($email) && $email != "" && isset($cpassword) && $cpassword != ""
    ) {
        $query = "SELECT * FROM users WHERE(email=?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($email == $row['email']) {
                $msg = "User Already Exist";
            }
        } elseif ($password != $cpassword) {
            $msg = "Passwords Doesn't Match";
        } else {
            $query = "INSERT INTO users (fname, lname, name, email, password) values('$fname','$lname','$name','$email','$password')";
            if ($conn->query($query)) {
                header("location:userDashboard.php");
            }
        }
    } else {
        $msg = "Please Enter the Values";
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
    <div class="bg">
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-4">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" class="form-container" id="registrationForm" method="post">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">First name</label>
                                    <input type="text" name="fname" class="form-control" name="fname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lname">last name</label>
                                    <input type="text" name="lname" class="form-control" name="lname">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control">
                        </div>
                        <h5 class="text-center text-danger"><?= $msg; ?></h5>
                        <button type="submit" name="register" class="btn btn-info btn-block">Register</button>
                    </form>
                </section>
            </section>
        </section>
    </div>
</body>

</html>