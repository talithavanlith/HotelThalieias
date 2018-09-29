<?php
session_start();
$scriptList = array('jquery-3.3.1.min.js', 'adminBookings.js');
include("phpFiles/header.php");

?>
<!-- End of nav -->

<section>
    <h2 class="bookings">Completed bookings:</h2>
    <!--completed bookings inserted here by javaScript -->
</section>

<!-- footer image -->
<figure>
    <img src="./images/pool-footer.jpg" alt="Roof Top Pool" class="poolFooter">
    <!-- image by: Hotel Internazionale Ischia, found on flickr.com, license = https://creativecommons.org/licenses/by-sa/2.0/ (has been edited in photoshop)-->
</figure>
<?php include("phpFiles/footer.php"); ?>