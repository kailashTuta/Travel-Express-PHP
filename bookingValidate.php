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
include "DBConnect.php";
$name = clean_input($_POST['trip_name']);
$price = clean_input($_POST['price']);
$persons = clean_input($_POST['persons']);
$price = $price * $persons;
$mobile = clean_input($_POST['mobile']);
$journey_date = $_POST['journey_date'];
$journey_date = date('Y-m-d', strtotime($journey_date));
$tour_id = isset($_POST['tour_id']) ? clean_input($_POST['tour_id']) : '';
$package_id = isset($_POST['package_id']) ? clean_input($_POST['package_id']) : '';
$user_id = clean_input($_POST['user_id']);
$query = "INSERT INTO bookings (trip_name, persons, mobile, price, journey_date, trip_id, package_id, user_id)
values('$name','$persons','$mobile','$price','$journey_date','$tour_id','$package_id','$user_id')";
if ($conn->query($query)) {
    if ($_SESSION['role'] == 'admin') {
        header("location:adminBooking.php");
    } else {
        header("location:userDashboard.php");
    }
} else {
    echo $conn->error;
}
