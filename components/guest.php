<?php
$messageSent = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Logic for processing form
    $messageSent = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest | Prime Agro Farm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    
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

</head>

  <div class="bg-white border-t">
    <!-- ================= TESTIMONIALS ================= -->

<section class="bg-gray-200 w-full py-16 px-4 text-center overflow-hidden">

  <!-- SMALL TITLE -->
  <p class="text-gray-500 font-[poppins] text-sm mb-2">
    Voice from our Guests!
  </p>

  <!-- MAIN TITLE -->
  <h2 class="text-3xl md:text-5xl font-[Cinzel] text-[#b78727] uppercase tracking-[0.2em] mb-12">

    Testimonials

  </h2>

  <!-- WRAPPER -->
  <div class="relative max-w-5xl mx-auto flex items-center justify-center min-h-[250px]">

    <!-- LEFT ARROW (DESKTOP ONLY) -->
    <button onclick="prevTestimonial()"

      class="hidden lg:flex absolute left-0 top-1/2 -translate-y-1/2 bg-[#c2a373] hover:bg-[#a88a50] w-12 h-12 rounded-full items-center justify-center text-white shadow-lg z-20">

      ←

    </button>

    <!-- CONTENT -->
    <div class="px-4 md:px-16">

      <p id="testimonialText"

        class="text-black text-lg md:text-xl leading-relaxed mb-6 transition-all duration-500">

      </p>

      <p id="testimonialAuthor"

        class="text-black font-medium italic text-lg">

      </p>

    </div>

    <!-- RIGHT ARROW (DESKTOP ONLY) -->
    <button onclick="nextTestimonial()"

      class="hidden lg:flex absolute right-0 top-1/2 -translate-y-1/2 bg-[#c2a373] hover:bg-[#a88a50] w-12 h-12 rounded-full items-center justify-center text-white shadow-lg z-20">

      →

    </button>

  </div>

  <!-- INDICATORS -->
  <div id="testimonialIndicators"
    class="flex justify-center gap-3 mt-8">

  </div>

</section>



    <div class="w-full bg-[#ffffff] py-8"></div>


    <section class="relative w-full min-h-[600px] flex items-center py-16">
        <div class="absolute inset-0">
            <img src="image/Living.jpg" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative z-10 max-w-6xl mx-auto px-4 w-full">
            <div class="text-center mb-12">
                <h3 class="text-white text-3xl md:text-4xl font-bold tracking-tight uppercase font-[Cinzel] text-center lg:text-left lg:mr-20 leading-tight">
                    Where nature meets luxury!
                </h3>
                <h3 class="text-white text-3xl md:text-4xl font-bold tracking-tight font-[Cinzel] text-center lg:text-left lg:ml-20 uppercase mt-2">
                    Your perfect getaway awaits.
                </h3>
            </div>

            <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                <div class="w-full">
                    <?php if($messageSent): ?>
                        <div class="bg-green-500/20 border border-green-500 text-green-200 p-3 mb-4 rounded text-center">
                            Message sent successfully!
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="space-y-3 font-[poppins]">
                        <input type="text" name="name" placeholder="Your Name" required
                            class="w-full  px-4 py-3 bg-white/20 border border-white/30 text-white placeholder-white focus:outline-none focus:bg-white/30 transition">

                        <input type="email" name="email" placeholder="Your Email" required
                            class="w-full  px-4 py-3 bg-white/20 border border-white/30 text-white placeholder-white focus:outline-none focus:bg-white/30 transition">

                        <input type="text" name="subject" placeholder="Subject" required
                            class="w-full  px-4 py-3 bg-white/20 border border-white/30 text-white placeholder-white focus:outline-none focus:bg-white/30 transition">

                        <textarea name="message" rows="4" placeholder="Message" required
                            class="w-full  px-4 py-3 bg-white/20 border border-white/30 text-white placeholder-white focus:outline-none focus:bg-white/30 transition"></textarea>

                        <div class="pt-4 flex justify-center">

    <button type="submit"

        class="bg-[#a38a1f]
               hover:bg-[#8e771a]
               text-white
               px-12
               py-3
               rounded-full
               font-bold
               uppercase
               tracking-[0.15em]
               shadow-lg
               transition
               transform
               hover:scale-105
               font-[Cinzel]">

        Submit

    </button>

</div>
                    </form>
                </div>

                <div class="w-full h-[350px] md:h-[450px] border-4 border-white/10 shadow-2xl overflow-hidden">
                    <iframe 
    src="https://maps.google.com/maps?q=Prime%20Agro%20Farm%20PANHALGHAR%20LONARE%20MANGAON%20DIST%20Lonere%20Maharashtra%20402305%20India&z=15&output=embed"
                        class="w-full h-full border-0 grayscale-[20%]">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SCRIPT ================= -->

<script>

document.addEventListener("DOMContentLoaded", function(){

const testimonials = [

{
text: "This is agro farm where nature is so far away, but the location is beautifully maintained. Owner is very careful about his personal presence to host the guest. Here we can get the purest form of Gir cow milk and pure cow Ghee.",
author: "Neha Shalini"
},

{
text: "Prime Agro Farm is a hidden gem! The tranquility and natural beauty surrounding the property is breathtaking. We enjoyed fresh organic food straight from the farm.",
author: "Rajesh Kumar"
},

{
text: "Absolutely loved our stay at Prime Agro Farm! The eco-friendly cottages are beautifully designed with all modern amenities.",
author: "Priya & Arun Mehta"
},

{
text: "What a refreshing experience! Prime Agro Farm offers the perfect blend of rustic charm and comfort.",
author: "Sneha Desai"
},

{
text: "This place exceeded our expectations! From the moment we arrived, we felt at peace.",
author: "Vikram Patel"
}

];

let current = 0;

const textElem =
document.getElementById("testimonialText");

const authorElem =
document.getElementById("testimonialAuthor");

const indicators =
document.getElementById("testimonialIndicators");

function renderIndicators(){

    indicators.innerHTML = "";

    testimonials.forEach((_, index) => {

        const dot =
        document.createElement("button");

        dot.className =
        `h-2 rounded-full transition-all duration-300 ${
            index === current
            ? "bg-[#B8985F] w-8"
            : "bg-gray-400 w-2"
        }`;

        dot.onclick = () => {

            current = index;

            showTestimonial();

        };

        indicators.appendChild(dot);

    });

}

function showTestimonial(){

    textElem.innerText =
    testimonials[current].text;

    authorElem.innerText =
    "- " + testimonials[current].author;

    renderIndicators();

}

window.nextTestimonial = function(){

    current =
    (current + 1) % testimonials.length;

    showTestimonial();

}

window.prevTestimonial = function(){

    current =
    (current - 1 + testimonials.length)
    % testimonials.length;

    showTestimonial();

}

// INITIAL LOAD
showTestimonial();

// AUTO SLIDE
setInterval(() => {

    nextTestimonial();

}, 3000);

});

</script>
</html>