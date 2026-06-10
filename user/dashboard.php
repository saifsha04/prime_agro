<?php

session_start();

include "../config.php";

// LOGIN CHECK
if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit();

}

$user_id = $_SESSION['user_id'];

// ================= USER =================

$user_stmt = $conn->prepare("
SELECT *
FROM users
WHERE id = ?
LIMIT 1
");

$user_stmt->bind_param("i", $user_id);

$user_stmt->execute();

$user = $user_stmt->get_result()->fetch_assoc();

$username = $user['name'] ?? 'User';

// ================= BOOKINGS =================

$booking_stmt = $conn->prepare("

SELECT

b.*,
r.title,
r.price

FROM bookings b

LEFT JOIN rooms r
ON b.room_id = r.id

WHERE b.user_id = ?

ORDER BY b.id DESC

");

$booking_stmt->bind_param("i", $user_id);

$booking_stmt->execute();

$bookings = $booking_stmt->get_result();

// ================= CART =================

$cart_stmt = $conn->prepare("

SELECT

cart.id as cart_id,
rooms.*

FROM cart

LEFT JOIN rooms
ON cart.room_id = rooms.id

WHERE cart.user_id = ?

ORDER BY cart.id DESC

");

$cart_stmt->bind_param("i", $user_id);

$cart_stmt->execute();

$carts = $cart_stmt->get_result();

// ================= STATS =================

$totalBookings = $conn->query("
SELECT COUNT(*) as total
FROM bookings
WHERE user_id='$user_id'
")->fetch_assoc()['total'];

$pendingBookings = $conn->query("
SELECT COUNT(*) as total
FROM bookings
WHERE user_id='$user_id'
AND status='pending'
")->fetch_assoc()['total'];

$confirmedBookings = $conn->query("
SELECT COUNT(*) as total
FROM bookings
WHERE user_id='$user_id'
AND status='confirmed'
")->fetch_assoc()['total'];

$totalCart = $conn->query("
SELECT COUNT(*) as total
FROM cart
WHERE user_id='$user_id'
")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Inter:wght@300;400;500&display=swap');

body{

    font-family:'Inter',sans-serif;

}

.title-font{

    font-family:'Cinzel',serif;

}

</style>

</head>

<body class="bg-gray-100 min-h-screen overflow-x-hidden">

<!-- ================= NAVBAR ================= -->

<nav class="bg-white shadow-md px-4 md:px-8 py-4 flex justify-between items-center">

    <h1 class="title-font text-xl md:text-2xl">

        Prime Agro Farm

    </h1>

    <div class="flex gap-3">

        <a href="../index.php"

        class="bg-blue-500 text-white px-5 py-2 rounded-lg">

            Home

        </a>

        <a href="logout.php"

        class="bg-red-500 text-white px-5 py-2 rounded-lg">

            Logout

        </a>

    </div>

</nav>

<!-- ================= CONTENT ================= -->

<div class="max-w-7xl mx-auto p-4 md:p-6">

    <!-- WELCOME -->
    <div class="bg-white rounded-3xl shadow-md p-8 mb-8">

        <h1 class="text-3xl md:text-4xl font-bold mb-3">

            Welcome <?= htmlspecialchars($username) ?>

        </h1>

        <p class="text-gray-600">

            Manage your bookings and explore peaceful stays.

        </p>

    </div>

    <!-- ================= STATS ================= -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">

                Total Bookings

            </p>

            <h2 class="text-4xl font-bold">

                <?= $totalBookings ?>

            </h2>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">

                Pending

            </p>

            <h2 class="text-4xl font-bold text-yellow-500">

                <?= $pendingBookings ?>

            </h2>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">

                Confirmed

            </p>

            <h2 class="text-4xl font-bold text-green-500">

                <?= $confirmedBookings ?>

            </h2>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">

                Saved Rooms

            </p>

            <h2 class="text-4xl font-bold text-purple-500">

                <?= $totalCart ?>

            </h2>

        </div>

    </div>

    <!-- ================= ACTION BUTTON ================= -->

    <div class="mb-10">

        <a href="../Stay/booktostay.php"

        class="bg-[#4A5C33]
               text-white
               px-8 py-4
               rounded-xl
               shadow-lg
               hover:opacity-90
               transition">

            Book New Stay

        </a>

    </div>

    <!-- ================= BOOKINGS ================= -->

    <div class="bg-white rounded-3xl shadow-md overflow-hidden mb-10">

        <div class="p-6 border-b">

            <h2 class="text-2xl font-bold">

                Your Bookings

            </h2>

        </div>

        <div class="overflow-x-auto">

        <table class="w-full min-w-[700px]">

            <tr class="bg-gray-100 text-left">

                <th class="p-4">Room</th>
                <th class="p-4">Price</th>
                <th class="p-4">Check In</th>
                <th class="p-4">Check Out</th>
                <th class="p-4">Status</th>

            </tr>

            <?php if($bookings->num_rows > 0): ?>

                <?php while($row = $bookings->fetch_assoc()): ?>

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">

                        <?= htmlspecialchars($row['title']) ?>

                    </td>

                    <td class="p-4">

                        ₹<?= number_format($row['price']) ?>

                    </td>

                    <td class="p-4">

                        <?= htmlspecialchars($row['check_in']) ?>

                    </td>

                    <td class="p-4">

                        <?= htmlspecialchars($row['check_out']) ?>

                    </td>

                    <td class="p-4">

                        <?php if($row['status'] == 'pending'): ?>

                        <span class="bg-yellow-100
                                     text-yellow-700
                                     px-3 py-1
                                     rounded-full text-sm">

                            Pending

                        </span>

                        <?php elseif($row['status'] == 'confirmed'): ?>

                        <span class="bg-green-100
                                     text-green-700
                                     px-3 py-1
                                     rounded-full text-sm">

                            Confirmed

                        </span>

                        <?php else: ?>

                        <span class="bg-red-100
                                     text-red-700
                                     px-3 py-1
                                     rounded-full text-sm">

                            Cancelled

                        </span>

                        <?php endif; ?>

                    </td>

                </tr>

                <?php endwhile; ?>

            <?php else: ?>

            <tr>

                <td colspan="5"

                    class="p-10 text-center text-gray-500">

                    No bookings found

                </td>

            </tr>

            <?php endif; ?>

        </table>

        </div>

    </div>

    <!-- ================= SAVED ROOMS ================= -->

    <div class="bg-white rounded-3xl shadow-md p-6">

        <h2 class="text-2xl font-bold mb-8">

            Saved Rooms

        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php if($carts->num_rows > 0): ?>

            <?php while($room = $carts->fetch_assoc()): ?>

            <!-- ROOM -->
            <div class="border rounded-2xl overflow-hidden shadow-sm">

                <img src="<?= $room['image'] ?>"

                class="w-full h-56 object-cover">

                <div class="p-5">

                    <h3 class="text-xl font-bold mb-3">

                        <?= $room['title'] ?>

                    </h3>

                    <p class="text-[#b8985f]
                              text-2xl font-bold mb-5">

                        ₹<?= number_format($room['price']) ?>

                    </p>

                    <div class="flex gap-3">

                        <a href="../Stay/booking.php?room_id=<?= $room['id'] ?>"

                        class="w-1/2 text-center
                               bg-[#b8985f]
                               text-white py-3
                               rounded-full">

                            BOOK

                        </a>

                        <a href="../Stay/cart.php?remove=<?= $room['cart_id'] ?>"

onclick="return confirm('Remove this wishlist?')"

class="w-1/2 text-center
       bg-red-500
       text-white py-3
       rounded-full">

    REMOVE

</a>

                    </div>

                </div>

            </div>

            <?php endwhile; ?>

            <?php else: ?>

            <div class="col-span-full text-center py-10 text-gray-500">

                No saved rooms yet

            </div>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>
</html>