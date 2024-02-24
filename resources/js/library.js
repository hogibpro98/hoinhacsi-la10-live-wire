import Swiper from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import { Navigation, FreeMode } from "swiper/modules";

const swiper = new Swiper(".mySwiper", {
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
    },
    modules: [FreeMode, Navigation],
});

const swiper2 = new Swiper(".mySwiper2", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next2",
        prevEl: ".prev2",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 16,
        },
    },
    modules: [FreeMode, Navigation],
});

const swiper3 = new Swiper(".mySwiper3", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next3",
        prevEl: ".prev3",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 16,
        },
    },
    modules: [FreeMode, Navigation],
});

const swiper4 = new Swiper(".mySwiper4", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next4",
        prevEl: ".prev4",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 16,
        },
    },
    modules: [FreeMode, Navigation],
});

const swiper5 = new Swiper(".mySwiper5", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next5",
        prevEl: ".prev5",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 5,
            spaceBetween: 24,
        },
    },
    modules: [FreeMode, Navigation],
});

const swiper6 = new Swiper(".mySwiper6", {
    direction: "horizontal",
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.5,
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 5,
            spaceBetween: 24,
        },
    },
    modules: [FreeMode, Navigation],
});
const swiper7 = new Swiper(".mySwiper7", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next7",
        prevEl: ".prev7",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 16,
        },
    },
    modules: [FreeMode, Navigation],
});
const swiper8 = new Swiper(".mySwiper8", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next8",
        prevEl: ".prev8",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 16,
        },
    },
    modules: [FreeMode, Navigation],
});
const swiper9 = new Swiper(".mySwiper9", {
    direction: "horizontal",
    navigation: {
        nextEl: ".next9",
        prevEl: ".prev9",
    },
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 16,
        },
    },
    modules: [FreeMode, Navigation],
});

const swiper10 = new Swiper(".mySwiper10", {
    direction: "horizontal",
    freeMode: true,
    breakpoints: {
        0: {
            slidesPerView: 2.5,
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 5,
            spaceBetween: 24,
        },
    },
    modules: [FreeMode, Navigation],
});
