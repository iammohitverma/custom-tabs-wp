jQuery(document).ready(function () {

    // below listed default settings
    AOS.init({
        // Global settings:
        disable: ['phone'], // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 0, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1500, // values from 0 to 3000, with step 50ms
        easing: 'ease-in-out-back', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });

    // Add active to menu when section in viewport
    $(window).on('scroll', function () {
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        var viewportMid = (viewportTop + viewportBottom) / 2;

        $('.sections_wrap').each(function () {
            var sectionId = $(this).attr('id');
            var correspondingLink = $('a[data-btn="' + sectionId + '"]');

            var sections = $(this).find('section');
            var sectionInViewport = null;

            sections.each(function () {
                var sectionTop = $(this).offset().top;
                var sectionBottom = sectionTop + $(this).outerHeight();

                if (sectionTop <= viewportMid && sectionBottom >= viewportMid) {
                    sectionInViewport = $(this);
                    return false; // Exit the loop if a section is found
                }
            });

            if (sectionInViewport) {
                $(this).addClass('active');
                correspondingLink.addClass('active');
            } else {
                $(this).removeClass('active');
                correspondingLink.removeClass('active');
            }
        });
    });

    // Event listener for tab button clicks
    jQuery(".tab_head_tm .tab_buttons_tm a").click(function (e) {
        jQuery(".tab_head_tm .tab_buttons_tm a").removeClass("active");
        jQuery(this).addClass("active");
        let currBtn = jQuery(this).attr("data-btn");
        jQuery(".sections_area_wrap .sections_wrap").removeClass("active");
        jQuery(".sections_area_wrap .sections_wrap." + currBtn).addClass("active");
    });

});
