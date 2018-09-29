var room_options = (function(){
    "use strict";

    var pub = {};
    var checkIn, checkOut;

    function parseRooms(data, target) {
        if($("#availableRooms") !== null){
            $("#availableRooms").remove();
        }

        var text ="";
        var i, info, number, roomType, description, pricePerNight;

        info = $(data).find("hotelRoom");

        for(i=0; i < $(info).length; i+=1){
            number = $(info[i]).find("number")[0].textContent;
            roomType = $(info[i]).find("roomType")[0].textContent;
            description = $(info[i]).find("description")[0].textContent;
            pricePerNight = $(info[i]).find("pricePerNight")[0].textContent;

            if (adminBookings.checkAvailability(number, checkIn, checkOut)){
                text += "<div class=\"options\"><h3>Room Number: <span>"
                    + number + "</span></h3> <p>"+ roomType + "</p><p>"
                    + description + "</p><p>Price per night: &emsp;&emsp;NZD$" +
                    "<span>" + pricePerNight +"</span><input type=\"button\"" +
                    " class=\"bookButton\" value=\"Book\"></p></div>";
            }
        }

        $(target).after("<section id=\"availableRooms\" style='margin:" +
            " 0; padding: 0;'>" + text+ "</section>");
        $(".bookButton").click(chosenRooms.roomDetails);
        $(".bookButton").click(function(){
            window.location.href='completeBooking.php';
        })

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
        for(i=0; i<messages.length; i+=1){
            text += "<li>" + messages[i] + "</li>";
        }
        $("#error").html(text + "</ul>");
    }

    function verifyDates(dayIn, monthIn, yearIn, dayOut, monthOut,
                         yearOut, messages) {
        var today = new Date();
        var months30Days = ["April", "June", "September", "November"];

        // Check February check in date (2020 is a leap year)
        if (yearIn === 2020 && monthIn === "February" && dayIn > 29){
            messages.push("* Your check in date must be a real date");
        } else if (yearIn != 2020 && monthIn === "February" && dayIn > 28) {
            messages.push("* Your check in date must be a real date");
        }

        // Check February check out date (2020 is a leap year)
        if (yearOut === 2020 && monthOut === "February" && dayOut > 29){
            messages.push("* Your check out date must be a real date");
        } else if(yearOut != 2020 && monthOut === "February" && dayOut > 28){
            messages.push("* Your check out date must be a real date");
        }

        //check months with 30 days checkIn
        var value = months30Days.indexOf(monthIn);
        if (value >= 0 && dayIn > 30) {
            messages.push("* Your check in date must be a real date");
        }

        //check months with 30 days checkOut
        value = months30Days.indexOf(monthOut);
        if (value >= 0 && dayOut > 30) {
            messages.push("* Your check out date must be a real date");
        }

        //check that checkOut is after checkIn
        if (checkOut <= checkIn){
            messages.push("* Your check out date must be after your " +
                "check in date");
        }
        //check that checkIn is in the future
        if(checkIn < today){
            messages.push("* Your check in date must be in the future");
        }

    }

    function getDates() {
        var messages = [];
        var dayIn, monthIn, yearIn, dayOut, monthOut, yearOut;

        dayIn = $("#checkInDay").val();
        monthIn = $("#checkInMonth").val();
        yearIn = $("#checkInYear").val();
        checkIn = new Date( dayIn + " " + monthIn + " " + yearIn);

        dayOut = $("#checkOutDay").val();
        monthOut = $("#checkOutMonth").val();
        yearOut = $("#checkOutYear").val();
        checkOut = new Date( dayOut + " " + monthOut + " " + yearOut);

        verifyDates(dayIn, monthIn, yearIn, dayOut, monthOut,
            yearOut, messages);

        if(messages.length === 0){
            $("#error").html("");
            showRooms();
        }else{
            printErrorMessages(messages);
        }


    }

    pub.setup = function() {
        $(".optionsTitle").hide();
        $("#searchButton").click(getDates);
    };

    return pub;

}());

$(document).ready(room_options.setup);