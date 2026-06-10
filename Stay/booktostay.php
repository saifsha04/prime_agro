<?php
session_start();
include "../config.php";

// LOGIN CHECK
if (!isset($_SESSION['user_id'])) {

    header("Location: ../user/login.php?redirect=../Stay/booktostay.php");
    exit();

}

// FETCH ROOMS
$query = "
SELECT *
FROM rooms
ORDER BY id DESC
";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Book Your Stay</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 overflow-x-hidden">

<!-- ================= NAVBAR ================= -->

<nav class="bg-white shadow-md">

    <div class="max-w-7xl mx-auto
                px-4 md:px-8 py-4
                flex items-center justify-between">

        <!-- LEFT -->
        <div>

            <h1 class="text-2xl md:text-3xl
                       font-bold text-[#1a3d1a]">

                Prime Agro Farm

            </h1>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-2 md:gap-4">

            <!-- HOME -->
            <a href="../index.php"

            class="bg-blue-500 hover:bg-blue-600
                   text-white
                   px-4 md:px-5
                   py-2 rounded-lg
                   text-sm md:text-base
                   transition">

                Home

            </a>

            

            <!-- DASHBOARD -->
            <a href="../user/dashboard.php"

            class="bg-green-500 hover:bg-green-600
                   text-white
                   px-4 md:px-5
                   py-2 rounded-lg
                   text-sm md:text-base
                   transition">

                Dashboard

            </a>

            <!-- LOGOUT -->
            <a href="../user/logout.php"

            class="bg-red-500 hover:bg-red-600
                   text-white
                   px-4 md:px-5
                   py-2 rounded-lg
                   text-sm md:text-base
                   transition">

                Logout

            </a>

        </div>

    </div>

</nav>

<!-- ================= HEADER ================= -->

<div class="bg-[#1a3d1a] text-white py-10 text-center relative">

   <!-- STEPS -->
    <div class="flex justify-center items-center gap-4 md:gap-10 text-xs md:text-sm flex-wrap">

        <div class="text-center">

            <div class="text-2xl mb-2">🏠</div>

            <p>Select Your Room</p>

        </div>

        <div class="w-10 md:w-20 h-[1px] bg-white/40"></div>

        <div class="text-center">

            <div class="text-2xl mb-2">📄</div>

            <p>Personal Details</p>

        </div>

        <div class="w-10 md:w-20 h-[1px] bg-white/40"></div>

        <div class="text-center">

            <div class="text-2xl mb-2">💳</div>

            <p>Payment Confirmation</p>

        </div>

    </div>

</div>

<!-- ================= ROOMS ================= -->

<div class="max-w-7xl mx-auto py-14 px-4">

    <h3 class="text-center text-gray-600 text-lg mb-12">

        Rooms Available For Your Stay

    </h3>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <?php while($room = mysqli_fetch_assoc($result)): ?>

        <!-- ROOM CARD -->
        <div class="bg-white border border-[#d6c7a3]
                    rounded-2xl overflow-hidden
                    shadow-sm hover:shadow-xl
                    transition duration-300">

            <!-- IMAGE -->
            <div class="relative overflow-hidden">

                <img src="<?= $room['image'] ?>"

                     class="w-full h-64 object-cover
                            hover:scale-105 transition duration-700">

                <!-- STATUS -->
                <?php if($room['status'] == 'full'): ?>

                <div class="absolute top-4 right-4
                            bg-red-500 text-white text-xs
                            px-3 py-1 rounded-full shadow-md">

                    FULL

                </div>

                <?php else: ?>

                <div class="absolute top-4 right-4
                            bg-green-500 text-white text-xs
                            px-3 py-1 rounded-full shadow-md">

                    AVAILABLE

                </div>

                <?php endif; ?>

            </div>

            <!-- CONTENT -->
            <div class="p-6">

                <!-- TITLE -->
                <h2 class="text-lg font-bold text-gray-800 mb-3 uppercase">

                    <?= $room['title'] ?>

                </h2>

                <!-- DESCRIPTION -->
                <div class="border border-[#d6c7a3]
                            p-4 rounded-lg text-sm
                            text-gray-600 mb-5">

                    <p class="italic mb-3 text-[#c2a373]">

                        Find Your Oasis Close to Home

                    </p>

                    <ul class="list-disc ml-5 space-y-1">

                        <li>Inclusive of breakfast</li>
                        <li>Free Wi-Fi</li>
                        <li>Swimming Pool Access</li>
                        <li>Early check-in</li>
                        <li>Late check-out</li>

                    </ul>

                    <!-- DETAILS -->
                    <div class="mt-4 bg-[#e8dfc8]
                                text-center py-2 rounded
                                text-xs tracking-widest
                                cursor-pointer hover:bg-[#d8c9a5]
                                transition">

                        MORE DETAILS

                    </div>

                </div>

                <!-- ROOM INFO -->
                <div class="flex justify-between
                            text-xs text-gray-500 mb-5">

                    <span>
                        📐 <?= $room['size'] ?>
                    </span>

                    <span>
                        👥 <?= $room['guests'] ?>
                    </span>

                    <span>
                        🛏 <?= $room['bed'] ?>
                    </span>

                </div>

                <!-- PRICE -->
                <div class="text-center mb-5">

                    <p class="text-3xl font-bold text-[#b8985f]">

                        ₹<?= number_format($room['price']) ?>

                    </p>

                    <span class="text-sm text-gray-500">

                        Per Night

                    </span>

                </div>

                <!-- BUTTONS -->
                <div class="flex gap-3">

                    <!-- ADD TO WISHLIST -->
                    <a href="cart.php?add=<?= $room['id'] ?>"

                       class="w-1/2 text-center
                              border border-[#b8985f]
                              text-[#b8985f]
                              py-3 rounded-full
                              hover:bg-[#f3ead7]
                              transition">

                        ADD WISHLIST

                    </a>

                    <!-- BOOK -->
                    <?php if($room['status'] == 'full'): ?>

                    <button disabled

                        class="w-1/2 bg-gray-400
                               text-white py-3
                               rounded-full
                               cursor-not-allowed">

                        FULL

                    </button>

                    <?php else: ?>

                    <a href="booking.php?room_id=<?= $room['id'] ?>"

                       class="w-1/2 text-center
                              bg-[#b8985f]
                              text-white py-3
                              rounded-full
                              hover:bg-[#a88850]
                              transition">

                        BOOK NOW

                    </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</div>

</body>
</html>