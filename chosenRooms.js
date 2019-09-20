var chosenRooms = (function(){
    "use strict";
    var pub = {};
    var roomList = [];

    function viewRoomsChosen() {
        "use strict";
        var i, itemList, text, total;

        $(".booked").show();

        text = "<table style=\"width:80%\">";
        total = 0;
        if(Cookie.get("Book") != null){
            itemList = JSON.parse(Cookie.get("Book"));
            for(i =0; i<itemList.length; i++){
                text += ("<tr><td><strong>" + (i+1) + ". </strong></td><td>" + itemList[i].number + "</td><td>" + itemList[i].price + "</td></tr>");
                total += parseFloat(itemList[i].price);
            }
            $(".item").html(text + "</table>");
            $(".total").html("<strong>Total Price = </strong> $" + total.toFixed(2));
        }


    }

    function roomDetails() {
        var roomToBook = {};
        roomToBook.number = $(this).parent().parent().find("h3")[0].textContent;
        roomToBook.price = $(this).parent().textContent;
        alert(roomToBook.number + " " + roomToBook.price);
        if(Cookie.get("Book") == null){
            roomList.push(roomToBook);
            Cookie.set("Book", JSON.stringify(roomList), 1);
        } else {
            roomList = JSON.parse(Cookie.get("Book"));
            roomList.push(roomToBook);
            Cookie.set("Book", JSON.stringify(roomList), 1);
        }
        viewRoomsChosen();

    }

    function hello() {
        alert("hello");

    }

    pub.setup = function() {
        "use strict";
        $(".bookButton").click(hello);
        roomDetails();

    };
    return pub;

}());

$(document).ready(chosenRooms.setup);