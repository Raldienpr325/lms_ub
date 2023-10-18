import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs';

const swiper = new Swiper('.swiper', {
    slidesPerView: 3,
    spaceBetween: 20,

    pagination: {
        el: '.swiper-pagination',
    },

    breakpoints: {
        100: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        950: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
});

const swiper2 = new Swiper('.swiper2', {
    slidesPerView: 4,
    spaceBetween: 20,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        100: {
            slidesPerView: 1,
            spaceBetween: 40,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 25,
        },
        950: {
            slidesPerView: 3,
            spaceBetween: 23,
        },
        1150: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
});
