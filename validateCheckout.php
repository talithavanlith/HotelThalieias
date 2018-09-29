<?php
session_start();
$scriptList = array('jquery-3.3.1.min.js', 'Cookies.js', 'chosenRooms.js');
include("phpFiles/header.php");
?>

    <section>
        <?php
        //add all details to session
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['cardType'] = $_POST['cardType'];
        $_SESSION['cardNumber'] = $_POST['cardNumber'];
        $_SESSION['cardMonth'] = $_POST['cardMonth'];
        $_SESSION['cardYear'] = $_POST['cardYear'];
        $_SESSION['cardValidation'] = $_POST['cardValidation'];

        include ("phpFiles/validateFunctions.php");

        if(validateCheckout()){

            ?>
            <h2>The booking was successful!</h2>
            <table id="bookingTable"></table>
            <?php
            $_SESSION = array();
            session_destroy();

//            $text = "<table style=\"width:60%\">\n".
//                "  <tr>\n".
//                "    <th>Title</th> \n".
//                "    <th>Price</th>\n</tr>";
//            foreach ($cart as &$item){
//                $text = $text."<tr></tr><td>$item->title</td><td>\$$item->price</td></tr>";
//            }
//            echo($text."</table>");

            $book = json_decode($_COOKIE['Book']);

            $bookings = simplexml_load_file('xml/trialBookings.xml');
            $newBooking = $bookings->addChild('booking');
            $newBooking->addChild('number', $book[0]->number);
            $newBooking->addChild('name', $_POST['name']);
//            $checkin = $newBooking->addChild('checkin');
            $newBooking->addChild('checkin', $book[0]->checkInDate);
            $newBooking->addChild('checkout', $book[0]->checkOutDate);


            $bookings->saveXML('xml/trialBookings.xml');


            setcookie('Book', '', time()-3600, '/');
            unset($_COOKIE['Book']);
        }

        ?>
    </section>

<?php include("phpFiles/footer.php"); ?>