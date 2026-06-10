<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prime Agro Farm</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link 

  <!-- Remove default gap -->
  <style>
    html, body {
      margin: 0;
    padding: 0;
    width: 100%;
    overflow-x: hidden;
    background: black;
    }
    
    *{
    box-sizing: border-box;
}
    video {
      display: block;
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

<body class="m-0 p-0 overflow-x-hidden">

<?php include 'components/header.php'; ?>

<!-- HERO SECTION -->
<div class="relative w-screen h-screen overflow-hidden">

  <!-- Video -->
  <video
    id="bgVideo"
    class="absolute inset-0 w-screen h-screen object-cover scale-150"
    src="video.mp4"
    autoplay
    loop
    muted
    playsinline
  ></video>

  <!-- Overlay -->
  <div class="absolute top-0 left-0 w-full h-full bg-black/10 contrast z-10"></div>

  <!-- Content -->
  <div class="relative z-20 h-full flex flex-col justify-end">

    <!-- Progress Bar 
    <div class="w-full px-4 sm:px-6 md:px-10 pb-4 sm:pb-6 md:pb-8">
      <div id="progressBar"
        class="w-full bg-gray-500/60 h-2 sm:h-2.5 md:h-3 rounded-full cursor-pointer">
        
        <div id="progressFill"
          class="bg-white h-full rounded-full transition-all duration-200"
          style="width: 0%;">
        </div>

      </div>
    </div> -->

  </div>
</div>

<!-- OTHER SECTIONS -->
<?php include 'components/book.php'; ?>
<?php include 'components/aboutus.php'; ?>
<?php include 'components/gallery.php'; ?>
<?php include 'components/guest.php'; ?>
<?php include 'components/contact.php'; ?>

<!-- JS -->
<script>
  const video = document.getElementById("bgVideo");
  const progressFill = document.getElementById("progressFill");
  const progressBar = document.getElementById("progressBar");

  // Progress update
  video.addEventListener("timeupdate", () => {
    if (video.duration) {
      const progress = (video.currentTime / video.duration) * 100;
      progressFill.style.width = progress + "%";
    }
  });

  // Click progress
  progressBar.addEventListener("click", (e) => {
    const rect = progressBar.getBoundingClientRect();
    const clickX = e.clientX - rect.left;
    const width = rect.width;
    const percentage = clickX / width;

    video.currentTime = percentage * video.duration;
  });
</script>

</body>
</html>