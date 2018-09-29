<?php
session_start();
$scriptList = array('jquery-3.3.1.min.js', 'adminBookings.js', 'room-options.js', 'Cookies.js', 'chosenRooms.js');
include("phpFiles/header.php");

?>
<!-- Start of navigation -->
<section>
    <h2 class="more-margin">Enter the dates you wish to stay:</h2>
    <fieldset><div id="checkIn">
        <label for="checkInDay">Check In:&emsp;&emsp;</label>
        <select name="checkInDay" id="checkInDay">
            <option value="1">01</option>
            <option value="2">02</option>
            <option value="3">03</option>
            <option value="4">04</option>
            <option value="5">05</option>
            <option value="6">06</option>
            <option value="7">07</option>
            <option value="8">08</option>
            <option value="9">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>&emsp;&emsp;&emsp;&emsp;<select name="checkInMonth" id="checkInMonth">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select> &emsp;&emsp;&emsp;&emsp;<select name="checkInYear" id="checkInYear">
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
    </select></div> <div id="checkOut"><label for="checkOutDay">Check Out:&emsp;&emsp;</label>
        <select name="checkOutDay" id="checkOutDay">
            <option value="1">01</option>
            <option value="2">02</option>
            <option value="3">03</option>
            <option value="4">04</option>
            <option value="5">05</option>
            <option value="6">06</option>
            <option value="7">07</option>
            <option value="8">08</option>
            <option value="9">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>&emsp;&emsp;&emsp;&emsp;<select name="checkOutMonth" id="checkOutMonth">
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select> &emsp;&emsp;&emsp;&emsp;<select name="checkOutYear" id="checkOutYear">
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
        </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
        <input id="searchButton" type="submit" value="Search">
        <p id="error"></p>
    </fieldset>

    <!-- show hide rooms below depending on which ones are available -->
    <h2 class="optionsTitle">Available rooms for your period of stay:</h2>

</section>
<?php include("phpFiles/footer.php"); ?>