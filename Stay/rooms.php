<?php session_start(); ?>

<a href="
<?php
if(isset($_SESSION['user_id'])){
    echo "booking.php?room=1";
} else {
    echo "../user/login.php?redirect=../Stay/booking.php?room=1";
}
?>
">BOOK NOW</a>