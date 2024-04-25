jQuery(document).ready(function () {
    jQuery('.ap-team-section.type-three .ap-col-grid').slick({
        dots: false,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-arrow slick-prev"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-arrow slick-next"><i class="fa fa-chevron-right"></i></button>',
    });

    jQuery('.ap-testimonial-section.type-one .testimonial-wrap').slick({
        dots: false,
        prevArrow: '<button type="button" class="slick-arrow slick-prev"><i class="fa fa-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-arrow slick-next"><i class="fa fa-arrow-right"></i></button>',
    });

    jQuery('.ap-testimonial-section.type-two .testimonial-wrap').slick({
        dots: true,
        arrows: false,
        adaptiveHeight: true,
    });

    jQuery('.ap-testimonial-section.type-three .testimonial-wrap').slick({
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    jQuery('.portfolio-single-page .feat-img-box .img-full').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.portfolio-single-page .feat-img-box .img-thumb'
    });

    jQuery('.portfolio-single-page .feat-img-box .img-thumb').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.portfolio-single-page .feat-img-box .img-full',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
    });

    jQuery('.site-header .search-form-wrap .search-trigger').on('click', function () {
        jQuery(this).toggleClass('open');
        // jQuery('.site-header .search-form-wrap .search-trigger i').toggleClass('fa-solid fa-xmark');
        jQuery('.site-header .search-form-wrap .form-modal').toggle();
    })

    jQuery('.site-header .search-form-wrap .search-trigger.open, .search-form-wrap .form-modal .content .fa-times').on('click', function () {
        jQuery('.search-form-wrap .form-modal').hide();
    });

    jQuery('.filter-tab-title-wrap ul li.tab').on('click', function () {
        jQuery('.filter-tab-title-wrap ul li.tab').removeClass('active');
        jQuery(this).addClass('active');
    })

    // HEADER STICKY
    function homeImprovementHeaderSticky() {
        var windowTop = jQuery(window).scrollTop();
        var siteHeader = jQuery('.site-header.header-sticky');
        var mainNav = jQuery('.header-bottom.menu-on-banner');
        var mainNavTop = jQuery('.site-header.header-sticky').offset().top + 300;
        if (windowTop > mainNavTop) {
            siteHeader.css('margin-bottom', '65px'); //margin added to avoid glitch when the nav goes sticky
            siteHeader.addClass('home-improvement-fixed');
        } else {
            siteHeader.css('margin-bottom', '0');
            siteHeader.removeClass('home-improvement-fixed');
        }
    }

    jQuery(function () {
        jQuery(window).scroll(homeImprovementHeaderSticky);
        homeImprovementHeaderSticky();
    });


    // GOTO TOP BUTTON
    if (jQuery('#go-to-top').length) {
        var scrollTrigger = jQuery('body').position();
        goToTop = function () {
            var scrollTop = jQuery(window).scrollTop();
            if (scrollTop > 150) {
                jQuery('#go-to-top').addClass('show');
            } else {
                jQuery('#go-to-top').removeClass('show');
            }
        };
        goToTop();
        jQuery(window).on('scroll', function () {
            goToTop();
        });
        jQuery('#go-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: scrollTrigger.top
            }, 700);
        });
    }
})