var carousel = (function(){
    "use strict";

    var pub = {};

    var currentPosition, slider, count, sliderWidth, direction = 1;

    function SlideImage() {
        if (currentPosition === count-3){
            direction = -1;
        }else if(currentPosition === 0){
            direction = 1;
        }
        currentPosition+= direction;
        $(".sliderWrapper").animate({"marginLeft":
            sliderWidth * (-currentPosition)});
    }

    pub.setup = function() {
        currentPosition = 0;
        slider = $(".slider");
        count= slider.length;
        sliderWidth = slider.width();

        $(".slideshowContainer").css("width", sliderWidth * count);
        setInterval(SlideImage, 2000);
    };

    return pub;
}());

$(document).ready(carousel.setup);




