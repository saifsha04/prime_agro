<?php

session_start();

include "../config.php";

// LOGIN CHECK
if(!isset($_SESSION['user_id'])){

    header("Location: ../user/login.php");
    exit();

}

// BOOKING ID
$booking_id = (int) $_GET['booking_id'];

// FETCH BOOKING
$booking = $conn->query("

SELECT

bookings.*,
rooms.title,
rooms.image

FROM bookings

LEFT JOIN rooms
ON bookings.room_id = rooms.id

WHERE bookings.id='$booking_id'

")->fetch_assoc();

// NOT FOUND
if(!$booking){

    die("Booking not found");

}

// PAYMENT SUCCESS
if(isset($_GET['success'])){

    $conn->query("
    UPDATE bookings
    SET status='confirmed'
    WHERE id='$booking_id'
    ");

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Payment Success</title>

    <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-3xl shadow-xl text-center max-w-lg w-full">

        <div class="text-6xl mb-6">

            ✅

        </div>

        <h1 class="text-4xl font-bold mb-4 text-green-600">

            Payment Successful

        </h1>

        <p class="text-gray-600 mb-8">

            Your booking has been confirmed successfully.

        </p>

        <a href="../user/dashboard.php"

        class="bg-[#b8985f]
               hover:bg-[#a88850]
               text-white px-8 py-4 rounded-2xl">

            Go To Dashboard

        </a>

    </div>

    </body>
    </html>

    <?php

    exit();

}

// RAZORPAY AMOUNT
$amount = $booking['amount'] * 100;

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Payment</title>

<script src="https://cdn.tailwindcss.com"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body class="bg-gray-100 min-h-screen">

<!-- HEADER -->
<div class="bg-[#1f2937] text-white px-6 py-5 flex justify-between items-center">

    <h1 class="text-3xl font-bold">

        Complete Payment

    </h1>

    <a href="../user/dashboard.php"

    class="bg-white text-black px-5 py-2 rounded-lg">

        Dashboard

    </a>

</div>

<!-- CONTENT -->
<div class="max-w-6xl mx-auto p-6">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- ROOM -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- IMAGE -->
            <img src="<?= $booking['image'] ?>"

            class="w-full h-80 object-cover">

            <!-- DETAILS -->
            <div class="p-6">

                <h2 class="text-3xl font-bold mb-4">

                    <?= htmlspecialchars($booking['title']) ?>

                </h2>

                <div class="space-y-3 text-gray-700">

                    <p>

                        Guest:
                        <b>

                            <?= htmlspecialchars($booking['fname']) ?>

                            <?= htmlspecialchars($booking['lname']) ?>

                        </b>

                    </p>

                    <p>

                        Phone:
                        <b>

                            <?= htmlspecialchars($booking['phone']) ?>

                        </b>

                    </p>

                    <p>

                        Check In:
                        <b>

                            <?= $booking['check_in'] ?>

                        </b>

                    </p>

                    <p>

                        Check Out:
                        <b>

                            <?= $booking['check_out'] ?>

                        </b>

                    </p>

                </div>

            </div>

        </div>

        <!-- PAYMENT -->
        <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-center">

            <h2 class="text-3xl font-bold mb-8">

                Payment Summary

            </h2>

            <!-- AMOUNT -->
            <div class="bg-gray-100 rounded-3xl p-8 mb-8 text-center">

                <p class="text-gray-500 text-lg mb-3">

                    Total Amount

                </p>

                <h1 class="text-6xl font-bold text-[#b8985f]">

                    ₹<?= number_format($booking['amount']) ?>

                </h1>

            </div>

            <!-- PAY BUTTON -->
            <button id="payBtn"

            class="w-full bg-[#b8985f]
                   hover:bg-[#a88850]
                   text-white py-5 rounded-2xl
                   text-xl font-semibold">

                Pay Now

            </button>

        </div>

    </div>

</div>

<script>

var options = {

    "key": "rzp_test_xxxxx", // REPLACE WITH YOUR KEY

    "amount": "<?= $amount ?>",

    "currency": "INR",

    "name": "Prime Agro Farm",

    "description": "Room Booking Payment",

    "image": "../image/logo.png",

    "handler": function () {

        window.location.href =
        "payment.php?booking_id=<?= $booking_id ?>&success=1";

    },

    "theme": {

        "color": "#b8985f"

    }

};

var rzp = new Razorpay(options);

document.getElementById('payBtn').onclick = function(e){

    rzp.open();

    e.preventDefault();

}

</script>

</body>
</html>