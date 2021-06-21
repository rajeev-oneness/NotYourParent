jQuery(function ($) {
    // Menu
    $(".menu_btn").click(function () {
        $(".main_navigation").addClass("main_navigation_open");
        $(".menu_overlay").addClass("menu_overlay_open");
    });
    $(".menu_overlay").click(function () {
        $(".main_navigation").removeClass("main_navigation_open");
        $(this).removeClass("menu_overlay_open");
    });

    //  Tab Script
    $(".tab_content").hide();
    $(".tab_content:first").show();
    $(".tabs_menu li:first").addClass("current");

    $(".tabs_menu li a").click(function (event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");

        var homeTab = $(this).attr("href");
        $(".tab_content").not(homeTab).hide();
        jQuery(homeTab).fadeIn();
    });

    // Mentor
    $(".mentors_slider").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        navText: [
            "<img src='ifront/mages/blue-arrow-left.png'>",
            "<img src='front/images/blue-arrow-right.png'>",
        ],
        responsiveClass: true,
        items: 3,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1000: {
                items: 3,
            },
        },
    });
    // Testimonials
    $(".testimonials_slider").owlCarousel({
        loop: true,
        margin: 40,
        nav: true,
        dots: false,
        navText: [
            "<img src='ifront/mages/blue-arrow-left.png'>",
            "<img src='front/images/blue-arrow-right.png'>",
        ],
        responsiveClass: true,
        items: 2,
        responsive: {
            0: {
                items: 1,
            },
            1000: {
                items: 2,
            },
        },
    });

    // Reviews
    $(".review_slider").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        navText: [
            "<img src='ifront/mages/blue-arrow-left.png'>",
            "<img src='front/images/blue-arrow-right.png'>",
        ],
        items: 1,
    });

    // Cutom Accrodian
    $(".accordian_details").hide();
    $(".accordian_details:first").show();
    $(".accordian_heading:first").addClass("active");
    $(".accordian_heading").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $(".accordian_heading").removeClass("active");
            $(this).addClass("active");
        }
        $(this).next().slideToggle();
        $(".accordian_details").not($(this).next()).slideUp();
    });

    //
    // $(window).scroll(function(){
    //     if ($(window).scrollTop() >= 300) {
    //         $('nav').addClass('fixed-header');
    //     }
    //     else if($(window).scrollTop() == 0) {
    //         $('nav').removeClass('fixed-header');
    //     }
    // });

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 400) {
            $("header").addClass("fixed-header");
        } else {
            $("header").removeClass("fixed-header");
        }
    });
});
