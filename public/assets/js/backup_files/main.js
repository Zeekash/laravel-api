jQuery(
    (function ($) {
        "use strict";

        // Header Sticky
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 120) {
                $(".navbar-area").addClass("is-sticky");
            } else {
                $(".navbar-area").removeClass("is-sticky");
            }
        });

        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 650) {
                $(".sticky-form").addClass("is-sticky-form bg-white");
                $(".ui-widget.ui-widget-content").addClass("position-fixed");
                // .removeClass(
                //     "position-sticky top-0 start-0 bottom-0 end-0"
                // );
            } else {
                $(".sticky-form").removeClass("is-sticky-form bg-white");
                $(".ui-widget.ui-widget-content").removeClass("position-fixed");
                // .addClass("position-sticky top-0 start-0 bottom-0 end-0");
            }
        });

        // Mean Menu
        jQuery(".mean-menu").meanmenu({
            meanScreenWidth: "1199",
        });

        // Search Popup JS
        $(".close-btn").on("click", function () {
            $(".search-overlay").fadeOut();
            $(".search-btn").show();
            $(".close-btn").removeClass("active");
        });
        $(".search-btn").on("click", function () {
            $(this).hide();
            $(".search-overlay").fadeIn();
            $(".close-btn").addClass("active");
        });

        // Others Option For Responsive JS
        $(".others-option-for-responsive .dot-menu").on("click", function () {
            $(
                ".others-option-for-responsive .container .container"
            ).toggleClass("active");
        });

        // Home Slides
        $(".home-slides").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplayHoverPause: true,
            items: 1,
            smartSpeed: 100,
            autoplay: false,
            navText: [
                "<i class='flaticon-left-arrow'></i>",
                "<i class='flaticon-right-arrow'></i>",
            ],
        });

        $(".home-slides").on("translate.owl.carousel", function () {
            $(".main-slider-content h1")
                .removeClass("animate__animated animate__fadeInUp")
                .css("opacity", "0");
            $(".main-slider-content span")
                .removeClass("animate__animated animate__fadeInUp")
                .css("opacity", "0");
            $(".main-slider-content a")
                .removeClass("animate__animated animate__fadeInUp")
                .css("opacity", "0");
        });
        $(".home-slides").on("translated.owl.carousel", function () {
            $(".main-slider-content h1")
                .addClass("animate__animated animate__fadeInUp")
                .css("opacity", "1");
            $(".main-slider-content span")
                .addClass("animate__animated animate__fadeInUp")
                .css("opacity", "1");
            $(".main-slider-content a")
                .addClass("animate__animated animate__fadeInUp")
                .css("opacity", "1");
        });

        // Odometer JS
        $(".odometer").appear(function (e) {
            var odo = $(".odometer");
            odo.each(function () {
                var countNumber = $(this).attr("data-count");
                $(this).html(countNumber);
            });
        });

        // Date Picker JS
        $("#datetimepicker").datepicker({
            weekStart: 0,
            todayBtn: "linked",
            language: "es",
            orientation: "bottom auto",
            keyboardNavigation: false,
            autoclose: true,
        });

        // Popup Image
        $('a[data-imagelightbox="popup-btn"]').imageLightbox({
            activity: true,
            overlay: true,
            button: true,
            arrows: true,
        });

        // FAQ Accordion
        $(function () {
            $(".accordion")
                .find(".accordion-title")
                .on("click", function () {
                    // Adds Active Class
                    $(this).toggleClass("active");
                    // Expand or Collapse This Panel
                    $(this).next().slideToggle("fast");
                    // Hide The Other Panels
                    $(".accordion-content").not($(this).next()).slideUp("fast");
                    // Removes Active Class From Other Titles
                    $(".accordion-title").not($(this)).removeClass("active");
                });
        });

        // Go to Top
        $(function () {
            // Scroll Event
            $(window).on("scroll", function () {
                var scrolled = $(window).scrollTop();
                if (scrolled > 600) $(".go-top").addClass("active");
                if (scrolled < 600) $(".go-top").removeClass("active");
            });
            // Click Event
            $(".go-top").on("click", function () {
                $("html, body").animate({ scrollTop: "0" }, 500);
            });
        });

        $(window).on("load", function () {
            if ($(".wow").length) {
                var wow = new WOW({
                    boxClass: "wow", // animate__animated animate__element css class (default is wow)
                    animateClass: "animated", // animation css class (default is animated)
                    offset: 20, // distance to the element when triggering the animation (default is 0)
                    mobile: true, // trigger animations on mobile devices (default is true)
                    live: true, // act on asynchronously loaded content (default is true)
                });
                wow.init();
            }
        });
    })(jQuery)
);
