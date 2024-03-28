jQuery(document).ready(function () {

    // Function to initialize GSAP animations
    function gsapInit() {
        // Clear any existing GSAP animations
        gsap.timeline().clear();

        // beginning animation start
        // GSAP animations for section 1
        let t11 = gsap.timeline({
            scrollTrigger: {
                trigger: ".beginning .sec_1",
                start: "top top",
                end: '110% center',
                markers: false,
                scrub: 1
            }
        });

        t11.addLabel("start")
            .to(".beginning .sec_1 .img_area_wrap", { scale: 0 })
            .to(".beginning .sec_1 .text_wrap", { x: innerWidth * -1 });

        // GSAP animations for section 2
        let t12 = gsap.timeline({
            scrollTrigger: {
                trigger: ".beginning .sec_2",
                start: "top center",
                end: '50% center',
                markers: false,
                scrub: 1
            }
        });

        t12.addLabel("start")
            .from(".beginning .sec_2 .img_area_wrap", { x: innerWidth * 1, rotate: 360 })
            .from(".beginning .sec_2 .text_wrap", { x: innerWidth * -1 });

        // GSAP animations for section 3
        let t13 = gsap.timeline({
            scrollTrigger: {
                trigger: ".beginning .sec_3",
                start: "top center",
                end: "center center",
                markers: false,
                scrub: 1
            }
        });

        t13.addLabel("start")
            .from(".beginning .sec_3 .img_area_wrap", { x: innerWidth * 1, rotate: 360 })
            .from(".beginning .sec_3 .text_wrap", { x: innerWidth * -1 });
        // beginning animation end




        // journey animation start
        // GSAP animations for section 1
        let t21 = gsap.timeline({
            scrollTrigger: {
                trigger: ".journey .sec_1",
                start: "top top",
                end: '110% center',
                markers: false,
                scrub: 1
            }
        });

        t21.addLabel("start")
            .to(".journey .sec_1 .img_area_wrap", { scale: 0 })
            .to(".journey .sec_1 .text_wrap", { x: innerWidth * -1 });

        // GSAP animations for section 2
        let t22 = gsap.timeline({
            scrollTrigger: {
                trigger: ".journey .sec_2",
                start: "top center",
                end: '50% center',
                markers: false,
                scrub: 1
            }
        });

        t22.addLabel("start")
            .from(".journey .sec_2 .img_area_wrap", { x: innerWidth * 1, rotate: 360 })
            .from(".journey .sec_2 .text_wrap", { x: innerWidth * -1 });

        // GSAP animations for section 3
        let t23 = gsap.timeline({
            scrollTrigger: {
                trigger: ".journey .sec_3",
                start: "top center",
                end: "center center",
                markers: false,
                scrub: 1
            }
        });

        t23.addLabel("start")
            .from(".journey .sec_3 .img_area_wrap", { x: innerWidth * 1, rotate: 360 })
            .from(".journey .sec_3 .text_wrap", { x: innerWidth * -1 });
        // journey animation end




        // looking_ahead animation start
        // GSAP animations for section 1
        let t31 = gsap.timeline({
            scrollTrigger: {
                trigger: ".looking_ahead .sec_1",
                start: "top top",
                end: '110% center',
                markers: false,
                scrub: 1
            }
        });

        t31.addLabel("start")
            .to(".looking_ahead .sec_1 .img_area_wrap", { scale: 0 })
            .to(".looking_ahead .sec_1 .text_wrap", { x: innerWidth * -1 });

        // GSAP animations for section 2
        let t32 = gsap.timeline({
            scrollTrigger: {
                trigger: ".looking_ahead .sec_2",
                start: "top center",
                end: '50% center',
                markers: false,
                scrub: 1
            }
        });

        t32.addLabel("start")
            .from(".looking_ahead .sec_2 .img_area_wrap", { x: innerWidth * 1, rotate: 360 })
            .from(".looking_ahead .sec_2 .text_wrap", { x: innerWidth * -1 });

        // GSAP animations for section 3
        let t33 = gsap.timeline({
            scrollTrigger: {
                trigger: ".looking_ahead .sec_3",
                start: "top center",
                end: "center center",
                markers: false,
                scrub: 1
            }
        });

        t33.addLabel("start")
            .from(".looking_ahead .sec_3 .img_area_wrap", { x: innerWidth * 1, rotate: 360 })
            .from(".looking_ahead .sec_3 .text_wrap", { x: innerWidth * -1 });
        // looking_ahead animation end
    }


    // Function to disable GSAP animations for mobile
    function disableGsapForMobile() {
        // Disable GSAP animations code here
        gsap.globalTimeline.clear(); // Yeh saare GSAP animations ko band kar dega
    }

    // Check if the device is mobile and disable GSAP animations accordingly
    function checkDeviceAndInit() {
        // Check if the device width is less than 768 pixels (considering it as a mobile device)
        if (window.matchMedia("(max-width: 992px)").matches) {
            disableGsapForMobile(); // Disable GSAP animations for mobile
        } else {
            gsapInit(); // Initialize GSAP animations for non-mobile devices
        }
    }
    // Call the function on page load
    checkDeviceAndInit();

    // Call the function again if the window is resized
    window.addEventListener('resize', checkDeviceAndInit);

    // Event listener for tab button clicks
    jQuery(".tab_head_tm .tab_buttons_tm button").click(function (e) {
        e.preventDefault();
        jQuery(".tab_head_tm .tab_buttons_tm button").removeClass("active");
        jQuery(this).addClass("active");
        let currBtn = jQuery(this).attr("data-btn");
        jQuery(".sections_area_wrap .sections_wrap").removeClass("active");
        jQuery(".sections_area_wrap .sections_wrap." + currBtn).addClass("active");
        gsap.timeline().clear();
        gsap.globalTimeline.clear(); // Clear all GSAP animations
        // Reinitialize GSAP animations after tab change
        checkDeviceAndInit();
    });

});
