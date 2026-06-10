<script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Copperplate+Gothic+Std+32+BC&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Glacial+Indifference:wght@300;400;500;600;700&display=swap" rel="stylesheet">


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

    @font-face {
      font-family: 'Glacial Indifference';
      src: url('fonts/GlacialIndifference-Regular.otf') format('woff');
    }



  </style>
  
  <section id="book" class="w-full">

<!-- ================= BOOKING FORM ================= -->
<div class="bg-white py-8 md:py-16 px-4">
  <div class="max-w-6xl mx-auto">

    <h2 class="text-center text-2xl md:text-2xl lg:text-3xl font-[Cinzel] text-29.4px text-[#b78727] mb-6 md:mb-8">
      FIND THE BEST PLACE
    </h2>

    <!-- DESKTOP -->
    <div class="hidden md:block bg-gradient-to-r from-[#b78727] to-[#A88850] rounded-full p-2 shadow-lg">
      <div class="grid grid-cols-4 gap-2">

        <!-- DATE -->
        <div class="px-6 py-3 text-white font-[poppins] text-14.1px">
          <label class="block text-sm mb-1">Check In - Check Out</label>
          <input type="date" id="checkIn"
            class="bg-transparent text-white outline-none text-sm w-full">
        </div>

        <!-- ROOMS -->
        <div class="px-6 py-3 border-l border-white/30 text-white font-[poppins] text-14.1px">
          <label class="block text-sm mb-1">Rooms</label>
          <div class="flex items-center gap-2">
            <button onclick="changeRooms(-1)" class="text-xl">-</button>
            <span id="rooms" class="mx-2">1</span>
            <button onclick="changeRooms(1)" class="text-xl">+</button>
          </div>
        </div>

        <!-- GUESTS -->
        <div class="px-6 py-3 border-l border-white/30 text-white font-[poppins] text-14.1px">
          <label class="block text-sm mb-1">Guests</label>
          <div class="flex items-center gap-2">
            <button onclick="changeGuests(-1)" class="text-xl">-</button>
            <span id="guests" class="mx-2">1</span>
            <button onclick="changeGuests(1)" class="text-xl">+</button>
          </div>
        </div>

        <!-- BUTTON -->
          <div class=" border-l border-white/30 ml-[-70px]">
        <div class="flex items-center justify-center px-4 py-3 font-[poppins] text-14.9px">
           <!-- Later Change to a tag Stay/booktostay.php --> 
          <a href="#"
           onclick="showMessage(); return false;"
           class="bg-white text-[#b78727] px-6 py-4 rounded-full font-semibold">
            CHECK AVAILABILITY
        </a>
         
        </div>
        

</div>

      </div>
      
        
    </div>
    <!-- Hidden Message -->
    <div id="availabilityMessage"
     class="hidden mt-6 flex justify-center items-center">
    <p class="text-red-500 text-center text-base md:text-lg font-[Cinzel] font-semibold px-4">
        To book a farm stay, please call +91 99671 46433
    </p>
</div>

    <!-- MOBILE -->
    <div class="md:hidden bg-gradient-to-br from-[#b78727] to-[#A88850] rounded-3xl p-6 shadow-lg">
      <div class="space-y-6 text-white font-[poppins]">

        <!-- DATE -->
        <div>
          <label class="block text-sm mb-2 font-[poppins]">Check In</label>
          <input type="date" id="checkInMobile"
            class="bg-white/20 w-full px-4 py-3 rounded-lg border border-white/30">
        </div>

        <!-- ROOMS -->
        <div>
          <label class="block text-sm mb-2 font-[poppins]">Rooms</label>
          <div class="flex justify-between bg-white/20 px-6 py-3 rounded-lg">
            <button onclick="changeRooms(-1)" class="text-2xl">-</button>
            <span id="roomsMobile">1</span>
            <button onclick="changeRooms(1)" class="text-2xl">+</button>
          </div>
        </div>

        <!-- GUESTS -->
        <div>
          <label class="block text-sm mb-2 font-[poppins]">Guests</label>
          <div class="flex justify-between bg-white/20 px-6 py-3 rounded-lg">
            <button onclick="changeGuests(-1)" class="text-2xl">-</button>
            <span id="guestsMobile">1</span>
            <button onclick="changeGuests(1)" class="text-2xl">+</button>
          </div>
        </div>

        <!-- BUTTON -->
         <div class="flex items-center justify-center px-4 py-3 font-[poppins] text-14.9px">
        <a href="#" onclick="showMessage(); return false;"
          class="bg-white text-[#b78727] w-full py-3 text-center rounded-full font-semibold font-[poppins]">
          CHECK AVAILABILITY
        </a>
        </div>

      </div>
    </div>

  </div>
