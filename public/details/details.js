// Product Slider
$(".product-slider").each(function() {
    var id = $(this).attr("id");
    var sliderId = "#" + id;

    var swiper = new Swiper(sliderId, {
        speed: 400,
        spaceBetween: 25,
        loop: true,
        slidesPerView: 3,

        // Navigation arrows
        navigation: {
            nextEl: sliderId + "-next",
            prevEl: sliderId + "-prev",
        },

        breakpoints: {
            320: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            1200: {
                slidesPerView: 3
            },
        }
    })
})

// Shop single slider
var proSingleThumb = new Swiper(".slider-thumbnails", {
    loop: true,
    speed: 1000,
    spaceBetween: 20,
    slidesPerView: 3,
    breakpoints: {
        0: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        576: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    }
});
var proSingleSlider = new Swiper(".product-single-slider", {
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 3000
    },
    watchSlidesProgress: true,
    thumbs: {
        swiper: proSingleThumb,
    },

    // Navigation arrows
    navigation: {
        nextEl: ".slider-btn-next",
        prevEl: ".slider-btn-prev",
    },
});


/*============================================
    Product single popup
============================================*/
$(".lightbox-single").magnificPopup({
    type: "image",
    mainClass: 'mfp-with-zoom',
    gallery: {
        enabled: true
    }
});

    /*============================================
        Image to background image
    ============================================*/
    var bgImage = $(".bg-img")
    bgImage.each(function() {
        var el = $(this),
            src = el.attr("data-bg-image");

        el.css({
            "background-image": "url(" + src + ")",
            "background-size": "cover",
            "background-position": "center",
            "display": "block"
        });
    });
    /*============================================*/
