jQuery(document).ready(function() {
    /*==============================
        counter js
    ==============================*/


    $('.count-number').counterUp({
        delay: 10,
        time: 1000
    });

    /*==============================
       video popup js
    ==============================*/
    var $video_popup = $('.play-button');
        $video_popup.magnificPopup({
            tClose: 'Close (Esc)',
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
    });

    /*==============================
        magnificPopup js
    ==============================*/
    $('.full-view').on('click', function () {
        $(this).next().magnificPopup('open');
    });
    $('.slider-big, .style2-slider-big, .style4-slider-big, .slider-big-6, .slider-big-7').magnificPopup({
        delegate: 'a',
        type: 'image',
        showCloseBtn: true,
        closeBtnInside: false,
        midClick: true,
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });

    /*====================================
        header-sticky js
    ====================================*/
    var lastScrollTop = 0;
    $(window).on('scroll', () => {
        var header = $('#stickyheader'),
        sticky = $(window).scrollTop();
        if (sticky >= 100) {
            header.addClass('sticky-header');
        } else {
            header.removeClass('sticky-header');
        }
    });

    /*====================================
        toggler-menu js
    ====================================*/
    $(".toggler-wrapper button.toggler-btn").on("click", function() {
        $("#mobile-menu, .main-menu-area, .header-bottom").addClass('active');
        $(".bg-screen").addClass('active');
        $("body").addClass('hidden');
    });
    $(".menu-close button.menu-close-btn").on("click", function() {
        $("#mobile-menu, .main-menu-area, .header-bottom").removeClass('active');
        $(".bg-screen").removeClass('active');
        $("body").removeClass('hidden');
    });

    /*==============================
        filter js
    ==============================*/
    $('button.filter-button').on('click', function () {
        $('.filter-sidebar').addClass("active");
        $('.screen-bg').addClass("active");
    });
    $('button.close-sidebar').on('click', function () {
        $('.filter-sidebar').removeClass("active");
        $('.screen-bg').removeClass("active");
    });

    /*====================================
        cart-drawer js
    ====================================*/
    $(".cart-wrapper a.js-cart-drawer").on("click", function() {
        $("#cart-drawer").addClass('active');
        $(".bg-screen").addClass('active');
        $("body").addClass('hidden');
    });
    $(".drawer-close button.drawer-close-btn").click(function() {
        $("#cart-drawer").removeClass('active');
        $(".bg-screen").removeClass('active');
        $("body").removeClass('hidden');
    });

    /*====================================
        bg-screen js
    ====================================*/
    $(".bg-screen").on("click", function() {
        $(this).removeClass('active');
        $(".main-menu-area").removeClass('active');
        $("#cart-drawer").removeClass('active');
        $("body").removeClass('hidden');
        });
        $('#trigger-overlay').on('click', function(){
        $(".overlay").addClass('open');
    });

    $('.overlay-close').on('click', function(){
        $(".overlay").removeClass('open');
    });

    /*===================================
        product-short js
    ===================================*/
    $('.product-short a.short-title-lg').on('click', function () {
        if ($('#select-wrap').hasClass('active')) {
            $('#select-wrap').removeClass('active');
            $(this).removeClass('active');
        }
        else {
            $('#select-wrap').addClass('active');
            $(this).addClass('active');
        }
    });

    /*==========================================
        Minus and Plus Btn js
    ==========================================*/
    $('.dec').on("click",function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.inc').on("click",function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    /*==============================
        quickview slider js
    ==============================*/
    var galleryThumbs = new Swiper(".gallery-thumbs", {
        loop: true,
        spaceBetween: 15,
        slidesPerView: 3,
        thumbs: {
            swiper: galleryTop,
        },
    });
    var galleryTop = new Swiper(".gallery-top", {
        loop: true,
        spaceBetween: 15,
        navigation: {
            nextEl: ".quick-next",
            prevEl: ".quick-prev",
        },
        thumbs: {
            swiper: galleryThumbs,
        },
    });
});

/*==============================
    popup js
==============================*/
$(window).on('load', function () {
    var popup = localStorage.getItem('popup_value');
    if (popup != 1) {
    $('#news-letter-modal').modal('show');
}

/*==============================
    pre-loader js
==============================*/
  $('.preloader').delay(100).fadeOut('fast');
});

/*===================================
    range slider js
===================================*/
if($('#range1').length){
    var slider1 = document.getElementById("range1");
    var slider2 = document.getElementById("range2");
    var output1 = document.getElementById("demo1");
    var output2 = document.getElementById("demo2");
    output1.innerHTML = slider1.value;
    output2.innerHTML = slider2.value;

    slider1.oninput = function() {
        output1.innerHTML = slider1.value;
    }
    slider2.oninput = function() {
        output2.innerHTML = slider2.value;
    }
}

/*==============================
    zoom js
==============================*/
function zoom(e){
    var zoomer = e.currentTarget;
    e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
    e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
    x = offsetX/zoomer.offsetWidth*100
    y = offsetY/zoomer.offsetHeight*100
    zoomer.style.backgroundPosition = x + '% ' + y + '%';
}

/*====================================
   home-1  text-replace js
====================================*/
if($('ul.offer-text-ul li.offer-text-li').length){
    addEventListener('DOMContentLoaded', (event) => {
        var slides = document.querySelectorAll('ul.offer-text-ul li.offer-text-li');
        var currentSlide = 0;
        var slideInterval = setInterval(nextSlide, 3000);
        function nextSlide(){
          slides[currentSlide].className = 'offer-text-li';
          currentSlide = (currentSlide+1)%slides.length;
          slides[currentSlide].className = 'offer-text-li show';
        }
    });
}

/*==============================
    read-agree js
==============================*/
$('label.box-area, .read-agree').on('click', function () {
    if($('.cust-checkbox, .create-checkbox').is(':checked')) {
        $('.checkout, .create').removeClass('disabled');
    }
    else {
        $('.checkout, .create').addClass('disabled');
    }
});

/*===================================
    product-grid js
===================================*/
$('.list-change-view').on("click",function () {
    event.preventDefault();
    var data_grid = $(this).attr('data-grid-view');
    if ($('.special-product').hasClass('grid-1') ||
        $('.special-product').hasClass('grid-2') ||
        $('.special-product').hasClass('grid-3') ||
        $('.special-product').hasClass('grid-4'))
    {
        $('.special-product').removeClass('grid-1');
        $('.special-product').removeClass('grid-2');
        $('.special-product').removeClass('grid-3');
        $('.special-product').removeClass('grid-4');
        $('.special-product').addClass('grid-'+data_grid);
    }
    else {
        $('.special-product').addClass('grid-'+data_grid);
    }
});
$('.list-change-view').on("click",function () {
    $('.list-change-view').removeClass('active');
    $(this).addClass('active');
});

"use strict";
/*====================================
    deal-day clock js
====================================*/
    var deadline = new Date(Date.parse(new Date()) + 520 * 80 * 60 * 60 * 1000);
        initializeClock('clock1', deadline);
    var deadline = new Date(Date.parse(new Date()) + 620 * 80 * 60 * 60 * 1000);
        initializeClock('clock2', deadline);
    var deadline = new Date(Date.parse(new Date()) + 720 * 80 * 60 * 60 * 1000);
        initializeClock('clock3', deadline);
    var deadline = new Date(Date.parse(new Date()) + 420 * 80 * 60 * 60 * 1000);
        initializeClock('clock4', deadline);
function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 60));
    return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
}
function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    if(clock != null){
      var daysSpan = clock.querySelector('.days');
      var hoursSpan = clock.querySelector('.hours');
      var minutesSpan = clock.querySelector('.minutes');
      var secondsSpan = clock.querySelector('.seconds');

      function updateClock() {
        var t = getTimeRemaining(endtime);
        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }
}

    /*====================================
        home-1 home-slider js
    ====================================*/
    var swiper = new Swiper('.swiper#home-slider', {
        loop: false,
        rewind: true,
        slidesPerView: 1,
        spaceBetween: 0,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-homeslider',
            nextEl: '.swiper-next-homeslider'
        },
        pagination: {
            el: ".swiper-pagination-homeslider",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        }
    });

    /*====================================
        home-2/ home-3/ home-5 slider js
    ====================================*/
    $('#homeslider2, #homeslider3, #home-slider5' ).owlCarousel({
        loop: false,
        items: 1,
        nav: false,
        navText : ['<i class="feather-arrow-left"></i>','<i class="feather-arrow-right"></i>'],
        dots: true,
        responsive: {
        }
    });

    /*====================================
       home-1 product  js
    ====================================*/
    $('#category-slider').owlCarousel({
        loop: false,
        rewind: true,
        margin: 30,
        items: 4,
        nav: false,
        navText: ['<i class="bi bi-arrow-left-short"></i>','<i class="bi bi-arrow-right-short"></i>'],
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0 : {
                items: 1,
                margin: 12
            },
            479 : {
                items: 1,
                margin: 12
            },
            540 : {
                items: 2,
                margin: 12
            },
            640 : {
                items: 2,
                margin: 12
            },
            768 : {
                items: 2,
                margin: 30
            },
            979 : {
                items: 3,
                margin: 30
            },
            1199 : {
                items: 4,
                margin: 30
            },
            1399 : {
                items: 4,
                margin: 30
            }
        }
    });

    /*==============================
      home-2 category-slider js
    ==============================*/
    $('#category-slider').owlCarousel({
        loop: false,
        rewind: true,
        margin: 30,
        items: 4,
        nav: false,
        navText: ['<i class="bi bi-arrow-left-short"></i>','<i class="bi bi-arrow-right-short"></i>'],
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0 : {
                items: 1,
                margin: 12
            },
            479 : {
                items: 1,
                margin: 12
            },
            540 : {
                items: 2,
                margin: 12
            },
            640 : {
                items: 2,
                margin: 12
            },
            768 : {
                items: 2,
                margin: 30
            },
            979 : {
                items: 2,
                margin: 30
            },
            1199 : {
                items: 3,
                margin: 30
            },
            1399 : {
                items: 4,
                margin: 30
            }
        }
    });

    /*==============================
      home-3 category-slider js
    ==============================*/
    $('#category-slider3').owlCarousel({
        loop: false,
        rewind: true,
        margin: 30,
        items: 3,
        nav: false,
        navText: ['<i class="bi bi-arrow-left-short"></i>','<i class="bi bi-arrow-right-short"></i>'],
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0 : {
                items: 1,
                margin: 12
            },
            479 : {
                items: 1,
                margin: 12
            },
            540 : {
                items: 2,
                margin: 12
            },
            640 : {
                items: 2,
                margin: 12
            },
            768 : {
                items: 2,
                margin: 30
            },
            979 : {
                items: 2,
                margin: 30
            },
            1199 : {
                items: 3,
                margin: 30
            }
        }
    });

    /*==============================
        home-5 category-slider js
    ==============================*/
    var swiper = new Swiper('.swiper#category-slider5', {
        loop: false,
        rewind: true,
        slidesPerView: 3,
        grid: {
            rows: 1,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-cat6',
            nextEl: '.swiper-next-cat6'
        },
        pagination: {
            el: ".swiper-pagination-cat6",
            clickable: true
        },
        autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-1 new-product  js
    ====================================*/
    // new-product js
    var swiper = new Swiper('.swiper#new-product, .swiper#trending-product', {
        loop: false,
        rewind: true,
        slidesPerView: 4,
        grid: {
            rows: 1,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-new',
            nextEl: '.swiper-next-new'
        },
        pagination: {
            el: ".swiper-pagination-new",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView:4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-2 tab-product  js
    ====================================*/
    // new-product tab js
    var swiper = new Swiper('.swiper#new-product2', {
        loop: false,
        rewind: true,
        slidesPerView: 4,
        grid: {
            rows: 2,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-new2',
            nextEl: '.swiper-next-new2'
        },
        pagination: {
            el: ".swiper-pagination-new2",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    // best-product tab js
    var swiper = new Swiper('.swiper#best-product2', {
        loop: false,
        rewind: true,
        slidesPerView: 4,
        grid: {
            rows: 2,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-best2',
            nextEl: '.swiper-next-best2'
        },
        pagination: {
            el: ".swiper-pagination-best2",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
         breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    // feature-product tab js
    var swiper = new Swiper('.swiper#feature-product2', {
        loop: false,
        rewind: true,
        slidesPerView: 4,
        grid: {
            rows: 2,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-feature2',
            nextEl: '.swiper-next-feature2'
        },
        pagination: {
            el: ".swiper-pagination-feature2",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
         breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-3 new-product  js
    ====================================*/
    // new-product js
    var swiper = new Swiper('.swiper#new-product3', {
        loop: false,
        rewind: true,
        slidesPerView: 4,
        grid: {
            rows: 1,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-new3',
            nextEl: '.swiper-next-new3'
        },
        pagination: {
            el: ".swiper-pagination-new3",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-3 Fresh-product-tab  js
    ====================================*/
    // new-product tab js
    var swiper = new Swiper('.swiper#new-offer3', {
        loop: false,
        rewind: true,
        slidesPerView: 3,
        grid: {
            rows: 3,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-new-offer3',
            nextEl: '.swiper-next-new-offer3'
        },
        pagination: {
            el: ".swiper-pagination-new-offer3",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    // best-product tab js
    var swiper = new Swiper('.swiper#best-offer3', {
        loop: false,
        rewind: true,
        slidesPerView: 3,
        grid: {
            rows: 3,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-best-offer3',
            nextEl: '.swiper-next-best-offer3'
        },
        pagination: {
            el: ".swiper-pagination-best-offer3",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            320: {
                  slidesPerView: 1,
                  grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    // feature-product tab js
    var swiper = new Swiper('.swiper#feature-offer3', {
        loop: false,
        rewind: true,
        slidesPerView: 3,
        grid: {
            rows: 3,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-feature-offer3',
            nextEl: '.swiper-next-feature-offer3'
        },
        pagination: {
            el: ".swiper-pagination-feature-offer3",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
              slidesPerView: 1,
              grid: {
                rows: 3,
                fill: 'row' | 'column',
              },
              spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    // advance-offer tab js
    var swiper = new Swiper('.swiper#advance-offer3', {
        loop: false,
        rewind: true,
        slidesPerView: 3,
        grid: {
            rows: 3,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-advance-offer3',
            nextEl: '.swiper-next-advance-offer3'
        },
        pagination: {
            el: ".swiper-pagination-advance-offer3",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
              slidesPerView: 1,
              grid: {
                rows: 3,
                fill: 'row' | 'column',
              },
              spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 3,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-4 new-product  js
    ====================================*/
    // new-product js
    var swiper = new Swiper('.swiper#new-product4', {
        loop: false,
        rewind: true,
        slidesPerView: 4,
        grid: {
            rows: 1,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-new4',
            nextEl: '.swiper-next-new4'
        },
        pagination: {
            el: ".swiper-pagination-new4",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView:4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-5 new-product  js
    ====================================*/
    // new-product js
    var swiper = new Swiper('.swiper#new-product5', {
        loop: false,
        rewind: true,
        slidesPerView: 4,
        grid: {
            rows: 2,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-new5',
            nextEl: '.swiper-next-new5'
        },
        pagination: {
            el: ".swiper-pagination-new5",
            clickable: true
        },
        autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView:4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-4 service-slider  js
    ====================================*/
    // new-product js
    var swiper = new Swiper('.swiper#service-slider4', {
        loop: false,
        rewind: true,
        slidesPerView: 3,
        grid: {
            rows: 1,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-service4',
            nextEl: '.swiper-next-service4'
        },
        pagination: {
            el: ".swiper-pagination-service4",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1399: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    /*==============================
        home-1 testimonial-slider js
    ==============================*/
    $('#testimonial-slider').slick({
        dots: false,
        arrows: false,
        vertical: true,
        slidesToShow: 3,
        centerPadding: '0px',
        slidesToScroll: 1,
        centerMode: true,
        verticalSwiping: true,
        responsive: [
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                centerMode: false,
                vertical: false,
                autoplay: true,
                speed: 1000,
                autoplaySpeed: 1000
              }
            }
        ]
    });

    /*====================================
       home-2 test-slider
    ====================================*/
    var swiper = new Swiper('.swiper#test-slider2', {
        loop: false,
        rewind: true,
        slidesPerView: 1,
        spaceBetween: 0,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-test',
            nextEl: '.swiper-next-test'
        },
        pagination: {
            el: ".swiper-pagination-test",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        }
    });

    /*==================================
        home-3 testimonial js
    ====================================*/
    var swiper = new Swiper('.swiper#testi-slider3', {
        loop: false,
        rewind: true,
        slidesPerView: 2,
        grid: {
            rows: 1,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-testi3',
            nextEl: '.swiper-next-testi3'
        },
        pagination: {
            el: ".swiper-pagination-testi3",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    function setSlideVisibility() {
        var visibleSlides = $('.slick-slide[aria-hidden="false"]');
        $(visibleSlides).each(function() {
            $(this).css('opacity', 1);
        });
        $(visibleSlides).first().prev().css('opacity', 0);
        $(visibleSlides).last().next().css('opacity', 0);
        $('.slick-active').removeClass( "highlight" );
        $('.slick-active').last().addClass( "highlight" );
    }

    $(setSlideVisibility());
    $('.slider').on('beforeChange', function() {
      $('.slick-slide').each(function() {
        $(this).css('opacity', 1);
      });
    });
    $('.slider-for').on('afterChange', function() {
      setSlideVisibility();
    });

    /*====================================
       home-4 test-slider
    ====================================*/
    var swiper = new Swiper('.swiper#test-slider4', {
        loop: false,
        rewind: true,
        slidesPerView: 2,
        spaceBetween: 0,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-test4',
            nextEl: '.swiper-next-test4'
        },
        pagination: {
            el: ".swiper-pagination-test4",
            clickable: true
        },
        autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column'
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-5 test-slider
    ====================================*/
    var swiper = new Swiper('.swiper#test-slider5', {
        slidesPerView: 3,
        grid: {
            rows: 1,
            fill: 'row' | 'column',
        },
        pagination: {
            el: ".swiper-pagination-",
            clickable: true
        },
        spaceBetween: 30,
            loop: true,
            observer: true,
            observeParents: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: '.swiper-next-test6',
                prevEl: '.swiper-prev-test6',
        },
        pagination: {
            el: ".swiper-pagination-test6",
            clickable: true
        },
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 250,
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
        home-1 blog-template js
    ====================================*/
    var swiper = new Swiper('.swiper#home1-blog', {
        slidesPerView: 3,
        grid: {
            rows: 1,
            fill: 'row' | 'column',
        },
        pagination: {
            el: ".swiper-pagination-blog1",
            clickable: true
        },
        spaceBetween: 30,
            loop: true,
            observer: true,
            observeParents: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: '.swiper-next-blog1',
                prevEl: '.swiper-prev-blog1',
        },
        pagination: {
            el: ".swiper-pagination-blog1",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 1,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 1,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 1,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 2,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            768: {
                slidesPerView: 2,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                grid: {
                  rows: 1,
                  fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    /*====================================
       home-2 blog js
    ====================================*/
    $('#blog-slider2').owlCarousel({
        loop: false,
        items: 3,
        margin: 30,
        nav: false,
        navText : ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
        dots: false,
        responsive: {
            0 : {
                items: 1,
                margin: 12
            },
            479 : {
                items: 1,
                margin: 12
            },
            540 : {
                items: 1,
                margin: 12
            },
            640 : {
                items: 2,
                margin: 12
            },
            768 : {
                items: 2,
                margin: 30
            },
            979 : {
                items: 2,
                margin: 30
            },
            1199 : {
                items: 3,
                margin: 30
            }
        }
    });

    /*====================================
       home-3 blog js
    ====================================*/
    $('#blog-slider3').owlCarousel({
        loop: false,
        items: 4,
        margin: 30,
        nav: false,
        navText : ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
        dots: false,
        responsive: {
            0 : {
                items: 1,
                margin: 12
            },
            479 : {
                items: 1,
                margin: 12
            },
            540 : {
                items: 2,
                margin: 12
            },
            640 : {
                items: 2,
                margin: 12
            },
            768 : {
                items: 2,
                margin: 30
            },
            979 : {
                items: 2,
                margin: 30
            },
            1199 : {
                items: 3,
                margin: 30
            },
            1499 : {
                items: 4,
                margin: 30
            }
        }
    });

    /*====================================
       home-4 insta-slider
    ====================================*/
    var swiper = new Swiper('.swiper#insta-slider4', {
        loop: false,
        rewind: true,
        slidesPerView: 6,
        grid: {
            rows: 1,
            fill: 'row' | 'column'
        },
        spaceBetween: 30,
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        navigation: {
            prevEl: '.swiper-prev-insta4',
            nextEl: '.swiper-next-insta4'
        },
        pagination: {
            el: ".swiper-pagination-insta4",
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            320: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            360: {
                slidesPerView: 2,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            540: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 12
            },
            640: {
                slidesPerView: 3,
                grid: {
                rows: 1,
                fill: 'row' | 'column',
              },
              spaceBetween: 12
            },
            768: {
                slidesPerView: 3,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 4,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 5,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            },
            1499: {
                slidesPerView: 6,
                grid: {
                    rows: 1,
                    fill: 'row' | 'column',
                },
                spaceBetween: 30
            }
        }
    });

    /*==============================
        home-5 instagram-slider js
    ==============================*/
    $('#instagram-slider5').owlCarousel({
        loop: false,
        items: 6,
        margin: 30,
        rewind: true,
        nav: false,
        dots: false,
        navText: ['<i class="bi bi-arrow-left-short"></i>','<i class="bi bi-arrow-right-short"></i>'],autoplay: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0 : {
                items: 2,
                margin: 12
            },
            479 : {
                items: 2,
                margin: 12
            },
            540 : {
                items: 3,
                margin: 12
            },
            640 : {
                items: 3,
                margin: 12
            },
            768 : {
                items: 3,
                margin: 30
            },
            979 : {
                items: 4,
                margin: 30
            },
            1199 : {
                items: 5,
                margin: 30
            },
            1399 : {
                items: 6,
                margin: 30
            }
        }
    });

    /*====================================
        home-5 brand-logo js
    ====================================*/
    $('#brand-logo5').owlCarousel({
        loop: true,
        items: 5,
        margin: 30,
        nav: false,
        navText : ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
        dots: false,
        responsive: {
            0 : {
                items: 2,
                margin: 12
            },
            479 : {
                items: 2,
                margin: 12
            },
            540 : {
                items: 3,
                margin: 12
            },
            640 : {
                items: 3,
                margin: 12
            },
            768 : {
                items: 3,
                margin: 30
            },
            979 : {
                items: 4,
                margin: 30
            },
            1199 : {
                items: 5,
                margin: 30
            }
        }
    });

    /*====================================
        product-style-1 js
    ====================================*/
    $('.slider-big').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        asNavFor: '.slider-small',
        adaptiveHeight: true,
    });
    $('.slider-small').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="bi bi-chevron-right"></i></button>',
        dots: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        asNavFor: '.slider-big',
            responsive: [{
              breakpoint: 480,
              settings: {
                slidesToShow: 3
            }
        }]
    });

    /*====================================
        product-style-2 js
    ====================================*/
    $('.style2-slider-big').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        asNavFor: '.style2-slider-small',
        adaptiveHeight: true,
    });
    $('.style2-slider-small').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="bi bi-chevron-right"></i></button>',
        dots: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        asNavFor: '.style2-slider-big',
        vertical: true,
        verticalSwiping: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                  vertical: false,
                  verticalSwiping: false
                }
            }
        ]
    });

    /*====================================
        product-style-3 js
    ====================================*/
    $('.style3-slider-small').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slick-prev"><i class="bi bi-arrow-left-short"></i></button>',
        nextArrow: '<button class="slick-next"><i class="bi bi-arrow-right-short"></i></button>',
        dots: false,
        centerMode: true,
        centerPadding: 'calc(33.33% - 30px)',
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    arrows: false,
                    dots: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    dots: true,
                    centerMode: true,
                    centerPadding: '0px',
                }
            }
        ]
    });

    /*====================================
        product-style-4 js
    ====================================*/
    $('.style4-slider-big').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        asNavFor: '.style4-slider-small',
        adaptiveHeight: true,
    });
    $('.style4-slider-small').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="bi bi-chevron-right"></i></button>',
        dots: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        asNavFor: '.style4-slider-big',
        vertical: true,
        verticalSwiping: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                  vertical: false,
                  verticalSwiping: false
                }
            }
        ]
    });

    /*====================================
        product-style-5 js
    ====================================*/
    $('.style5-slider-small').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        prevArrow: '<button class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="bi bi-chevron-right"></i></button>',
        dots: true,
        focusOnSelect: true,
    });

    /*====================================
        product-style-6 js
    ====================================*/
    $('.slider-big-6').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        asNavFor: '.slider-small-6',
        adaptiveHeight: true,
    });
    $('.slider-small-6').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="bi bi-chevron-right"></i></button>',
        dots: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        asNavFor: '.slider-big-6',
        responsive: [{
            breakpoint: 480,
            settings: {
                slidesToShow: 3
            }
        }]
    });

    /*====================================
        product-style-7 js
    ====================================*/
    $('.slider-big-7').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        asNavFor: '.slider-small-7',
        adaptiveHeight: true,
    });
    $('.slider-small-7').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        prevArrow: '<button class="slick-prev"><i class="bi bi-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="bi bi-chevron-right"></i></button>',
        dots: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        asNavFor: '.slider-big-7',
            responsive: [{
            breakpoint: 480,
                settings: {
                slidesToShow: 3
            }
        }]
    });



