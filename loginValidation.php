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
                $_SESSION['User'] = $row["email"];
                $_SESSION['role'] = $row['role_as'];
                header("location:./admin/adminDashboard.php");
            } else {
                $_SESSION['User'] = $row["email"];
                $_SESSION['role'] = $row['role_as'];
                header("location:./user/userDashboard.php");
            }
        }
    } else {
        header("location: login.php");
    }
}
