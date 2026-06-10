<?php
include "../config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if(empty($email) && empty($phone)){
    die("Email or Phone required");
}

$stmt = $conn->prepare("INSERT INTO users (name,email,phone,password) VALUES (?,?,?,?)");
$stmt->bind_param("ssss", $name, $email, $phone, $password);
$stmt->execute();

header("Location: login.php");