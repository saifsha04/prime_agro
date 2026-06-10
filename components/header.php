<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-12 py-4">

<script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Copperplate+Gothic+Std+32+BC&display=swap" rel="stylesheet">

  <!-- FONT -->
  <style>
    @font-face {
      font-family: 'Cinzel';
      src: url('fonts/Cinzel-Regular.otf') format('woff');
    }

    @font-face {
      font-family: 'poppins';
      src: url('fonts/Poppins-Regular.ttf') format('woff');
    }

    @font-face {
      font-family: 'Copperplate';
      src: url('fonts/Copperplate\ Gothic\ Std\ 32\ BC.otf') format('woff');
    }
  </style>

  <div class="w-full flex justify-between items-center">

    <!-- LOGO + TEXT -->
    <div class="flex flex-col items-start md:items-start">
<a href="index.php" class="flex-shrink-0">
      <img src="image/LOGOS.png" alt="Prime Agro Farm"
        class="h-24 sm:h-28 md:h-32 w-auto lg:ml-4 sm:ml-2 md:ml-8"></a>

      <!-- <div class="leading-tight mt-1 font-[Copperplate]">

        <h1 class="text-white text-[12px] sm:text-lg md:text-xl tracking-[2px]  lg:ml-[-15px]">
          PRIME AGRO FARM
        </h1>

        <p class="text-white text-[6px] md:text-[12px] lg:ml-0 ml-2 tracking-[3px] font-[Copperplate] ">
          FARM LIFE, FINE STAY
        </p>

      </div> -->
    </div>

    <!-- DESKTOP MENU -->
    <nav class="hidden md:flex items-center font-[Cinzel] font-bold space-x-6 lg:space-x-8 text-white">

      <a href="index.php" class="hover:underline">HOME</a>
      <a href="#about" class="hover:underline">ABOUT US</a>
      <a href="#gallery" class="hover:underline">GALLERY</a>
      <a href="#contact" class="hover:underline">CONTACT</a>

      <?php if (isset($_SESSION['user_id'])) { ?>
        <a href="user/logout.php" class="hover:underline text-red-400">LOGOUT</a>
      <?php } else { ?>
      <!-- Later Change to a tag -->
        <p href="user/login.php" class="hover:underline">LOGIN</p>
      <?php } ?>

    </nav>

    <!-- DESKTOP RIGHT -->
    <div class="hidden md:flex items-center space-x-4">
<!-- Later Change to a tag -->
      <p href="
<?php
if(isset($_SESSION['user_id'])){
    echo "#book";
} else {
    echo "user/login.php?redirect=" . urlencode("#book");
}
?>
"
class="bg-[#4A5C33] text-white font-[Cinzel] font-bold px-4 py-2 rounded-md hover:opacity-80 transition">

BOOK A STAY

</p>


      <!-- USER ICON ONLY IF LOGGED IN -->
<?php if (isset($_SESSION['user_id'])) { ?>

<div class="relative">

    <!-- USER ICON -->
    <div onclick="toggleUserMenu()"

        class="w-10 h-10 bg-white rounded-full
               flex items-center justify-center
               cursor-pointer shadow-md">

        <svg class="h-6 w-6 text-gray-800"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"

                  d="M16 7a4 4 0 11-8 0
                     4 4 0 018 0z
                     M12 14a7 7 0 00-7 7
                     h14a7 7 0 00-7-7z"/>

        </svg>

    </div>

    <!-- DROPDOWN -->
    <div id="userMenu"

        class="hidden absolute right-0 mt-3
               w-64 bg-white text-black
               rounded-2xl shadow-2xl
               p-5 z-50">

        <!-- USER INFO -->
        <p class="font-bold text-lg">

            <?= htmlspecialchars($_SESSION['name'] ?? 'User'); ?>

        </p>

        <p class="text-sm text-gray-600">

            <?= htmlspecialchars($_SESSION['email'] ?? ''); ?>

        </p>

        <p class="text-sm text-gray-600">

            <?= htmlspecialchars($_SESSION['phone'] ?? ''); ?>

        </p>

        <!-- ROLE -->
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>

        <p class="text-xs text-red-500 mt-2 font-semibold">

            ADMIN ACCOUNT

        </p>

        <?php else: ?>

        <p class="text-xs text-green-600 mt-2 font-semibold">

            USER ACCOUNT

        </p>

        <?php endif; ?>

        <hr class="my-4">

        <!-- DASHBOARD -->
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>

        <a href="ishan/dashboard.php"

           class="block py-2 hover:text-green-700 transition">

            Admin Dashboard

        </a>

        <?php else: ?>

        <a href="user/dashboard.php"

           class="block py-2 hover:text-green-700 transition">

            User Dashboard

        </a>

        <?php endif; ?>

        <!-- PAYMENTS -->
        <a href="user/payments.php"

           class="block py-2 hover:text-green-700 transition">

            Payments

        </a>

        <hr class="my-4">

        <!-- LOGOUT -->
        <a href="user/logout.php"

           class="text-red-600 font-semibold
                  hover:text-red-700 transition">

            Logout

        </a>

    </div>

</div>

<?php } ?>
    </div>

    <div class="md:hidden mr-3">

  <button onclick="toggleMenu()"

    class="text-white
           text-3xl
           font-bold
           leading-none">

    ☰

  </button>

</div>

  <!-- MOBILE MENU -->
  <div id="mobileMenu"
    class="hidden md:hidden font-[Cinzel] absolute top-full left-0 w-full bg-black/95 backdrop-blur-sm">

    <nav class="flex flex-col items-center space-y-5 py-6 text-white text-lg">

      <a href="index.php" onclick="toggleMenu()">HOME</a>
      <a href="#about" onclick="toggleMenu()">ABOUT US</a>
      <a href="#gallery" onclick="toggleMenu()">GALLERY</a>
      <a href="#contact" onclick="toggleMenu()">CONTACT</a>

      <?php if (isset($_SESSION['user_id'])) { ?>
        <a href="user/dashboard.php" onclick="toggleMenu()">Dashboard</a>
        <a href="user/payments.php" onclick="toggleMenu()">Payments</a>
        <a href="user/logout.php" onclick="toggleMenu()" class="text-red-400">Logout</a>
      <?php } else { ?><!-- Later Change to a tag -->
        <a href="user/login.php" onclick="toggleMenu()">LOGIN</a>
      <?php } ?>
<!-- Later Change to a tag -->
      <p href="
<?php
if(isset($_SESSION['user_id'])){
    echo "#book";
} else {
    echo "user/login.php?redirect=" . urlencode("#book");
}
?>
"
        class="bg-[#4A5C33] px-6 py-2 rounded-md">
        BOOK A STAY
        </p>

    </nav>
  </div>

</header>

<!-- JS -->
<script>
function toggleMenu() {
  document.getElementById("mobileMenu").classList.toggle("hidden");
}

function toggleUserMenu() {
  document.getElementById("userMenu").classList.toggle("hidden");
}
</script>