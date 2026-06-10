<?php

session_start();

include "../config.php";

// ADMIN CHECK
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {

    header("Location: ../user/login.php");
    exit();

}

// ================= STATS =================

// BOOKINGS
$totalBookings = $conn->query("
SELECT COUNT(*) as total
FROM bookings
")->fetch_assoc()['total'];

$pending = $conn->query("
SELECT COUNT(*) as total
FROM bookings
WHERE status='pending'
")->fetch_assoc()['total'];

$confirmed = $conn->query("
SELECT COUNT(*) as total
FROM bookings
WHERE status='confirmed'
")->fetch_assoc()['total'];

// USERS
$totalUsers = $conn->query("
SELECT COUNT(*) as total
FROM users
")->fetch_assoc()['total'];

// ROOMS
$totalRooms = $conn->query("
SELECT COUNT(*) as total
FROM rooms
")->fetch_assoc()['total'];

// CARTS
$totalCart = $conn->query("
SELECT COUNT(*) as total
FROM cart
")->fetch_assoc()['total'];

// ================= BOOKINGS =================

$bookings = $conn->query("

SELECT

b.*,
u.name AS user,
u.phone,
r.title AS room

FROM bookings b

LEFT JOIN users u
ON b.user_id = u.id

LEFT JOIN rooms r
ON b.room_id = r.id

ORDER BY b.id DESC

");

// ================= CARTS =================

$carts = $conn->query("

SELECT

cart.*,
users.name AS user,
rooms.title AS room

FROM cart

LEFT JOIN users
ON cart.user_id = users.id

LEFT JOIN rooms
ON cart.room_id = rooms.id

ORDER BY cart.id DESC

");

// ================= ROOMS =================

$rooms = $conn->query("
SELECT *
FROM rooms
ORDER BY id DESC
");

// ================= USERS =================

$users = $conn->query("
SELECT *
FROM users
ORDER BY id DESC
");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 overflow-x-hidden">

<div class="flex">

<!-- SIDEBAR -->

<div class="w-64 bg-[#1f2937] text-white min-h-screen p-6 hidden lg:block">

    <h2 class="text-2xl font-bold mb-10">

        Prime Agro

    </h2>

    <ul class="space-y-5 text-sm">

        <li class="text-yellow-400">
            Dashboard
        </li>

        

        <li>
            <a href="manage_rooms.php">
        Rooms
    </a>
        </li>

        <li>
            <a href="manage_wishlists.php">
                Wishlist Interest
            </a>
        </li>

        <li>
            Users
        </li>

        <li>

            <a href="../user/logout.php"
               class="text-red-400">

               Logout

            </a>

        </li>

    </ul>

</div>

<!-- MAIN -->

<div class="flex-1 p-4 md:p-8">

<!-- TOP -->

<div class="flex justify-between items-center mb-8">

<h1 class="text-3xl font-bold">

Admin Dashboard

</h1>

<a href="../index.php"

class="bg-[#b8985f]
text-white px-5 py-2 rounded-full">

Visit Website

</a>

</div>

<!-- STATS -->

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500 text-sm mb-2">
            Total Bookings
        </p>

        <h2 class="text-3xl font-bold">
            <?= $totalBookings ?>
        </h2>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500 text-sm mb-2">
            Pending
        </p>

        <h2 class="text-3xl font-bold text-yellow-500">
            <?= $pending ?>
        </h2>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500 text-sm mb-2">
            Confirmed
        </p>

        <h2 class="text-3xl font-bold text-green-500">
            <?= $confirmed ?>
        </h2>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500 text-sm mb-2">
            Users
        </p>

        <h2 class="text-3xl font-bold text-blue-500">
            <?= $totalUsers ?>
        </h2>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500 text-sm mb-2">
            Cart Interest
        </p>

        <h2 class="text-3xl font-bold text-purple-500">
            <?= $totalCart ?>
        </h2>

    </div>

</div>

<!-- BOOKINGS -->

<div class="bg-white rounded-2xl shadow p-6 mb-10 overflow-x-auto">

<h2 class="text-2xl font-bold mb-6">

Recent Bookings

</h2>

<table class="w-full text-sm">

<thead>

<tr class="border-b">

<th class="py-3 text-left">User</th>
<th class="py-3 text-left">Phone</th>
<th class="py-3 text-left">Room</th>
<th class="py-3 text-left">Dates</th>
<th class="py-3 text-left">Status</th>
<th class="py-3 text-left">Action</th>
<th class="py-3 text-left">Delete</th>

</tr>

</thead>

<tbody>

<?php while($row = $bookings->fetch_assoc()): ?>

<tr class="border-b hover:bg-gray-50">

<td class="py-4">

<?= $row['user'] ?>

</td>

<td>

<?= $row['phone'] ?>

</td>

<td>

<?= $row['room'] ?>

</td>

<td>

<?= $row['check_in'] ?>

→

<?= $row['check_out'] ?>

</td>

<td>

<?php if($row['status']=='pending'): ?>

<span class="text-yellow-500 font-semibold">

Pending

</span>

<?php elseif($row['status']=='confirmed'): ?>

<span class="text-green-500 font-semibold">

Confirmed

</span>

<?php else: ?>

<span class="text-red-500 font-semibold">

Cancelled

</span>

<?php endif; ?>

</td>

<td>

<?php if($row['status']=='pending'): ?>

<a href="approve.php?id=<?= $row['id'] ?>"

class="text-green-600 font-semibold">

Approve

</a>

|

<a href="reject.php?id=<?= $row['id'] ?>"

class="text-red-600 font-semibold">

Reject

</a>

<?php else: ?>

No Action

<?php endif; ?>

</td>

<td>

<a href="delete_booking.php?id=<?= $row['id'] ?>"

onclick="return confirm('Delete booking?')"

class="bg-red-500 hover:bg-red-600
text-white px-4 py-2 rounded-lg text-xs">

Delete

</a>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

<!-- USERS -->

<div class="bg-white rounded-2xl shadow p-6 mb-10 overflow-x-auto">

<h2 class="text-2xl font-bold mb-6">

Registered Users

</h2>

<table class="w-full text-sm">

<thead>

<tr class="border-b">

<th class="py-3 text-left">ID</th>
<th class="py-3 text-left">Name</th>
<th class="py-3 text-left">Email</th>
<th class="py-3 text-left">Phone</th>
<th class="py-3 text-left">Role</th>
<th class="py-3 text-left">Action</th>

</tr>

</thead>

<tbody>

<?php while($user = $users->fetch_assoc()): ?>

<tr class="border-b hover:bg-gray-50">

<td class="py-4">

<?= $user['id'] ?>

</td>

<td>

<?= htmlspecialchars($user['name']) ?>

</td>

<td>

<?= htmlspecialchars($user['email']) ?>

</td>

<td>

<?= htmlspecialchars($user['phone']) ?>

</td>

<td>

<?php if($user['role'] == 'admin'): ?>

<span class="text-red-500 font-semibold">

Admin

</span>

<?php else: ?>

<span class="text-green-500 font-semibold">

User

</span>

<?php endif; ?>

</td>

<td>

<?php if($user['role'] != 'admin'): ?>

<a href="delete_user.php?id=<?= $user['id'] ?>"

onclick="return confirm('Delete user?')"

class="bg-red-500 hover:bg-red-600
text-white px-4 py-2 rounded-lg text-xs">

Delete

</a>

<?php else: ?>

Protected

<?php endif; ?>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>