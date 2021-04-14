<?php
include "./DBConnect.php";
$uid = $_POST['uid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$alternate_mobile = $_POST['alternate_mobile'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
// $image = $_POST['image'];
$email = $_POST['email'];



$query = "UPDATE users SET fname='$fname', lname='$lname', name='$name', mobile = '$mobile', alternate_mobile='$alternate_mobile',
    address='$address', city='$city', pincode='$pincode' WHERE id='$uid'";
if ($conn->query($query)) {
    echo '<script type="text/javascript"> alert("User updated successfully"); </script>';
    // header('location:userProfile.php');
} else {
    $msg = "$conn->error";
    echo "$msg";
    echo '<script type="text/javascript"> alert($msg); </script>';
}
