<?php

session_start();

include "../config.php";

// LOGIN CHECK
if(!isset($_SESSION['user_id'])){

    header("Location: ../user/login.php");
    exit();

}

$user_id = $_SESSION['user_id'];

// ================= ADD TO WISHLIST =================

if(isset($_GET['add'])){

    $room_id = (int) $_GET['add'];

    // CHECK ROOM EXISTS
    $checkRoom = $conn->prepare("
    SELECT * FROM rooms
    WHERE id=?
    ");

    $checkRoom->bind_param("i", $room_id);

    $checkRoom->execute();

    $roomResult = $checkRoom->get_result();

    if($roomResult->num_rows > 0){

        // CHECK ALREADY EXISTS
        $checkCart = $conn->prepare("
        SELECT * FROM cart
        WHERE user_id=? AND room_id=?
        ");

        $checkCart->bind_param(
            "ii",
            $user_id,
            $room_id
        );

        $checkCart->execute();

        $cartResult = $checkCart->get_result();

        // INSERT IF NOT EXISTS
        if($cartResult->num_rows == 0){

            $insert = $conn->prepare("
            INSERT INTO cart
            (user_id, room_id)
            VALUES (?,?)
            ");

            $insert->bind_param(
                "ii",
                $user_id,
                $room_id
            );

            $insert->execute();

        }

    }

    // STAY ON BOOK TO STAY PAGE
    header("Location: booktostay.php");
    exit();

}

// ================= REMOVE WISHLIST =================

if(isset($_GET['remove'])){

    $cart_id = (int) $_GET['remove'];

    $delete = $conn->prepare("
    DELETE FROM cart
    WHERE id=? AND user_id=?
    ");

    $delete->bind_param(
        "ii",
        $cart_id,
        $user_id
    );

    $delete->execute();

    // RETURN TO DASHBOARD
    header("Location: ../user/dashboard.php");
    exit();

}

// ================= FETCH WISHLIST =================

$query = "

SELECT

cart.id as cart_id,

rooms.*

FROM cart

JOIN rooms
ON cart.room_id = rooms.id

WHERE cart.user_id = '$user_id'

ORDER BY cart.id DESC

";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>My Wishlist</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white shadow-md px-4 md:px-8 py-4 flex justify-between items-center">

    <h1 class="text-xl md:text-2xl font-bold">

        Prime Agro Farm

    </h1>

    <div class="flex gap-3">

        <a href="../index.php"

        class="bg-blue-500 hover:bg-blue-600
               text-white px-5 py-2 rounded-lg">

            Home

        </a>

        <a href="../user/dashboard.php"

        class="bg-green-500 hover:bg-green-600
               text-white px-5 py-2 rounded-lg">

            Dashboard

        </a>

        <a href="../user/logout.php"

        class="bg-red-500 hover:bg-red-600
               text-white px-5 py-2 rounded-lg">

            Logout

        </a>

    </div>

</nav>

<!-- CONTENT -->
<div class="max-w-7xl mx-auto py-12 px-4">

    <h1 class="text-4xl font-bold mb-10 text-center">

        My Wishlist

    </h1>

    <!-- EMPTY -->
    <?php if(mysqli_num_rows($result) == 0): ?>

    <div class="bg-white rounded-3xl shadow-lg p-10 text-center">

        <div class="text-6xl mb-5">

            🛒

        </div>

        <h2 class="text-3xl font-bold mb-3">

            Wishlist Empty

        </h2>

        <p class="text-gray-500 mb-8">

            No rooms added yet

        </p>

        <a href="../Stay/booktostay.php"

        class="bg-[#b8985f]
               hover:bg-[#a88850]
               text-white px-8 py-4 rounded-2xl">

            Explore Rooms

        </a>

    </div>

    <?php else: ?>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    <?php while($room = mysqli_fetch_assoc($result)): ?>

    <div class="bg-white rounded-3xl overflow-hidden shadow-lg">

        <!-- IMAGE -->
        <img src="<?= $room['image'] ?>"

        class="w-full h-64 object-cover">

        <!-- CONTENT -->
        <div class="p-6">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold mb-4">

                <?= htmlspecialchars($room['title']) ?>

            </h2>

            <!-- PRICE -->
            <p class="text-[#b8985f]
                      text-3xl font-bold mb-6">

                ₹<?= number_format($room['price']) ?>

                <span class="text-lg text-gray-500">

                    / night

                </span>

            </p>

            <!-- DETAILS -->
            <div class="space-y-2 text-gray-700 mb-6">

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

            <!-- BUTTONS -->
            <div class="flex gap-3">

                <!-- BOOK -->
                <a href="booking.php?room_id=<?= $room['id'] ?>"

                class="w-1/2 text-center
                       bg-[#b8985f]
                       hover:bg-[#a88850]
                       text-white py-3 rounded-2xl">

                    BOOK NOW

                </a>

                <!-- REMOVE -->
                <a href="?remove=<?= $room['cart_id'] ?>"

                onclick="return confirm('Remove this wishlist?')"

                class="w-1/2 text-center
                       bg-red-500
                       hover:bg-red-600
                       text-white py-3 rounded-2xl">

                    REMOVE

                </a>

            </div>

        </div>

    </div>

    <?php endwhile; ?>

    </div>

    <?php endif; ?>

</div>

</body>
</html>