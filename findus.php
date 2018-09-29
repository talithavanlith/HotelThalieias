<?php
session_start();
$scriptList = array('jquery-3.3.1.min.js', 'leaflet.js', 'mapCode.js');
include("phpFiles/header.php");

?>
<!-- End of navigation -->
<section>

    <h2 id="maptitle">Where we are:</h2>
    <p class="place"> Epar.Od. Ormou Athiniou &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; No. 750 00 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Santorini, Greece</p>

    <div id="food_info">
        <h3>Nearby Eateries:</h3>
        <ul class="map_list">
            <li><b class="place">Spartacos Pizzeria:</b> <br> Cosy - Casual - Good for kids <br> $ <br> <br></li>
            <li><b class="place">Apollon Restaurant:</b> <br> Great Cocktails - Cosy - Late-night food <br> $$$ <br> <br></li>
            <li><b class="place">Senor Zorba Cafe Bar:</b> <br> Groups - Casual - Vegetarian options <br> $ <br> <br></li>
        </ul>
        <!-- Marker switch -->
        <label class="switch">
            <input id="food" type="checkbox" checked>
            <!--  when checked food markers are shown and when unchecked food markers are hidden -->
            <span class="slider round"></span>
        </label>
    </div>

    <figure id="map">
        <img src="images/map.jpg" alt="Hotel Thaleias Map">
    </figure>

    <div id="activity_info">
        <h3>Activities & Attractions:</h3>
        <ul class="map_list">
            <li><b class="place">Epar Lookout:</b> <br> Amazing cliff side view over sea - good sunset<br> <br> <br></li>
            <li><b class="place">Santo Winery:</b> <br> Traditional Greek winery tour - includes lunch<br> $$$ <br> <br></li>
            <li><b class="place">Ekklisia Agia Marina Church:</b> <br> Greek Orthodox Church - built early 1800s<br> $ <br> <br></li>
        </ul>
        <!-- Marker switch -->
        <label class="switch">
            <input id="activity" type="checkbox" checked>
            <!--  when checked activity markers are shown and when unchecked activity markers are hidden -->
            <span class="slider round"></span>
        </label>
    </div>

</section>
<?php include("phpFiles/footer.php"); ?>