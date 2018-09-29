var adminBookings = (function(){
    "use strict";

    var pub = {};
    var checkInList = [];
    var checkOutList = [];
    var numberList = [];


    pub.checkAvailability = function(number, checkIn, checkOut) {
        var value = numberList.indexOf(number);

        if(value >= 0){
            if((checkIn >= checkInList[value] && checkIn <= checkOutList[value])
                || (checkOut >= checkInList[value]
                    && checkOut <= checkOutList[value])){
                return false;

            }
            if(checkIn <= checkInList[value] &&
                checkOut >= checkOutList[value]){
                return false;

            }
        }
        return true;
    };

    function parseRooms(data, target) {


        var text ="";
        var i, info, number, name, checkin, checkout;

        info = $(data).find("booking");

        for(i=0; i < $(info).length; i+=1){
            number = $(info[i]).find("number")[0].textContent;
            name = $(info[i]).find("name")[0].textContent;
            checkin = new Date($(info[i]).find("checkin")[0].textContent);
            checkout = new Date($(info[i]).find("checkout")[0].textContent);
            checkInList.push(checkin);
            checkOutList.push(checkout);
            numberList.push(number);
            text += "<div class=\"roomBooked\"> <h3>Room Number: " +
                number + "</h3> <p>Booked by: " + name+"</p>" +
                "<p>Check in date: " + checkin.getDate() + "/" +
                (checkin.getMonth() + 1) + "/" + checkin.getFullYear() +
                "</p>" + "<p>Check out Date: " +  checkout.getDate()+ "/" +
                (checkout.getMonth() + 1) + "/" + checkout.getFullYear() +
                "</p></div>";

        }
        $(target).after(text);


    }

    function showBookings() {
        var target, xmlSource;
        target = $(".bookings");
        xmlSource = "./xml/roomBookings.xml";

        $.ajax({
            type: "GET",
            url: xmlSource,
            cache: false,
            success: function(data) {
                parseRooms(data, target);
            },
            error: function() {
                $(target).html("<p>There was an error loading the details</p>");
            }
        });
    }

    pub.setup = function() {
        showBookings();
    };

    return pub;

}());

$(document).ready(adminBookings.setup);