var chosenRooms = (function(){
    "use strict";
    var pub = {};
    var roomList = [];

    function viewRoomsChosen() {
        "use strict";
        var i, itemList, text, total;

        text = "  <tr>\n" +
            "    <th>Room Number</th>\n" +
            "    <th>Check In Date</th> \n" +
            "    <th>Check Out Date</th> \n" +
            "    <th>Price per Night</th>\n"+
            "    <th>Total Price for Room</th>";
        total = 0;
        if(Cookie.get("Book") != null){
            itemList = JSON.parse(Cookie.get("Book"));
            for(i =0; i<itemList.length; i++){
                text += ("<tr><td>" + itemList[i].number + "</td><td>" + itemList[i].checkInDate + "</td><td>" + itemList[i].checkOutDate + "</td><td>NZD$" + itemList[i].price + "</td><td>NZD$"+ itemList[i].totalPrice + ".00</td></tr>");
                total += parseFloat(itemList[i].totalPrice);
            }
            $("#bookingTable").html(text + "<tr><td></td><td></td><td></td><td style='font-weight: bold'>Total Price:</td><td style='font-weight: bold'>$" + total.toFixed(2) + "</td></tr>");

        }


    }

    function deleteCookie() {
        var sure = window.confirm("Are you sure you want to cancel your pending booking?");
        if(sure === true){
            Cookie.clear("Book");
            window.location.href='book.php'

        }

    }

    pub.roomDetails = function() {
        var roomToBook = {};

        roomToBook.number = $(this).parent().parent().find("span")[0].textContent;
        roomToBook.price = $(this).parent().parent().find("span")[1].textContent;

        var checkin = new Date($("#checkInDay").val() + " " +  $("#checkInMonth").val() + " " + $("#checkInYear").val());
        var checkout = new Date($("#checkOutDay").val() + " " +  $("#checkOutMonth").val() + " " + $("#checkOutYear").val());

        roomToBook.checkInDate = checkin.getDate() + "/" + (checkin.getMonth() + 1) + "/" + checkin.getFullYear();
        roomToBook.checkOutDate = checkout.getDate()+ "/" + (checkout.getMonth() + 1) + "/" + checkout.getFullYear();

        var numOfNights = (checkout - checkin)/86400000;
        roomToBook.totalPrice = (numOfNights * roomToBook.price).toFixed(0);

        if(Cookie.get("Book") == null){
            roomList.push(roomToBook);
            Cookie.set("Book", JSON.stringify(roomList), 1);
        } else {
            roomList = JSON.parse(Cookie.get("Book"));
            roomList.push(roomToBook);
            Cookie.set("Book", JSON.stringify(roomList), 1);
        }
        viewRoomsChosen();

    };

    pub.setup = function() {
        if(Cookie.get("Book") != null){
            viewRoomsChosen();
            $(".delete").click(deleteCookie);
        }
    };
    return pub;

}());

$(document).ready(chosenRooms.setup);