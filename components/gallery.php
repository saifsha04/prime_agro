<?php
// gallery.php
// Place this file in your PHP project. Update image paths as needed.
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | Prime Agro Farm</title>
  
  <!-- Tailwind CSS (Remove if using build process) -->
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

    /* Smooth scrollbar hide for carousel */
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>

</head>


<body class="bg-white antialiased">
  

<section id="gallery" class="w-full bg-white py-12 md:py-20 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto">

    <!-- Main Heading -->
    <h2 class="text-center text-3xl md:text-4xl lg:text-5xl font-[Cinzel] text-[#b78727] mb-12 md:mb-16 uppercase tracking-wider">
      Gallery
    </h2>

    <!-- ================= CURATED RETREATS ================= -->

<div>

  <!-- SECTION HEADER -->
  <div class="flex flex-col md:flex-col lg:flex-row items-center lg:items-start gap-4 lg:gap-6 mb-8 md:mb-10">

    <!-- GOLDEN LINE -->
    <div class="w-20 lg:w-32 h-0.5 bg-[#B8985F] mt-2"></div>

    <!-- TITLE -->
    <div class="text-center lg:text-left">

      <h3 class="text-3xl md:text-4xl lg:text-3xl font-[Cinzel] text-black uppercase leading-tight">

        Curated
        <br>
        <span class="-ml-20">
        Retreats</span>

      </h3>

    </div>

    <!-- DESCRIPTION -->
    <div class="w-full flex-1 text-center lg:text-left">

      <p class="text-gray-700 font-[poppins] text-base md:text-lg lg:text-base leading-relaxed">

        Experience refined living amidst nature - where every room tells a story
        of peace, luxury, and timeless beauty, offering a perfect blend of rustic
        charm and modern comfort.

      </p>

    </div>

  </div>

  <!-- CAROUSEL -->
  <div class="relative group" font-[poppins] id="retreat-carousel">

    <!-- PREV BUTTON -->
    <button onclick="moveSlide(-1)" 
      class="absolute -left-5 md:-left-10 lg:-left-20 top-1/2 -translate-y-1/2 z-10 bg-[#B8985F]/90 hover:bg-[#B8985F] text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center shadow-lg transition-all opacity-0 group-hover:opacity-100 focus:opacity-100">

      <svg xmlns="http://www.w3.org/2000/svg"
        class="h-5 w-5 md:h-6 md:w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">

        <path stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M15 19l-7-7 7-7" />

      </svg>

    </button>

    <!-- TRACK -->
    <div class="overflow-hidden px-2 md:px-4">

      <div id="carousel-track"
        class="flex transition-transform duration-500 ease-out hide-scrollbar">

        <!-- Slides injected by JS -->

      </div>

    </div>

    <!-- NEXT BUTTON -->
    <button onclick="moveSlide(1)" 
      class="absolute -right-5 md:-right-10 lg:-right-20 top-1/2 -translate-y-1/2 z-10 bg-[#B8985F]/90 hover:bg-[#B8985F] text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center shadow-lg transition-all opacity-0 group-hover:opacity-100 focus:opacity-100">

      <svg xmlns="http://www.w3.org/2000/svg"
        class="h-5 w-5 md:h-6 md:w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">

        <path stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 5l7 7-7 7" />

      </svg>

    </button>

  </div>

  <!-- INDICATORS -->
  <div id="carousel-indicators"
    class="flex justify-center gap-2 mt-6">

  </div>

</div>

    <!-- ================= LEISURE ESCAPES ================= -->
    <div class="mt-16">
      <!-- SECTION HEADER -->
  <div class="flex flex-col md:flex-col lg:flex-row items-center lg:items-start gap-4 lg:gap-6 mb-8 md:mb-10">

    <!-- GOLDEN LINE -->
    <div class="w-20 lg:w-32 h-0.5 bg-[#B8985F] mt-2"></div>

    <!-- TITLE -->
    <div class="text-center lg:text-left">

      <h3 class="text-3xl md:text-4xl lg:text-3xl font-[Cinzel] text-black uppercase leading-tight">
            Leisure<br><span class="-ml-20">Escapes</span>
          </h3>
        </div>
        <div class="grid md:grid-cols-1">
          <p class="text-gray-700 font-[poppins] text-sm md:text-base leading-relaxed">
            Delight in moments of play and connection - where every activity is crafted to bring joy, relaxation and a touch of adventure amidst the beauty of nature.
          </p>
        </div>
      </div>

      <!-- Static Grid -->
      <div class="grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 font-[Cinzel]">
        <!-- Card 1 -->
        <div class="relative overflow-hidden rounded-lg shadow-lg group cursor-pointer">
          <img src="image/shuttle.jpg" alt="Shuttle Area" class="w-full h-56 sm:h-64 md:h-72 object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
          <div class="absolute bottom-0 left-0 right-0 bg-white/95 backdrop-blur-sm py-3 md:py-4 text-center">
            <h4 class="text-gray-900  text-sm md:text-base uppercase tracking-wider leading-tight">Shuttle<br>Area</h4>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="relative overflow-hidden rounded-lg shadow-lg group cursor-pointer">
          <img src="image/recreation.jpg" alt="Recreation Lounge" class="w-full h-56 sm:h-64 md:h-72 object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
          <div class="absolute bottom-0 left-0 right-0 bg-white/95 backdrop-blur-sm py-3 md:py-4 text-center">
            <h4 class="text-gray-900  text-sm md:text-base uppercase tracking-wider leading-tight">Recreation<br>Lounge</h4>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="relative overflow-hidden rounded-lg shadow-lg group cursor-pointer">
          <img src="image/waterscape.jpg" alt="Tranquil Waterscape" class="w-full h-56 sm:h-64 md:h-72 object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
          <div class="absolute bottom-0 left-0 right-0 bg-white/95 backdrop-blur-sm py-3 md:py-4 text-center">
            <h4 class="text-gray-900  text-sm md:text-base uppercase tracking-wider leading-tight">Tranquil<br>Waterscape</h4>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ================= CAROUSEL LOGIC ================= -->
