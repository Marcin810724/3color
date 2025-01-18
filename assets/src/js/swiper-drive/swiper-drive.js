var swiper = new Swiper(".mySwiper-partnerzy", {
    spaceBetween: 30,
    slidesPerView: 10,
    loop: true,
    autoplay: {
        delay: 5500,
        disableOnInteraction: false,
    },
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2
        },
        // when window width is >= 480px
        640: {
            slidesPerView: 4,
            centeredSlides: true
        },
        // when window width is >= 640px
        990: {
            slidesPerView: 6
        }
    }
});
