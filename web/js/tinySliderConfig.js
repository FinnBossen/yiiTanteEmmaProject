// config for the Werbemittel Slider with tinyslider
// Is imported to the YiiProject with the AppAsset.php

const slider = tns({
    container: ".my-slider",
    items: 1,
    mouseDrag: true,
    slideBy: "page",
    swipeAngle: false,
    speed: 400,
    autoplay: true,
    loop: true,
    nav: false,
    controls: false,
    arrowKeys: true,
    autoplayButtonOutput: false
});

