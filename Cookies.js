var Cookie = (function () {
    "use strict";
    var pub = {};


    pub.set = function (name, value, hours) {
        var date, expires;

        if (hours) {
            date = new Date();
            date.setHours(date.getHours() + hours);
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }

        document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
    };


    pub.get = function (name) {
        var nameEq, cookies, cookie, i;

        nameEq = encodeURIComponent(name) + "=";
        cookies = document.cookie.split(";");

        for (i = 0; i < cookies.length; i += 1) {
            cookie = cookies[i].trim();
            if (cookie.indexOf(nameEq) === 0) {
                return decodeURIComponent(cookie.substring(nameEq.length, cookie.length));
            }
        }

        return null;
    };

    pub.clear = function (name) {
        pub.set(encodeURIComponent(name), "", -1);
    };

    return pub;
}());