<?php
include "../DBConnect.php";
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q = "delete from users where id=$id";
    if ($conn->query($q)) {
        header('Location:../adminDashboard.php');
    } else {
        echo "Error in deleting";
    }
}
