<?php

session_start();

include "../config.php";

// CHECK REQUEST METHOD
if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: login.php");
    exit();

}

// SAFE VALUES
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
$redirect = $_POST['redirect'] ?? '';

// EMPTY CHECK
if (empty($login) || empty($password)) {

    die("Please enter login and password");

}

// FETCH USER
$stmt = $conn->prepare("SELECT * FROM users WHERE email=? OR phone=?");

$stmt->bind_param("ss", $login, $login);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

// VERIFY PASSWORD
if ($user && password_verify($password, $user['password'])) {

    // SESSION
    $_SESSION['user_id'] = $user['id'];

    $_SESSION['role'] = $user['role'];

    $_SESSION['name'] = $user['name'];

    $_SESSION['email'] = $user['email'];

    $_SESSION['phone'] = $user['phone'];

    // REDIRECT
    if (!empty($redirect)) {

        header("Location: " . $redirect);

    } else {

        if ($user['role'] == 'admin') {

            header("Location: ../ishan/dashboard.php");

        } else {

            header("Location: ../index.php");

        }

    }

    exit();

} else {

    echo "
    <div style='
        font-family:sans-serif;
        text-align:center;
        margin-top:100px;
    '>

        <h2 style='color:red;'>
            Invalid Login Credentials
        </h2>

        <a href='login.php'
           style='
             display:inline-block;
             margin-top:20px;
             padding:10px 20px;
             background:#b8985f;
             color:white;
             text-decoration:none;
             border-radius:30px;
           '>

           Back to Login

        </a>

    </div>
    ";

}

?>