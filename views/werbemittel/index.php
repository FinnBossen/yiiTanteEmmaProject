<?php
/* @var $this yii\web\View */
?>
<h1>Werbemittel Preview</h1>
<div class="slider-container">
    <ul class="controls" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
        <li class="prev" data-controls="prev" aria-controls="customize" tabindex="-1">
            <i class="fas fa-angle-left fa-5x"></i>
        </li>
        <li class="next" data-controls="next" aria-controls="customize" tabindex="-1">
            <i class="fas fa-angle-right fa-5x"></i>
        </li>
    </ul>
    <div class="my-slider">
        <div class="slider-item">
            <div class="card">
                <img src="https://placeimg.com/200/150/any" alt="">
                <h2>Title 1</h2>
                <p class="card_description">Loresm ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, voluptas!</p>
            </div>
        </div>

        <div class="slider-item">
            <div class="card">
                <img src="https://placeimg.com/200/150/nature" alt="">
                <h2>Title 2</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, voluptas!</p>
            </div>
        </div>

        <div class="slider-item">
            <div class="card">
                <img src="https://placeimg.com/200/150/nature/2" alt="">
                <h2>Title 3</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, voluptas!</p>
            </div>
        </div>
        <div class="slider-item">
            <div class="card">
                <img src="https://placeimg.com/200/150/nature/3" alt="">
                <h2>Title 4</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, voluptas!</p>
            </div>
        </div>
    </div>
</div>

<script type="module">
    import {tns} from 'tiny-slider';

    const slider = tns({
        container: ".my-slider",
        loop: true,
        items: 1,
        slideBy: "page",
        nav: false,
        autoplay: true,
        speed: 400,
        autoplayButtonOutput: false,
        mouseDrag: true,
        lazyload: true,
        controlsContainer: "#customize-controls",
        responsive: {
            640: {
                items: 2
            },

            768: {
                items: 3
            }
        }
    });

</script>