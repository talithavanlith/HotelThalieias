<?php
session_start();
$scriptList = array('jquery-3.3.1.min.js', 'rooms.js');
include("phpFiles/header.php");

?>
<section>
    <h2>Here at Thaleias we have five different types of rooms to accommodate every type of holidayer </h2>
    <p>Whether you're looking for a room for the whole family or a romantic getaway we have the perfect place for you</p>

    <div class="roomPic">
        <figure>
            <img src="./images/premier.jpg" alt="premier room"  class="roomWidth2">
        </figure>
    </div>
    <div class="room">
    </div>

    <div class="roomPic">
        <figure>
        <img src="./images/double.jpg" alt="double bed" class="roomWidth">
        </figure>
    </div>
    <div class="room">
    </div>

    <div class="roomPic">
        <figure>
            <img src="./images/triple.jpg" alt="triple room" class="roomWidth">
        </figure>
    </div>
    <div class="room">
    </div>

    <div class="roomPic">
        <figure>
            <img src="./images/single.jpg" alt="single room"  class="roomWidth3">
        </figure>
    </div>
    <div class="room">
    </div>

    <div class="roomPic">
        <figure>
            <img src="./images/kids.jpg" alt="kids room" class="roomWidth">
        </figure>
    </div>
    <div class="room">
    </div>

</section>
<?php include("phpFiles/footer.php"); ?>