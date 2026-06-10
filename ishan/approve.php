<?php
session_start();
include "../config.php";

$id = (int) $_GET['id'];

$conn->query("UPDATE bookings SET status='confirmed' WHERE id=$id");

header("Location: dashboard.php");
exit();