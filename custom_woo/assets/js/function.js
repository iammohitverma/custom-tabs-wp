
jQuery(document).ready(function () {
    jQuery("header .toggle-menu").click(function () {
        jQuery(this).toggleClass("active");
        jQuery("header").toggleClass("active");
        jQuery("header .navigationWrap.mobile").slideToggle();
    });
    jQuery("header .subMenuAngle").click(function () {
        jQuery(this).toggleClass("active");
        jQuery(this).closest(".a-Wrap").next(".sub-menu").slideToggle();
    });

    jQuery('.home_product_slider').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: true,

        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    // You can also pass an optional settings object
    // below listed default settings
    AOS.init({
        // Global settings:
        disable: "phone", // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: true, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 2000, // values from 0 to 3000, with step 50ms
        easing: 'ease-out-back', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });

    jQuery(".custom_video .play").click(function () {
        jQuery(this).hide();
        let videoContainer = jQuery(this).closest(".custom_video");
        let currVideo = jQuery(videoContainer).find("video");
        let currThumb = jQuery(videoContainer).find(".thumb");
        jQuery(videoContainer).addClass("playing");
        jQuery(videoContainer).removeClass("paused");
        jQuery(currVideo).show();
        jQuery(currThumb).hide();
        jQuery(currVideo).get(0).play();
    });

    jQuery(".custom_video .pause").click(function () {
        jQuery(this).hide();
        let videoContainer = jQuery(this).closest(".custom_video");
        let currVideo = jQuery(videoContainer).find("video");
        jQuery(videoContainer).addClass("paused");
        jQuery(videoContainer).removeClass("playing");
        jQuery(currVideo).get(0).pause();
    });

    jQuery(".add_to_cart .qty_wrap .qty_controls .increment").click(function () {
        let cartContainer = jQuery(this).closest(".add_to_cart");
        let currInput = jQuery(cartContainer).find("input");
        let currInputVal = jQuery(currInput).val();
        if (currInputVal == "") {
            jQuery(currInput).val(1);
        } else {
            currInputVal++;
            jQuery(currInput).val(currInputVal);
        }
        let curtBtn = jQuery(cartContainer).find(".cart_btn");
        jQuery(curtBtn).attr("data-quantity", currInputVal);
    });
    jQuery(".add_to_cart .qty_wrap .qty_controls .decrement").click(function () {
        let cartContainer = jQuery(this).closest(".add_to_cart");
        let currInput = jQuery(cartContainer).find("input");
        let currInputVal = jQuery(currInput).val();
        if (currInputVal > 1) {
            currInputVal--;
            jQuery(currInput).val(currInputVal);
        }
        let curtBtn = jQuery(cartContainer).find(".cart_btn");
        jQuery(curtBtn).attr("data-quantity", currInputVal);
    });
    jQuery(".add_to_cart .qty_wrap input").change(function () {
        let currInputVal = jQuery(this).val();
        let cartContainer = jQuery(this).closest(".add_to_cart");
        let curtBtn = jQuery(cartContainer).find(".cart_btn");
        jQuery(curtBtn).attr("data-quantity", currInputVal);
        let woocommerceQtyField = jQuery(this).closest(".quantity .qty");
        if (woocommerceQtyField) {
            jQuery(woocommerceQtyField).val(currInputVal);
        }
    });



    jQuery('.product_single_image_slider .woocommerce-product-gallery__wrapper').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product_thumb_image_slider .woocommerce-product-gallery__wrapper',
        loop: true,
    });
    jQuery('.product_thumb_image_slider .woocommerce-product-gallery__wrapper').slick({
        loop: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.product_single_image_slider .woocommerce-product-gallery__wrapper',
        dots: true,
        centerMode: false,
        focusOnSelect: true,
    });
});

