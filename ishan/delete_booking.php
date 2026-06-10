<?php

session_start();

include "../config.php";

// ADMIN CHECK
if (!isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'admin') {

    header("Location: ../user/login.php");
    exit();

}

// CHECK ID
if (!isset($_GET['id'])) {

    die("Booking ID Missing");

}

$id = (int) $_GET['id'];

// DELETE
$stmt = $conn->prepare("
DELETE FROM bookings
WHERE id = ?
");

$stmt->bind_param("i", $id);

$stmt->execute();

// REDIRECT
header("Location: dashboard.php");

exit();

?>