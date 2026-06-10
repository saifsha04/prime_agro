<?php

session_start();

include "../config.php";

// ADMIN CHECK
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){

    header("Location: ../user/login.php");
    exit();

}

// ================= DELETE wishlist =================

if(isset($_GET['delete_cart'])){

    $id = (int) $_GET['delete_cart'];

    $conn->query("
    DELETE FROM cart
    WHERE id='$id'
    ");

    header("Location: manage_wishlists.php");
    exit();

}

// ================= FETCH wishlists =================

$carts = $conn->query("

SELECT

cart.*,

users.id AS user_id,
users.name AS user,
users.phone,

rooms.id AS room_id,
rooms.title AS room

FROM cart

LEFT JOIN users
ON cart.user_id = users.id

LEFT JOIN rooms
ON cart.room_id = rooms.id

ORDER BY cart.id DESC

");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manage wishlist Interests</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen">

<!-- HEADER -->
<div class="bg-[#1f2937] text-white px-6 py-5 flex justify-between items-center">

    <h1 class="text-3xl font-bold">

        wishlist Interests

    </h1>

    <div class="flex gap-3">

        <a href="dashboard.php"

        class="bg-white text-black px-5 py-2 rounded-lg">

            Dashboard

        </a>

        <a href="../user/logout.php"

        class="bg-red-500 text-white px-5 py-2 rounded-lg">

            Logout

        </a>

    </div>

</div>

<!-- CONTENT -->
<div class="max-w-7xl mx-auto p-6">

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow overflow-x-auto">

        <table class="w-full text-sm">

            <thead>

                <tr class="border-b bg-gray-50">

                    <th class="py-4 px-4 text-left">

                        wishlist ID

                    </th>

                    <th class="py-4 px-4 text-left">

                        User ID

                    </th>

                    <th class="py-4 px-4 text-left">

                        User Name

                    </th>

                    <th class="py-4 px-4 text-left">

                        Phone Number

                    </th>

                    <th class="py-4 px-4 text-left">

                        Room ID

                    </th>

                    <th class="py-4 px-4 text-left">

                        Room Name

                    </th>

                    <th class="py-4 px-4 text-left">

                        Added Time

                    </th>

                    <th class="py-4 px-4 text-left">

                        Action

                    </th>

                </tr>

            </thead>

            <tbody>

            <?php if($carts->num_rows > 0): ?>

            <?php while($cart = $carts->fetch_assoc()): ?>

            <tr class="border-b hover:bg-gray-50">

                <!-- wishlist ID -->
                <td class="py-4 px-4">

                    <?= $cart['id'] ?>

                </td>

                <!-- USER ID -->
                <td class="px-4">

                    <?= $cart['user_id'] ?>

                </td>

                <!-- USER NAME -->
                <td class="px-4">

                    <?= htmlspecialchars($cart['user']) ?>

                </td>

                <!-- PHONE -->
                <td class="px-4">

                    <?= htmlspecialchars($cart['phone']) ?>

                </td>

                <!-- ROOM ID -->
                <td class="px-4">

                    <?= $cart['room_id'] ?>

                </td>

                <!-- ROOM -->
                <td class="px-4">

                    <?= htmlspecialchars($cart['room']) ?>

                </td>

                <!-- TIME -->
                <td class="px-4">

                    <?= $cart['added_at'] ?>

                </td>

                <!-- DELETE -->
                <td class="px-4">

                    <a href="?delete_cart=<?= $cart['id'] ?>"

                    onclick="return confirm('Delete this cart interest?')"

                    class="bg-red-500 hover:bg-red-600
                           text-white px-4 py-2 rounded-lg text-xs">

                        Delete

                    </a>

                </td>

            </tr>

            <?php endwhile; ?>

            <?php else: ?>

            <tr>

                <td colspan="8"

                class="py-10 text-center text-gray-500">

                    No wishlist interests found

                </td>

            </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>