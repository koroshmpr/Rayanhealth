import 'bootstrap';
import $ from 'jquery';
import 'swiper/css';
import Swiper from 'swiper/bundle';
import AOS from 'aos';
import 'aos/dist/aos.css';


$(document).ready(function () {
    // Keep track of which tab is currently active
    let currentTab = null;
    $(".nav-pills").mouseenter(function () {
        // Remove the 'active' class from all other buttons
        $(".nav-pills").not(this).find("button").removeClass("active");
        // Remove the 'active' class from all other sections
        $(".tab-pane").removeClass("show active");
        // Add the 'active' class to the hovered button
        let megaMenu = $(this).children("button");
        let sectionId = megaMenu.attr('data-bs-target');
        if (!megaMenu.hasClass('active')) {
            megaMenu.addClass("active");
        }
        // Add the 'active' class to the section with the id equal to sectionId
        $(sectionId).addClass("show active");
        // Update currentTab
        currentTab = sectionId;
    });

    $(".nav-pills, .tab-pane").mouseenter(function () {
        // Keep the 'active' class on the current tab and section while hovering
        if (currentTab) {
            $(currentTab).addClass("show active");
        }
    });
    $(".nav-pills, .tab-pane").mouseleave(function () {
        // Remove the 'active' class from the tab content if leaving both nav-pills and tab content
        if (!$(this).hasClass('nav-pills') || $(this).hasClass('tab-pane')) {
            $(currentTab).removeClass("show active");
            currentTab = null;
        }
    });
});



document.addEventListener('DOMContentLoaded', function () {
    AOS.init();
    let backToTop = document.getElementById("backToTop");
    if (backToTop) {
        backToTop.addEventListener('click', backtoTopHandler)

        function backtoTopHandler() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    }
    const heroSlider = new Swiper('.hero_slider', {
        direction: 'horizontal',
        slidesPerView: 1,
        spaceBetween: 0,
        grabCursor: true,
        speed: 700,
        autoplay: {
            delay: 5000,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true, // Ensures the keyboard control only works when Swiper is in viewport
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        effect: 'slide',
        on: {
            init: function () {
                const slides = this.slides;

                // Initialize all slides
                slides.forEach((slide, index) => {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');
                    elementsWithAos.forEach((element) => {
                        if (index === this.realIndex) {
                            element.classList.add('aos-animate');
                        } else {
                            element.classList.remove('aos-animate');
                        }
                    });
                });
            },
            slideChange: function () {
                const activeSlideIndex = this.realIndex;
                const slides = this.slides;

                // Handle slide change
                slides.forEach((slide, index) => {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');
                    elementsWithAos.forEach((element) => {
                        if (index === activeSlideIndex) {
                            element.classList.add('aos-animate');
                        } else {
                            element.classList.remove('aos-animate');
                        }
                    });
                });
            }
        }

    });
    const blogPost = new Swiper('.blogPost', {
        direction: 'horizontal',
        slidesPerView: 1,
        spaceBetween: 0,
        grabCursor: true,
        speed: 700,
        autoplay: {
            delay: 5000,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true, // Ensures the keyboard control only works when Swiper is in viewport
        },
        breakpoints: {
            768: {
                spaceBetween: 20,
                slidesPerView: 2,
            },
            1280: {
                spaceBetween: 30,
                slidesPerView: 3,
            }
        },
        navigation: {
            nextEl: ".blog-button-next",
            prevEl: ".blog-button-prev"
        },
        effect: 'slide',
        on: {
            init: function () {
                const slides = this.slides;

                // Initialize all slides
                slides.forEach((slide, index) => {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');
                    elementsWithAos.forEach((element) => {
                        if (index === this.realIndex) {
                            element.classList.add('aos-animate');
                        } else {
                            element.classList.remove('aos-animate');
                        }
                    });
                });
            },
            slideChange: function () {
                const activeSlideIndex = this.realIndex;
                const slides = this.slides;

                // Handle slide change
                slides.forEach((slide, index) => {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');
                    elementsWithAos.forEach((element) => {
                        if (index === activeSlideIndex) {
                            element.classList.add('aos-animate');
                        } else {
                            element.classList.remove('aos-animate');
                        }
                    });
                });
            }
        }

    });
    const topBar = new Swiper('.topBar', {
        direction: 'horizontal',
        slidesPerView: 1,
        spaceBetween: 0,
        grabCursor: true,
        speed: 700,
        autoplay: {
            delay: 5000,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1280: {
                slidesPerView: 4,
            }
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true, // Ensures the keyboard control only works when Swiper is in viewport
        },
        effect: 'slide',

    });
})