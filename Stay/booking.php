<?php

session_start();

include "../config.php";

// LOGIN CHECK
if(!isset($_SESSION['user_id'])){

    header("Location: ../user/login.php");
    exit();

}

// ROOM ID
$room_id = (int) $_GET['room_id'];

// FETCH ROOM
$room = $conn->query("
SELECT *
FROM rooms
WHERE id='$room_id'
")->fetch_assoc();

// ROOM NOT FOUND
if(!$room){

    die("Room not found");

}

// ================= BOOKING SUBMIT =================

if(isset($_POST['book_now'])){

    $user_id = $_SESSION['user_id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $aadhaar = $_POST['aadhaar'];

    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $amount = $room['price'];

    // INSERT BOOKING
    $stmt = $conn->prepare("

    INSERT INTO bookings

    (
        user_id,
        room_id,
        fname,
        lname,
        phone,
        aadhaar,
        check_in,
        check_out,
        amount
    )

    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)

    ");

    $stmt->bind_param(

        "iissssssd",

        $user_id,
        $room_id,
        $fname,
        $lname,
        $phone,
        $aadhaar,
        $check_in,
        $check_out,
        $amount

    );

    $stmt->execute();

    // BOOKING ID
    $booking_id = $stmt->insert_id;

    // REDIRECT
    header("Location: payment.php?booking_id=$booking_id");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Book Room</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen">

<!-- HEADER -->
<div class="bg-[#1f2937] text-white px-6 py-5 flex justify-between items-center">

    <h1 class="text-3xl font-bold">

        Book Your Stay

    </h1>

    <a href="booktostay.php"

    class="bg-white text-black px-5 py-2 rounded-lg">

        Back

    </a>

</div>

<!-- CONTENT -->
<div class="max-w-6xl mx-auto p-6">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- ROOM -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- IMAGE -->
            <img src="<?= $room['image'] ?>"

            class="w-full h-80 object-cover">

            <!-- DETAILS -->
            <div class="p-6">

                <h2 class="text-3xl font-bold mb-4">

                    <?= htmlspecialchars($room['title']) ?>

                </h2>

                <p class="text-[#b8985f]
                          text-4xl font-bold mb-6">

                    ₹<?= number_format($room['price']) ?>

                    <span class="text-lg text-gray-500">

                        / night

                    </span>

                </p>

                <div class="space-y-3 text-gray-700">

                    <p>

                        📐 <?= htmlspecialchars($room['size']) ?>

                    </p>

                    <p>

                        👥 <?= htmlspecialchars($room['guests']) ?>

                    </p>

                    <p>

                        🛏 <?= htmlspecialchars($room['bed']) ?>

                    </p>

                </div>

            </div>

        </div>

        <!-- FORM -->
        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-2xl font-bold mb-8">

                Guest Information

            </h2>

            <form method="POST"

            class="space-y-5">

                <!-- FIRST NAME -->
                <div>

                    <label class="block mb-2 font-semibold">

                        First Name

                    </label>

                    <input type="text"

                    name="fname"

                    required

                    class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- LAST NAME -->
                <div>

                    <label class="block mb-2 font-semibold">

                        Last Name

                    </label>

                    <input type="text"

                    name="lname"

                    required

                    class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- PHONE -->
                <div>

                    <label class="block mb-2 font-semibold">

                        Phone Number

                    </label>

                    <input type="text"

                    name="phone"

                    required

                    class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- AADHAAR -->
                <div>

                    <label class="block mb-2 font-semibold">

                        Aadhaar Number

                    </label>

                    <input type="text"

                    name="aadhaar"

                    required

                    class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- CHECK IN -->
                <div>

                    <label class="block mb-2 font-semibold">

                        Check In

                    </label>

                    <input type="date"

                    name="check_in"

                    required

                    class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- CHECK OUT -->
                <div>

                    <label class="block mb-2 font-semibold">

                        Check Out

                    </label>

                    <input type="date"

                    name="check_out"

                    required

                    class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- TOTAL -->
                <div class="bg-gray-100 rounded-2xl p-5">

                    <p class="text-lg text-gray-600 mb-2">

                        Total Amount

                    </p>

                    <h2 class="text-4xl font-bold text-[#b8985f]">

                        ₹<?= number_format($room['price']) ?>

                    </h2>

                </div>

                <!-- BUTTON -->
                <button type="submit"

                name="book_now"

                class="w-full bg-[#b8985f]
                       hover:bg-[#a88850]
                       text-white py-4
                       rounded-2xl
                       text-lg font-semibold">

                    Proceed to Payment

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>