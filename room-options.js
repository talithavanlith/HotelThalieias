var room_options = (function(){
    "use strict";

    var pub = {};
    var checkIn, checkOut;



    function parseRooms(data, target) {
        if($("#availableRooms") != null){
            $("#availableRooms").remove();
        }

        var text ="";
        var i, info;

        info = $(data).find("hotelRoom");

        for(i=0; i < $(info).length; i++){
            var number = $(info[i]).find("number")[0].textContent;
            var roomType = $(info[i]).find("roomType")[0].textContent;
            var description = $(info[i]).find("description")[0].textContent;
            var pricePerNight = $(info[i]).find("pricePerNight")[0].textContent;

            if (adminBookings.checkAvailability(number, checkIn, checkOut)){
                text += "<div class=\"options\"><h3>Room Number: " + number + "</h3> <p>"+ roomType + ", " + description + "</p><p>Price per night: &emsp;&emsp;NZD$" + pricePerNight +"<input class=\"bookButton\" type=\"submit\" value=\"Book\"></p></div>";
            }
        }

        $(target).after("<section id=\"availableRooms\" style='margin: 0; padding: 0;'>" + text+ "</section>");

    }

    function showRooms() {
        var target, xmlSource;
        target = $(".optionsTitle");
        $(target).show();
        xmlSource = "./xml/availableRooms.xml";

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

    function printErrorMessages(messages) {
        var text, i;
        text = "<ul>";
        for(i=0; i<messages.length; i++){
            text += "<li>" + messages[i] + "</li>";
        }
        $("#error").html(text + "</ul>");
    }

    function getDates() {
        var messages =[];
        checkIn = new Date($("#checkInDay").val() + " " +  $("#checkInMonth").val() + " " + $("#checkInYear").val());
        checkOut = new Date($("#checkOutDay").val() + " " +  $("#checkOutMonth").val() + " " + $("#checkOutYear").val());
        var today = new Date();
        /*if((checkIn.getFullYear() != $("#checkInYear").val()) && checkIn.getMonth() != $("#checkInMonth").val() && d.getDate() != $("#checkInDay").val()){

            messages.push("* Your check in date must be a real date");
        }*/

        if (checkOut <= checkIn){
            messages.push("* Your check out date must be after your check in date");
        }
        if(checkIn < today){
            messages.push("* Your check in date must be in the future");
        }

        if(messages.length === 0){
            $("#error").html("");
            showRooms();

        }else{
            printErrorMessages(messages);
        }


    }

    function hello() {
        alert("hello");

    }

    pub.setup = function() {
        $(".optionsTitle").hide();
        $(".booked").hide();
        $("#searchButton").click(getDates);
    };

    return pub;

}());

$(document).ready(room_options.setup);