</div>

<!-- ================= ABOUT TEXT ================= -->
<div class="bg-white  px-4">
  <div class="max-w-9xl mx-auto text-center">

    <!-- HEADING -->
    <h2 class="font-[Cinzel] text-[#b78727] mb-6 tracking-wide"
        style="font-size: clamp(12px, 3vw, 38px);">
      EXPERIENCE THE SERENITY OF SUSTAINABLE LIVING
    </h2>

    <!-- PARAGRAPH -->
    <p class="text-gray-700 
              text-[14px] sm:text-[15px] md:text-[17px] lg:text-[22px]
              leading-[1.8] font-[poppins] w-full mx-auto px-4">
      
      Welcome to <span class="font-semibold">Prime Agro Farm</span>, a serene farm resort where nature meets comfort. 
      Nestled amidst lush greenery and open landscapes, our resort offers a unique blend of rural charm and modern luxury. 
      Whether you’re looking to unwind in peaceful surroundings, explore the rhythms of farm life, or indulge in fresh, 
      organic produce straight from the fields, Prime Agro Farms promises an experience that rejuvenates your mind, body, 
      and soul. Come stay with us and rediscover the beauty of sustainable living – close to nature, yet comfortably refined.
    
    </p>

  </div>
</div>
<div class="w-full  bg-[#ffffff] py-8"></div>

<!-- ================= FACILITIES ================= -->
<div class="w-full bg-[#06402B] py-8 md:py-16 px-4 ">
  <div class="max-w-6xl mx-auto text-center">

    <h3 class="text-lg md:text-xl text-white mb-2 font-[Glacial Indifference]">What we Offer ?</h3>
    <h2 class="text-2xl md:text-3xl lg:text-4xl text-[#b78727] mb-10 font-[Cinzel]" >
      OUR FACILITIES
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 font-[poppins] text-13.5px">

      <!-- ITEM -->
      <div class="text-white">
        <img src="image/farm.png" class="mx-auto h-16 md:h-20 mb-3">
        <h4 class="text-sm md:text-base">Farm Stay</h4>
        <p class="text-xs md:text-base">Experience</p>
      </div>

      <div class="text-white">
        <img src="image/tours.png" class="mx-auto h-16 md:h-20 mb-3">
        <h4>Farm Activities</h4>
        <p>& Tours</p>
      </div>

      <div class="text-white">
        <img src="image/organic.png" class="mx-auto h-16 md:h-20 mb-3 mix-blend-lighten">
        <h4>Organic Dining</h4>
      </div>

      <div class="text-white">
        <img src="image/nature.png" class="mx-auto h-16 md:h-20 mb-3">
        <h4>Nature Retreat</h4>
        <p>& Wellness</p>
      </div>

      <div class="text-white">
        <img src="image/game.png" class="mx-auto h-16 md:h-20 mb-3">
        <h4>Indoor & Outdoor</h4>
        <p>Games</p>
      </div>

    </div>

  </div>
</div>


</section>

<!-- ================= JS ================= -->
<script>
let rooms = 1;
let guests = 1;

function changeRooms(val) {
  rooms = Math.max(1, rooms + val);
  document.getElementById("rooms").innerText = rooms;
  document.getElementById("roomsMobile").innerText = rooms;
}

function changeGuests(val) {
  guests = Math.max(1, guests + val);
  document.getElementById("guests").innerText = guests;
  document.getElementById("guestsMobile").innerText = guests;
}




function showMessage() {
    const msg = document.getElementById("availabilityMessage");

    msg.classList.remove("hidden");

    setTimeout(() => {
        msg.classList.add("hidden");
    }, 3000);
}

</script>