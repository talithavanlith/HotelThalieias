<?php
session_start();
$scriptList = array('jquery-3.3.1.min.js', 'slideshow.js');
include("phpFiles/header.php");

?>
<section class="index">
    <h2>Welcome to Santorini's Hotel Thaleias</h2>
    <p> Enjoy the pool and rooftop spa, rich sunset views and in-house restaurant on the world's most beautiful island</p>

    <div class="slideshowContainer">
        <div class="sliderWrapper">
            <img class="slider" src="images/balcony.jpg" alt="Balcony"><!-- by Charly W.Karl -->
            <img class="slider" src="images/door.jpg" alt="Door"><!-- by Tom Grimbert -->
            <img class="slider" src="images/cafe2.jpg" alt="Cafe"><!-- by Tom Grimbert -->
            <img class="slider" src="images/white.jpg" alt="White houses"><!-- by Tom Grimbert -->
            <img class="slider" src="images/bath.jpg" alt="Bathroom"><!-- by Walter Sharer -->
            <img class="slider" src="images/stairs.jpg" alt="Stairs"> <!-- by Tom Grimbert -->
            <img class="slider" src="images/foodbypool.jpg" alt="Food by the pool"> <!-- by resort VILA PORTO MARE -->
            <img class="slider" src="images/window.jpg" alt="Window view"><!-- by resort VILA PORTO MARE -->
            <img class="slider" src="images/mirror.jpg" alt="Mirror view"><!-- by VIK hotels group -->
            <img class="slider" src="images/pool2.jpg" alt="Pool"><!-- by Walter Sharer -->
            <img class="slider" src="images/pool3.jpg" alt="Pool side"><!-- by resort VILA PORTO MARE -->
            <img class="slider" src="images/spa.jpg" alt="Spa"><!-- by Walter Sharer -->
        </div>
    </div>
</section>
<figure>
    <img src="./images/pool-footer.jpg" alt="Roof Top Pool" class="poolFooter">
    <!-- image by: Hotel Internazionale Ischia, found on flickr.com, license = https://creativecommons.org/licenses/by-sa/2.0/ (has been edited in photoshop)-->

</figure>
<?php include("phpFiles/footer.php"); ?>