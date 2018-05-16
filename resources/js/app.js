(function ($) {
    'use strict';

    var lang = $('html:first').attr('lang');

    var lastScrollTop = 0;

    var $body = $('body'),
        $header = $('#header'),
        $mainNavigation = $('.main-navigation'),
        $map = $('#leaflet-map'),
        $main = $('#main');


    $(document).ready(function (e) {
        $(document).foundation();

        cookieBar.showCookieBar(lang, 'http://google.de');

        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            fade: true,
            arrows: false,
            dots: true
        });

        // Menu
        $('.hamburger').on('click', function () {
            $(this).toggleClass('expanded');
            $mainNavigation.slideToggle();
        });
    });


    $(window).on('scroll', function () {
        var scrollTop = $(this).scrollTop();
        if (Foundation.MediaQuery.atLeast('medium')) {
            if (scrollTop > 0) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
            lastScrollTop = scrollTop;
        }
    });

    $(window).on('resize', function () {
        $mainNavigation.removeAttr('style');
        $('.hamburger').removeClass('expanded');
    });

    $(window).on('load', function (e) {
        $body.removeClass('loading');
        $body.addClass('loaded');
        if ($map.length !== 0) {
            Map.initMap();
        }
    });

})(jQuery);
