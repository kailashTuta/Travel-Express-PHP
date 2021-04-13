<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'admin') {
        header("Location:userDashboard.php");
    }
} else {
    header("location:login.php");
}

include "./DBConnect.php";
$bid = $_POST['booking_id'];
$status = $_POST['status'];

$query = "UPDATE bookings SET status='$status' WHERE booking_id='$bid'";

if ($conn->query($query)) {
    echo '<script>
    alert("Booking updated successfully");
    </script>';
    header('location:adminBooking.php');
} else {
    $msg = "$conn->error";
    echo $msg;
    echo '<script type="text/javascript">
    alert($msg);
    </script>';
}
