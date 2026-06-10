<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Inter:wght@300;400;500&display=swap');

body {
    font-family: 'Inter', sans-serif;
}
.title-font {
    font-family: 'Cinzel', serif;
}
</style>
</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen">


<div class="bg-gray-100 p-10 rounded-3xl shadow-lg w-full max-w-md">

    <!-- Title -->
    <h1 class="title-font text-3xl text-center mb-4 tracking-wide">
        WELCOME BACK
    </h1>

    <p class="text-center text-gray-600 mb-8">
        Login to continue your stay journey
    </p>

    <!-- FORM -->
    <form action="login_process.php" method="POST" class="space-y-5">

        <!-- Email or Phone -->
        <div>
            <label class="block mb-1">Email or Phone</label>
            <input type="text" name="login"
                placeholder="Enter Email or Phone"
                required
                class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-green-700">
        </div>

        <!-- Password -->
        <div>
            <label class="block mb-1">Password</label>
            <input type="password" name="password"
                placeholder="Enter your password"
                required
                class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-green-700">
        </div>
            <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '') ?>">
        <!-- Button -->
        <button type="submit"
            class="w-full bg-[#4A5C33] text-white py-3 rounded-lg text-lg font-semibold hover:opacity-90 transition shadow-md">
            LOGIN
        </button>

    </form>

    <!-- Forgot password -->
    <p class="text-center mt-5">
        <a href="#" class="text-yellow-600 font-semibold hover:underline">
            Forgot password?
        </a>
    </p>

    <!-- Register link -->
    <p class="text-center mt-4 text-gray-600">
        Don’t have an account?
        <a href="register.php"
           class="text-yellow-600 font-semibold hover:underline">
            Register here
        </a>
    </p>

    <a href="../index.php"
   class="absolute top-4 right-4 bg-red-500 hover:bg-red-600 w-10 h-10 rounded-full flex items-center justify-center text-white shadow-md">
    ✕
</a>

</div>

</body>

</html>