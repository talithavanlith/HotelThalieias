var Rooms = (function(){
    "use strict";

    var pub = {};

    function parseRooms(data, target) {
            var text, i, info, id, description, maxGuests;

            info = $(data).find("roomType");

            for(i=0; i < $(info).length; i+=1){
                    id = $(info[i]).find("id")[0].textContent;
                    description = $(info[i]).find("description")[0].textContent;
                    maxGuests = $(info[i]).find("maxGuests")[0].textContent;
                    text = "<h3>" + id + "</h3> <p>" + description +
                        "</p><p>Maximum number of guests: " + maxGuests +"</p>";
                    $(target[i]).html(text);
            }


    }

    function showRooms() {
        var target, xmlSource;
        target = $(".room");
        xmlSource = "./xml/roomTypes.xml";

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
        showRooms();
    };

    return pub;

}());

$(document).ready(Rooms.setup);