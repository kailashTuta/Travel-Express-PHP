<?php
include "../DBConnect.php";
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q = "delete from packages where p_id=$id";
    if ($conn->query($q)) {
        header('Location:../adminPackages.php');
    } else {
        echo "Error in deleting";
    }
}
