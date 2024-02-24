import Swiper from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import { Navigation } from "swiper/modules";

const swiper = new Swiper(".mySwiper", {
    slidesPerView: "auto",
    spaceBetween: 8,
    // freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".next",
        prevEl: ".prev",
    },
    modules: [Navigation],
});

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("edit").addEventListener("click", function () {
        if (document.querySelectorAll(".ck-content").length <= 0) {
            ClassicEditor.create(document.querySelector("#editor"), {
                fontFamily: {
                    options: [
                        "Inter, sans-serif",
                        "Arial, sans-serif",
                        "Times New Roman, serif",
                        "Verdana, Arial, sans-serif",
                        "Courier New, Courier, monospace",
                    ],
                },
                fontSize: {
                    options: [9, 10, 11, 12, 14, 16, 18, 20, 24, 28],
                },
            }).catch((error) => {
                console.error(error);
            });
        }
    });
});
window.chartProfile = Highcharts.chart("overviewChart", {
    chart: {
        type: "spline",
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    accessibility: {
        enabled: false,
    },
    legend: {
        enabled: false,
    },
    yAxis: {
        opposite: true,
        title: {
            text: "",
        },
        labels: {
            enabled: true,
            style: {
                color: "#707A8F",
                fontSize: window.innerWidth >= 768 ? "16px" : "13px",
                fontWeight: 500,
                lineHeight: "24px",
                fontFamily: "Inter",
                fontStyle: "normal",
                align: "right",
            },
        },
    },
    xAxis: {
        lineColor: "#E3E7ED",
        categories: [
            "13/07/2023",
            "14/07/2023",
            "15/07/2023",
            "16/07/2023",
            "17/07/2023",
            "18/07/2023",
            "19/07/2023",
            "20/07/2023",
            "21/07/2023",
        ],
        labels: {
            enabled: true,
            style: {
                color: "#707A8F",
                fontSize: window.innerWidth >= 768 ? "16px" : "13px",
                fontWeight: 500,
                lineHeight: "24px",
                fontFamily: "Inter",
                fontStyle: "normal",
            },
        },
    },
    series: [
        {
            name: "Tokyo",
            color: "#0B89B7",
            data: [10, 50, 70, 30, 50],
        },
    ],
});
