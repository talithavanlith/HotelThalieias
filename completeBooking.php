<?php
session_start();
$scriptList = array('jquery-3.3.1.min.js', 'Cookies.js', 'chosenRooms.js');
include("phpFiles/header.php");
?>

<main>
<!--    <h2 id="formSection">Your Cart Items:</h2>-->
    <h2 class="booked">Your pending booking:</h2>

    <table id="bookingTable"></table>
    <!-- table inserted here via javaScript, displays all the pending bookings and total price-->

    <p>Please fill out the form below in order to complete your booking</p>
    <section>
        <form id="checkoutForm" action="validateCheckout.php" method="POST" novalidate>
            <fieldset>
                <!-- First section of form is delivery address etc. -->
                <legend>Personal Details:</legend>
                <p>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name"
                        <?php
                        if (isset($_SESSION['name'])) {
                            $text = $_SESSION['name'];
                            echo "value='$text''";
                        }?>>
                </p>
                <p>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email"
                        <?php
                        if (isset($_SESSION['email'])) {
                            $text = $_SESSION['email'];
                            echo "value='$text''";
                        }?>>
                </p>
            </fieldset>

            <!-- Next section has credit card details -->
            <fieldset>
                <legend>Payment Details:</legend>
                <p>
                    <label for="cardType">Card type:</label>
                    <select name="cardType" id="cardType">
                        <?php
                        if (isset($_SESSION['cardType'])) {
                            $text = $_SESSION['cardType'];
                        }?>
                        <option value="amex">American Express</option>
                        <option value="mcard" <?php if ($text == 'mcard') {echo " selected";}?>>Master Card</option>
                        <option value="visa" <?php if ($text == 'visa') {echo " selected";}?>>Visa</option>
                    </select>
                </p>
                <p>
                    <label for="cardNumber">Card number:</label>
                    <input type="text" name="cardNumber" id="cardNumber" maxlength="16"
                        <?php
                        if (isset($_SESSION['cardNumber'])) {
                            $text = $_SESSION['cardNumber'];
                            echo "value='$text''";
                        }?>>
                </p>
                <!-- can possibly make below more efficient later on -->

                <p>
                    <label for="cardMonth">Expiry date:</label>
                    <select name="cardMonth" id="cardMonth">
                        <?php
                        if (isset($_SESSION['cardMonth'])) {
                            $text = $_SESSION['cardMonth'];
                        }?>
                        <option value="1">01</option>
                        <option value="2" <?php if ($text == '2') {echo " selected";}?>>02</option>
                        <option value="3" <?php if ($text == '3') {echo " selected";}?>>03</option>
                        <option value="4" <?php if ($text == '4') {echo " selected";}?>>04</option>
                        <option value="5" <?php if ($text == '5') {echo " selected";}?>>05</option>
                        <option value="6" <?php if ($text == '6') {echo " selected";}?>>06</option>
                        <option value="7" <?php if ($text == '7') {echo " selected";}?>>07</option>
                        <option value="8" <?php if ($text == '8') {echo " selected";}?>>08</option>
                        <option value="9" <?php if ($text == '9') {echo " selected";}?>>09</option>
                        <option value="10" <?php if ($text == '10') {echo " selected";}?>>10</option>
                        <option value="11" <?php if ($text == '11') {echo " selected";}?>>11</option>
                        <option value="12" <?php if ($text == '12') {echo " selected";}?>>12</option>
                    </select> / <select name="cardYear" id="cardYear"
                        <?php
                        if (isset($_SESSION['cardYear'])) {
                            $text = $_SESSION['cardYear'];
                        }?>>
                        <option value="2014">2014</option>
                        <option value="2015" <?php if ($text == '2015') {echo " selected";}?>>2015</option>
                        <option value="2016" <?php if ($text == '2016') {echo " selected";}?>>2016</option>
                        <option value="2017" <?php if ($text == '2017') {echo " selected";}?>>2017</option>
                        <option value="2018" <?php if ($text == '2018') {echo " selected";}?>>2018</option>
                        <option value="2019" <?php if ($text == '2019') {echo " selected";}?>>2019</option>
                        <option value="2020" <?php if ($text == '2020') {echo " selected";}?>>2020</option>
                        <option value="2021" <?php if ($text == '2021') {echo " selected";}?>>2021</option>
                    </select>
                </p>
                <p>
                    <label for="cardValidation">CVC:</label>
                    <input type="text" class="short" name="cardValidation" id="cardValidation"
                        <?php
                        if (isset($_SESSION['cardValidation'])) {
                            $text = $_SESSION['cardValidation'];
                            echo "value='$text''";
                        }?>>
                </p>
            </fieldset>
            <input class="delete" type="button" value="Cancel">
            <input type="submit">
            <p id="errorMessages"> </p>
        </form>
    </section>
</main>

<?php include("phpFiles/footer.php"); ?>