<script>
  // Gallery Data (Update paths to match your server structure)
  const retreatData = [
    { src: 'image/bedroom.jpg', desc: 'Experience refined living amidst nature- where every room tells a story of peace, luxury, and timeless beauty, blending rustic elegance with modern comfort.' },
    { src: 'image/Swimming.png', desc: 'Dive into relaxation at our serene swimming pool - a refreshing escape surrounded by nature, where calm waters and open skies create the perfect setting to unwind and rejuvenate.' },
    { src: 'image/Living.jpg', desc: 'Discover peaceful corners and scenic paths that connect every part of Prime Agro Farm - thoughtfully designed to keep you close to nature at every step.' },
    { src: 'image/agro.jpg', desc: 'Discover peaceful corners and scenic paths that connect every part of Prime Agro Farm - thoughtfully designed to keep you close to nature at every step.' },
    { src: 'image/view.png', desc: 'Discover peaceful corners and scenic paths that connect every part of Prime Agro Farm - thoughtfully designed to keep you close to nature at every step.' },
    { src: 'image/dining.jpg', desc: 'Discover peaceful corners and scenic paths that connect every part of Prime Agro Farm - thoughtfully designed to keep you close to nature at every step.' }
  ];

  let currentSlide = 0;
  const track = document.getElementById('carousel-track');
  const indicatorsContainer = document.getElementById('carousel-indicators');

  // Determine visible slides based on viewport
  function getSlidesPerView() {
    if (window.innerWidth >= 1024) return 3;
    if (window.innerWidth >= 640) return 2;
    return 1;
  }

  // Render slides & indicators
  function renderCarousel() {
    track.innerHTML = '';
    indicatorsContainer.innerHTML = '';
    const slidesPerView = getSlidesPerView();
    const maxIndex = retreatData.length - slidesPerView;

    retreatData.forEach((item, index) => {
      // Create slide
      const slide = document.createElement('div');
      slide.className = 'flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 px-2';
      slide.innerHTML = `
        <div class="overflow-hidden rounded-lg shadow-lg bg-white h-full flex flex-col">
          <img src="${item.src}" alt="Retreat ${index + 1}" class="w-full h-56 sm:h-64 md:h-72 object-cover" loading="lazy">
          <div class="p-3 md:p-4 flex-grow flex items-center">
            <p class="text-gray-800 text-xs sm:text-sm leading-relaxed text-justify">${item.desc}</p>
          </div>
        </div>
      `;
      track.appendChild(slide);

      // Create indicator dot
      if (index <= maxIndex) {
        const dot = document.createElement('button');
        dot.className = `w-2 h-2 rounded-full transition-all duration-300 ${index === currentSlide ? 'bg-[#B8985F] w-8' : 'bg-gray-300'}`;
        dot.onclick = () => goToSlide(index);
        dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
        indicatorsContainer.appendChild(dot);
      }
    });

    updatePosition();
  }

  // Update carousel position & indicators
  function updatePosition() {
    const slidesPerView = getSlidesPerView();
    const maxIndex = retreatData.length - slidesPerView;
    
    // Clamp index
    if (currentSlide > maxIndex) currentSlide = maxIndex;
    if (currentSlide < 0) currentSlide = 0;

    const slideWidth = track.children[0]?.offsetWidth || 0;
    track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;

    // Update dots
    Array.from(indicatorsContainer.children).forEach((dot, i) => {
      dot.className = `w-2 h-2 rounded-full transition-all duration-300 ${i === currentSlide ? 'bg-[#B8985F] w-8' : 'bg-gray-300'}`;
    });
  }

  // Navigation
  function moveSlide(direction) {
    const slidesPerView = getSlidesPerView();
    const maxIndex = retreatData.length - slidesPerView;
    currentSlide += direction;
    if (currentSlide < 0) currentSlide = maxIndex;
    if (currentSlide > maxIndex) currentSlide = 0;
    updatePosition();
  }

  function goToSlide(index) {
    currentSlide = index;
    updatePosition();
  }

  // Initialize & Handle Resize
  window.addEventListener('DOMContentLoaded', renderCarousel);
  window.addEventListener('resize', () => {
    renderCarousel();
  });

  // Auto-play (pauses on hover)
  let autoPlay = setInterval(() => moveSlide(1), 5000);
  const carouselEl = document.getElementById('retreat-carousel');
  carouselEl.addEventListener('mouseenter', () => clearInterval(autoPlay));
  carouselEl.addEventListener('mouseleave', () => {
    autoPlay = setInterval(() => moveSlide(1), 5000);
  });
</script>

</body>
</html>