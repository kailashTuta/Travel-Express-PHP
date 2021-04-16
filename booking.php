<?php
session_start();
include "DBConnect.php";
$msg = "";
$name = $price = $persons = $mobile = $journey_date = $tour_id = $package_id = $user_id = "";
function clean_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name = clean_input($_POST['trip_name']);
$price = clean_input($_POST['price']);
$tour_id = isset($_POST['tour_id']) ? clean_input($_POST['tour_id']) : '';
$package_id = isset($_POST['package_id']) ? clean_input($_POST['package_id']) : '';

if (isset($_POST['book'])) {
    include "DBConnect.php";
    $name = clean_input($_POST['trip_name']);
    $price = clean_input($_POST['price']);
    $persons = clean_input($_POST['persons']);
    $price = $price * $persons;
    $mobile = clean_input($_POST['mobile']);
    $journey_date = clean_input($_POST['jouney_date']);
    $tour_id = isset($_POST['tour_id']) ? clean_input($_POST['tour_id']) : '';
    $package_id = isset($_POST['package_id']) ? clean_input($_POST['package_id']) : '';
    $user_id = clean_input($_POST['user_id']);
    $query = "INSERT INTO bookings (trip_name, persons, mobile, price, journey_date, trip_id, package_id, user_id)
    values('$name','$persons','$mobile','$price','$journey_date','$tour_id','$package_id','$user_id')";
    if ($conn->query($query)) {
        if ($_SESSION['role'] == 'admin') {
            header("location:adminBooking.php");
        } else {
            header("location:userBooking.php");
        }
    } else {
        echo $conn->error;
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
                    <?php include "./partials/bookingForm.php" ?>
                </section>
            </section>
        </section>
    </div>
</body>

</html>