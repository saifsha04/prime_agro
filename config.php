<?php
// DB
$conn = new mysqli("localhost", "root", "", "prime_agro");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

// BASE URL (change if your folder name differs)
define('BASE_URL', '/prime_agro/');