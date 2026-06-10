<?php

session_start();

include "../config.php";

// ADMIN CHECK
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){

    header("Location: ../user/login.php");
    exit();

}

// USER ID
$id = (int) $_GET['id'];

// DELETE USER
$conn->query("
DELETE FROM users
WHERE id='$id'
AND role!='admin'
");

// REDIRECT
header("Location: dashboard.php");

exit();

?>