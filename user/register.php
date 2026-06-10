<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Account</title>

<!-- Tailwind CDN -->
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
        CREATE AN ACCOUNT
    </h1>

    <p class="text-center text-gray-600 mb-8">
        Join Prime Agro Farm and book your peaceful stay
    </p>

    <!-- FORM -->
    <form action="register_process.php" method="POST" class="space-y-5">

        <!-- Name -->
        <div>
            <label class="block mb-1">Full Name</label>
            <input type="text" name="name" required
                placeholder="Your Name"
                class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-green-700">
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-1">Email (optional)</label>
            <input type="email" name="email"
                placeholder="Your Email"
                class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-green-700">
        </div>

        <!-- Phone -->
        <div>
            <label class="block mb-1">Phone (optional)</label>
            <input type="text" name="phone"
                placeholder="Your Phone Number"
                class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-green-700">
        </div>

        <p class="text-sm text-gray-500">
            Please enter at least one: Email or Phone.
        </p>

        <!-- Password -->
        <div>
            <label class="block mb-1">Password</label>
            <input type="password" name="password" required
                placeholder="Create a password"
                class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-green-700">
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full bg-[#4A5C33] text-white py-3 rounded-lg text-lg font-semibold hover:opacity-90 transition shadow-md">
            REGISTER
        </button>

    </form>

    <!-- Login link -->
    <p class="text-center mt-6 text-gray-600">
        Already have an account?
        <a href="login.php" class="text-yellow-600 font-semibold hover:underline">
            Login here
        </a>
    </p>

</div>

</body>
</html>