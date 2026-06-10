<?php
include 'config.php';

$messageSent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // sanitize
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if ($name && $email && $subject && $message) {

        // INSERT INTO DB (prepared statement)
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        $stmt->execute();

        // SEND EMAIL
        $to = "youremail@gmail.com";
        $headers = "From: $email";
        mail($to, $subject, $message, $headers);

        $messageSent = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Prime Agro Farm Footer</title>

<script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Copperplate+Gothic+Std+32+BC&display=swap" rel="stylesheet">
    
<style>
.instagram-img:hover img{
transform: scale(1.1);
}

.instagram-img:hover .overlay{
opacity:1;
}

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

</head>

<body>

<footer class="w-full">

<!-- INSTAGRAM SECTION -->
<div id="contact" class="bg-white text-gray-800 py-12 md:py-16">

<div class="max-w-7xl mx-auto px-4">

<div class="text-center mb-12">

<h2 class="text-2xl md:text-3xl font-serif text-[#B8985F] uppercase font-[Cinzel] ">
Follow us on <br> Instagram
</h2>

<p class="text-sm text-gray-600 mb-6 font-[poppins]">@primeagrofarm</p>

<!-- IMAGE GRID -->

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">

<?php
$images = [
["img"=>"image/bedroom.jpg","alt"=>"Room","link"=>"https://www.instagram.com/p/DOf_9tPk2MQ/?igsh=N2xlNnYwY2MxaDBw"],
["img"=>"image/Living.jpg","alt"=>"Living","link"=>"https://www.instagram.com/p/DOf_9tPk2MQ/?igsh=N2xlNnYwY2MxaDBw"],
["img"=>"image/Swimming.png","alt"=>"Swimming","link"=>"https://www.instagram.com/p/DOf_9tPk2MQ/?igsh=N2xlNnYwY2MxaDBw"],
["img"=>"image/view.png","alt"=>"View","link"=>"https://www.instagram.com/p/DOf_9tPk2MQ/?igsh=N2xlNnYwY2MxaDBw"]
];

foreach($images as $img){
?>

<div class="instagram-img relative aspect-square overflow-hidden rounded-lg cursor-pointer group">

<a href="<?php echo $img['link']; ?>" target="_blank">

<img src="<?php echo $img['img']; ?>"
alt="<?php echo $img['alt']; ?>"
class="object-cover w-full h-full transition duration-500 group-hover:scale-110">

<div class="overlay absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">

<img src="image/instagram.png"
class="h-10 w-10  object-contain">

</div>

</a>

</div>

<?php } ?>

</div>

</div>
</div>
</div>


<!-- FOOTER GREEN SECTION -->

<div class="bg-[#1a3d1a] text-white py-12 md:py-16">

<div class="max-w-7xl mx-auto px-4">

<div class="grid grid-cols-1 md:grid-cols-3 gap-10 border-b border-white/20 pb-8">

<!-- LOGO + SUBSCRIBE -->

<div>

<img src="image/LOGOS.png"  class="mb-4 h-28 w-40 -ml-3 ">

<!-- <h3 class="text-lg  font-[Copperplate] ">
Prime Agro Farm
</h3>

<p class="text-sm text-gray-300 mb-4 font-[Copperplate]">
Farm Life, Fine Stay
</p> -->


<h4 class="text-sm  mb-3 uppercase font-[poppins]">
Subscribe for Latest Updates
</h4>

<form method="POST" class="flex gap-2">

    <input
        type="email"
        name="email"
        required
        placeholder="Enter your email"
        class="flex-1 min-w-0 font-[poppins] px-3 py-2 bg-white/10 border border-white/30 rounded text-sm text-white placeholder-white/50 focus:outline-none"
    />

    <button
        class="shrink-0 bg-[#B8985F] px-3 py-2 rounded text-sm font-semibold hover:bg-[#A88850] transition">
        Subscribe
    </button>

</form>


<div class="mt-6">

<p class="text-sm  font-[poppins] mb-1">
FOR BOOKINGS CONTACT
</p>

<a href="tel:9967146433"
class="text-[#B8985F] text-base font-[poppins]">
99671 46433
</a>

</div>


<div class="mt-4">

<p class="text-sm  mb-1 font-[poppins]">
CUSTOMER SUPPORT
</p>

<a href="mailto:contactpaf@gmail.com"
class="text-gray-300 text-sm">
contactpaf@gmail.com
</a>

</div>

</div>


<!-- QUICK LINKS -->

<div class="ml-0 md:ml-0 lg:ml-40 text-left">

<h4 class="text-base  mb-4 uppercase font-[poppins] text-gray-300">
Quick Links
</h4>

<ul class="space-y-3 text-sm font-[poppins] ">

<li><a href="#" class="text-white hover:text-gray-300">HOME</a></li>
<li><a href="#about" class="text-white hover:text-gray-300">ABOUT US</a></li>
<li><a href="#gallery" class="text-white hover:text-gray-300">GALLERY</a></li>
<li><a href="#contact" class="text-white hover:text-gray-300">CONTACT</a></li>
<li><a href="admin/login.php" class="text-white hover:text-gray-300">ADMIN</a></li>

</ul>

</div>


<!-- CONTACT INFO -->

<div>

<h4 class="text-base  mb-4 uppercase font-[poppins] text-gray-300">
Have Questions?
</h4>

<div class="flex items-start gap-3 mb-4">
    <img src="image/location.png" class="h-6 w-6 mt-1">
    <p class="text-sm text-white">
        PANHALGHAR, LONARE,<br>
        MANGAON, DIST. LONERE,<br>
        MAHARASHTRA 402305
    </p>
</div>

<div class="flex items-center gap-3 mb-4">
    <img src="image/phone.png" class="h-6 w-6">
    <p class="text-sm text-white">
        <span class="font-semibold font-[poppins]">Phone:</span>
        99671 46433
    </p>
</div>

<div class="flex items-center gap-3 mb-4">
    <img src="image/mail.png" class="h-6 w-6">
    <p class="text-sm text-white">
        <span class="font-semibold font-[poppins]">Email:</span>
        info@primeagrofarm.com
    </p>
</div>

</div>

</div>


<!-- COPYRIGHT -->

<div class="text-center pt-6 ">

<p class="text-sm text-gray-400 font-[poppins]">
© 2026 Prime Agro Farm. All Rights Reserved.
</p>

</div>

</div>

</div>

</footer>

</body>
</html>