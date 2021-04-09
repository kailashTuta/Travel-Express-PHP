<?php
include "../DBConnect.php";
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q = "delete from tours where t_id=$id";
    if ($conn->query($q)) {
        header('Location:../adminTours.php');
    } else {
        echo "Error in deleting";
    }
}
