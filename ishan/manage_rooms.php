<?php

session_start();

include "../config.php";

// ADMIN CHECK
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){

    header("Location: ../user/login.php");
    exit();

}

// ================= ADD ROOM =================

if(isset($_POST['add_room'])){

    $title = $_POST['title'];
    $image = $_POST['image'];
    $size = $_POST['size'];
    $guests = $_POST['guests'];
    $bed = $_POST['bed'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("

    INSERT INTO rooms
    (title,image,size,guests,bed,price,status)

    VALUES (?,?,?,?,?,?,?)

    ");

    $stmt->bind_param(
        "sssssis",
        $title,
        $image,
        $size,
        $guests,
        $bed,
        $price,
        $status
    );

    $stmt->execute();

    header("Location: manage_rooms.php");
    exit();

}

// ================= DELETE =================

if(isset($_GET['delete'])){

    $id = (int) $_GET['delete'];

    $conn->query("
    DELETE FROM rooms
    WHERE id='$id'
    ");

    header("Location: manage_rooms.php");
    exit();

}

// ================= MARK FULL =================

if(isset($_GET['full'])){

    $id = (int) $_GET['full'];

    $conn->query("
    UPDATE rooms
    SET status='full'
    WHERE id='$id'
    ");

    header("Location: manage_rooms.php");
    exit();

}

// ================= MAKE AVAILABLE =================

if(isset($_GET['available'])){

    $id = (int) $_GET['available'];

    $conn->query("
    UPDATE rooms
    SET status='available'
    WHERE id='$id'
    ");

    header("Location: manage_rooms.php");
    exit();

}

// ================= EDIT ROOM =================

if(isset($_POST['update_room'])){

    $id = $_POST['room_id'];

    $title = $_POST['title'];
    $image = $_POST['image'];
    $size = $_POST['size'];
    $guests = $_POST['guests'];
    $bed = $_POST['bed'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("

    UPDATE rooms

    SET

    title=?,
    image=?,
    size=?,
    guests=?,
    bed=?,
    price=?,
    status=?

    WHERE id=?

    ");

    $stmt->bind_param(
        "sssssisi",
        $title,
        $image,
        $size,
        $guests,
        $bed,
        $price,
        $status,
        $id
    );

    $stmt->execute();

    header("Location: manage_rooms.php");
    exit();

}

// ================= FETCH ROOMS =================

$rooms = $conn->query("
SELECT *
FROM rooms
ORDER BY id DESC
");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manage Rooms</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen">

<!-- HEADER -->
<div class="bg-[#1f2937] text-white px-6 py-5 flex justify-between items-center">

    <h1 class="text-3xl font-bold">

        Manage Rooms

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

    <!-- ADD ROOM -->
    <div class="bg-white rounded-2xl shadow p-6 mb-10">

        <h2 class="text-2xl font-bold mb-6">

            Add New Room

        </h2>

        <form method="POST"

        class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <input type="text"
            name="title"
            placeholder="Room Title"
            required
            class="border rounded-xl px-4 py-3">

            <input type="text"
            name="image"
            placeholder="../image/Living.jpg"
            required
            class="border rounded-xl px-4 py-3">

            <input type="text"
            name="size"
            placeholder="45 sq m"
            class="border rounded-xl px-4 py-3">

            <input type="text"
            name="guests"
            placeholder="Up to 4 guests"
            class="border rounded-xl px-4 py-3">

            <input type="text"
            name="bed"
            placeholder="King"
            class="border rounded-xl px-4 py-3">

            <input type="number"
            name="price"
            placeholder="4999"
            class="border rounded-xl px-4 py-3">

            <select name="status"

            class="border rounded-xl px-4 py-3">

                <option value="available">

                    Available

                </option>

                <option value="full">

                    Full

                </option>

            </select>

            <button type="submit"

            name="add_room"

            class="bg-[#b8985f]
                   hover:bg-[#a88850]
                   text-white px-6 py-3
                   rounded-xl">

                Add Room

            </button>

        </form>

    </div>

    <!-- ROOMS -->
    <div class="space-y-8">

    <?php while($room = $rooms->fetch_assoc()): ?>

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- IMAGE -->
            <div>

                <img src="<?= $room['image'] ?>"

                class="w-full h-64 object-cover rounded-xl">

            </div>

            <!-- FORM -->
            <div class="lg:col-span-2">

                <form method="POST"

                class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <input type="hidden"

                    name="room_id"

                    value="<?= $room['id'] ?>">

                    <!-- TITLE -->
                    <input type="text"

                    name="title"

                    value="<?= htmlspecialchars($room['title']) ?>"

                    class="border rounded-xl px-4 py-3">

                    <!-- IMAGE -->
                    <input type="text"

                    name="image"

                    value="<?= htmlspecialchars($room['image']) ?>"

                    class="border rounded-xl px-4 py-3">

                    <!-- SIZE -->
                    <input type="text"

                    name="size"

                    value="<?= htmlspecialchars($room['size']) ?>"

                    class="border rounded-xl px-4 py-3">

                    <!-- GUESTS -->
                    <input type="text"

                    name="guests"

                    value="<?= htmlspecialchars($room['guests']) ?>"

                    class="border rounded-xl px-4 py-3">

                    <!-- BED -->
                    <input type="text"

                    name="bed"

                    value="<?= htmlspecialchars($room['bed']) ?>"

                    class="border rounded-xl px-4 py-3">

                    <!-- PRICE -->
                    <input type="number"

                    name="price"

                    value="<?= $room['price'] ?>"

                    class="border rounded-xl px-4 py-3">

                    <!-- STATUS -->
                    <select name="status"

                    class="border rounded-xl px-4 py-3">

                        <option value="available"

                        <?= $room['status']=='available' ? 'selected' : '' ?>>

                            Available

                        </option>

                        <option value="full"

                        <?= $room['status']=='full' ? 'selected' : '' ?>>

                            Full

                        </option>

                    </select>

                    <!-- UPDATE -->
                    <button type="submit"

                    name="update_room"

                    class="bg-blue-500 hover:bg-blue-600
                           text-white rounded-xl px-6 py-3">

                        Update Room

                    </button>

                </form>

                <!-- ACTIONS -->
                <div class="flex flex-wrap gap-3 mt-6">

                    <?php if($room['status'] == 'available'): ?>

                    <a href="?full=<?= $room['id'] ?>"

                    class="bg-yellow-500 hover:bg-yellow-600
                           text-white px-5 py-3 rounded-xl">

                        Mark Full

                    </a>

                    <?php else: ?>

                    <a href="?available=<?= $room['id'] ?>"

                    class="bg-green-500 hover:bg-green-600
                           text-white px-5 py-3 rounded-xl">

                        Make Available

                    </a>

                    <?php endif; ?>

                    <a href="?delete=<?= $room['id'] ?>"

                    onclick="return confirm('Delete this room?')"

                    class="bg-red-500 hover:bg-red-600
                           text-white px-5 py-3 rounded-xl">

                        Delete Room

                    </a>

                </div>

            </div>

        </div>

    </div>

    <?php endwhile; ?>

    </div>

</div>

</body>
</html>