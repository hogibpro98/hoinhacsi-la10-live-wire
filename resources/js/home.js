import Swiper from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import { Navigation } from "swiper/modules";

const swiper = new Swiper(".representative-musician", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next",
        prevEl: ".prev",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 1.5,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 16,
        },
        1280: {
            slidesPerView: 5,
            spaceBetween: 16,
        },
    },
    modules: [Navigation],
});

const librarySwiper = new Swiper(".library-connection", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next-lib",
        prevEl: ".prev-lib",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 1.5,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1280: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
    modules: [Navigation],
});
