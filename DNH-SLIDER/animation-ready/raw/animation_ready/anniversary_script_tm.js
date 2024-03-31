
jQuery(document).ready(function () {
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

    jQuery('.start_again').on('click', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    var tabHeadHeight = jQuery('.tab_head_tm').outerHeight();
    jQuery('body').css('--tabHeadHeight', tabHeadHeight + 'px');



    // Preloader script
    let tl = gsap.timeline();
    function loadingTime() {
        let per = 0;
        let percentWrap = document.querySelector("#preloader h4");
        let intervalId = setInterval(() => {
            let x = Math.floor(Math.random() * 10) + 10;
            per = per + x;
            if (per < 100) {
                percentWrap.innerHTML = parseInt(per) + "%";
            } else {
                per = 100;
                percentWrap.innerHTML = parseInt(per) + "%";
                clearInterval(intervalId);
            }
        }, 200);
    }

    // Call loadingTime() function when the page is fully loaded
    tl.to("#preloader h4", {
        onStart: loadingTime()
    })
    tl.to("#preloader", {
        transform: "translateY(-100%)",
        duration: 1.5,
        delay: 1.5,
    })


    // Bg animate by anime js
    for (let i = 0; i < 50; i++) {
        const animDiv = document.createElement("div");
        animDiv.classList.add("animBox");
        document.querySelector(".bg_anim").appendChild(animDiv);
    }

    function randomValues() {
        anime({
            targets: '.animBox',
            translateX: function () {
                return anime.random(-700, 700);
            },
            translateY: function () {
                return anime.random(-500, 500);
            },
            scale: function () {
                return anime.random(1, 2);
            },
            // easing: 'linear',
            // easing: 'easeInOutQuad',
            easing: 'easeInOutBack',
            duration: 3000,
            delay: anime.stagger(10),
            complete: randomValues
        });
    }

    setTimeout(() => {
        randomValues();
    }, 1000);


    /********************************************************/
    /********************************************************/
    /********************************************************/
    // GSAP start
    /********************************************************/
    /********************************************************/
    /********************************************************/


    // for tab buttons start
    gsap.from(".tab_head_tm .tab_buttons_tm", {
        y: -200,
        duration: 0.5,
        delay: 3.5,
    });

    // for tab buttons end



    // for beginning start
    // beginningTlOnLoad start
    var beginningTlOnLoad = gsap.timeline();
    beginningTlOnLoad.from("#beginning .sec_1 .text_wrap", {
        scale: 0,
        duration: 1,
        delay: 4
    })
        .from("#beginning .sec_1 .text_wrap h3", {
            x: -100,
            opacity: 0,
            duration: 0.5,
        })
        .from("#beginning .sec_1 .text_wrap div", {
            y: 100,
            opacity: 0,
            duration: 0.5,
        })
        .from("#beginning .sec_1 .img_area_wrap img", {
            x: 100,
            scale: 0,
            // opacity: 0,
            rotate: 90,
            duration: 1.5,
            stagger: 0.5
        })
    // beginningTlOnLoad end

    // beginningTl1 sec - 1
    var beginningTl1 = gsap.timeline();
    beginningTl1.to("#beginning .sec_1 .text_wrap", {
        opacity: 0,
        duration: 1,
        scrollTrigger: {
            trigger: "#beginning .sec_1 .text_wrap",
            markers: false,
            pin: '#beginning .sec_1',
            pinSpacing: true,
            start: "top 50%",
            scrub: 2,
        },
    })
        .to("#beginning .sec_1 .img_area_wrap img", {
            opacity: 0,
            duration: 0.5,
            stagger: 0.25,
            delay: 0.25,
            scrollTrigger: {
                trigger: "#beginning .sec_1 img",
                markers: false,
                start: "top 20%",
                scrub: 3,
            },
        })


    // beginningTl2 sec - 2
    var beginningTl2 = gsap.timeline();
    beginningTl2.from("#beginning .sec_2 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#beginning .sec_2 .text_wrap",
            markers: false,
            pin: '#beginning .sec_2',
            pinSpacing: true,
            start: "top 50%",
            scrub: 2,
        },
    })
        .from("#beginning .sec_2 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 0.5,
            stagger: 0.5,
            scrollTrigger: {
                trigger: "#beginning .sec_2 p",
                markers: false,
                start: "top 70%",
                end: "top 40%",
                scrub: 2,
            },
        })
        .from("#beginning .sec_2 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: 90,
            duration: 1.5,
            stagger: 0.5,
            scrollTrigger: {
                trigger: "#beginning .sec_2 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })



    /********************/
    // for beginning end
    /********************/




    /********************/
    // for journey start
    /********************/

    // journeyTl1 sec - 1
    var journeyTl1 = gsap.timeline();
    journeyTl1.from("#journey .sec_1 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#journey .sec_1 .text_wrap",
            markers: false,
            pin: '#journey .sec_1',
            pinSpacing: true,
            start: "top 70%",
            scrub: 2,
        },
    })
        .from("#journey .sec_1 .text_wrap h3", {
            x: -100,
            opacity: 0,
            duration: 0.5,
            delay: 0.5,
            scrollTrigger: {
                trigger: "#journey .sec_1 h3",
                markers: false,
                start: "top 60%",
                end: "top 50%",
                scrub: 2,
            },
        })
        .from("#journey .sec_1 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 0.5,
            stagger: 0.5,
            scrollTrigger: {
                trigger: "#journey .sec_1 p",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })
        .from("#journey .sec_1 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: -90,
            duration: 0.75,
            stagger: 0.25,
            scrollTrigger: {
                trigger: "#journey .sec_1 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })

    // journeyTl2 sec - 2
    var journeyTl2 = gsap.timeline();
    journeyTl2.from("#journey .sec_2 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#journey .sec_2 .text_wrap",
            markers: false,
            pin: '#journey .sec_2',
            pinSpacing: true,
            start: "top 50%",
            scrub: 2,
        },
    })
        .from("#journey .sec_2 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 0.5,
            stagger: 0.5,
            scrollTrigger: {
                trigger: "#journey .sec_2 p",
                markers: false,
                start: "top 50%",
                end: "top 30%",
                scrub: 2,
            },
        })
        .from("#journey .sec_2 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: 90,
            duration: 0.75,
            stagger: 0.25,
            scrollTrigger: {
                trigger: "#journey .sec_2 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })

    // journeyTl3 sec - 3
    var journeyTl3 = gsap.timeline();
    journeyTl3.from("#journey .sec_3 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#journey .sec_3 .text_wrap",
            markers: false,
            pin: '#journey .sec_3',
            pinSpacing: true,
            start: "top 60%",
            scrub: 2,
        },
    })
        .from("#journey .sec_3 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 1,
            stagger: 0.5,
            delay: 0.5,
            scrollTrigger: {
                trigger: "#journey .sec_3 p",
                markers: false,
                start: "top 50%",
                end: "top 30%",
                scrub: 2,
            },
        })
        .from("#journey .sec_3 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: -90,
            duration: 0.75,
            stagger: 0.25,
            scrollTrigger: {
                trigger: "#journey .sec_3 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })


    // journeyTl4 sec - 4
    var journeyTl4 = gsap.timeline();
    journeyTl4.from("#journey .sec_4 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#journey .sec_4 .text_wrap",
            markers: false,
            pin: '#journey .sec_4',
            pinSpacing: true,
            start: "top 50%",
            scrub: 2,
        },
    })
        .from("#journey .sec_4 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 1,
            stagger: 0.5,
            delay: 0.5,
            scrollTrigger: {
                trigger: "#journey .sec_4 p",
                markers: false,
                start: "top 50%",
                end: "top 30%",
                scrub: 2,
            },
        })
        .from("#journey .sec_4 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: 90,
            duration: 0.75,
            stagger: 0.25,
            scrollTrigger: {
                trigger: "#journey .sec_4 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })


    // journeyTl5 sec - 5
    var journeyTl5 = gsap.timeline();
    journeyTl5.from("#journey .sec_5 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#journey .sec_5 .text_wrap",
            markers: false,
            pin: '#journey .sec_5',
            pinSpacing: true,
            start: "top 45%",
            scrub: 2,
        },
    })
        .from("#journey .sec_5 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 1,
            stagger: 0.5,
            delay: 0.5,
            scrollTrigger: {
                trigger: "#journey .sec_5 p",
                markers: false,
                start: "top 50%",
                end: "top 30%",
                scrub: 2,
            },
        })
        .from("#journey .sec_5 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: -90,
            duration: 0.75,
            stagger: 0.25,
            scrollTrigger: {
                trigger: "#journey .sec_5 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })

    /********************/
    // for journey end
    /********************/



    /********************/
    // for Looking head start
    /********************/

    // lookingAheadTl1 sec - 5
    var lookingAheadTl1 = gsap.timeline();
    lookingAheadTl1.from("#looking_ahead .sec_1 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#looking_ahead .sec_1 .text_wrap",
            markers: false,
            pin: '#looking_ahead .sec_1',
            pinSpacing: true,
            start: "top 65%",
            scrub: 2,
        },
    })
        .from("#looking_ahead .sec_1 .text_wrap h3", {
            x: -100,
            opacity: 0,
            duration: 0.5,
            delay: 0.5,
            scrollTrigger: {
                trigger: "#looking_ahead .sec_1 h3",
                markers: false,
                start: "top 60%",
                end: "top 50%",
                scrub: 2,
            },
        })
        .from("#looking_ahead .sec_1 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 1,
            stagger: 0.5,
            delay: 0.5,
            scrollTrigger: {
                trigger: "#looking_ahead .sec_1 p",
                markers: false,
                start: "top 50%",
                end: "top 30%",
                scrub: 2,
            },
        })
        .from("#looking_ahead .sec_1 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: 90,
            duration: 0.75,
            stagger: 0.25,
            scrollTrigger: {
                trigger: "#looking_ahead .sec_1 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })

    // lookingAheadTl2 sec - 5
    var lookingAheadTl2 = gsap.timeline();
    lookingAheadTl2.from("#looking_ahead .sec_2 .text_wrap", {
        y: 300,
        opacity: 0,
        duration: 0.5,
        scrollTrigger: {
            trigger: "#looking_ahead .sec_2 .text_wrap",
            markers: false,
            pin: '#looking_ahead .sec_2',
            pinSpacing: true,
            start: "top 65%",
            scrub: 2,
        },
    })
        .from("#looking_ahead .sec_2 .text_wrap p", {
            y: 100,
            opacity: 0,
            duration: 1,
            stagger: 0.5,
            delay: 0.5,
            scrollTrigger: {
                trigger: "#looking_ahead .sec_2 p",
                markers: false,
                start: "top 50%",
                end: "top 30%",
                scrub: 2,
            },
        })
        .from("#looking_ahead .sec_2 .img_area_wrap img", {
            scale: 0.5,
            opacity: 0,
            rotate: -90,
            duration: 0.75,
            stagger: 0.25,
            scrollTrigger: {
                trigger: "#looking_ahead .sec_2 img",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })

    // Decadeo_section
    var decadeSection = gsap.timeline();
    decadeSection.from(".decade_section .heading_wrap", {
        y: 300,
        scale: 2,
        opacity: 0,
        duration: 1,
        scrollTrigger: {
            trigger: ".decade_section .heading_wrap",
            markers: false,
            pin: '.decade_section',
            pinSpacing: true,
            start: "top 50%",
            scrub: 2,
        },
    })
        .from(".decade_section .image_wrap img", {
            opacity: 0,
            scale: 0,
            rotateX: 180,
            duration: 1.5,
            stagger: 0.5,
            scrollTrigger: {
                trigger: ".decade_section img",
                markers: false,
                start: "top 80%",
                end: "top 50%",
                scrub: 2,
            },
        })
        .from(".decade_section .start_again", {
            y: -200,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".decade_section .start_again",
                markers: false,
                start: "top 100%",
                end: "top 50%",
                scrub: 2,
            },
        })
    /********************/
    // for Looking head end
    /********************/






    /********************************************************/
    /********************************************************/
    /********************************************************/
    // GSAP end
    /********************************************************/
    /********************************************************/
    /********************************************************/
});