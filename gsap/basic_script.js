// use a script tag or an external JS file
document.addEventListener("DOMContentLoaded", (event) => {
    // gsap code here!
    // gsap.to(".box", {
    //     rotation: 0,
    //     x: 1500,
    //     duration: 2,
    //     delay: 0,
    //     repeat: 1, //repeat many times (-1 for infinite)
    //     backgroundColor: "red",
    //     yoyo: true, //alternate direction
    // });
    // gsap.to(".one", {
    //     x: 1000,
    //     duration: 3,
    //     delay: 0,
    //     opacity: 1
    // });
    // gsap.to(".two", {
    //     x: 1000,
    //     duration: 3,
    //     delay: 2,
    //     opacity: 1
    // });
    // gsap.to(".three", {
    //     x: 1000,
    //     duration: 3,
    //     delay: 4,
    //     opacity: 1
    // });
    // gsap.to("h1", {
    //     x: 1000,
    //     duration: 3,
    //     opacity: 1,
    //     repeat: 1,
    //     yoyo: true,
    //     stagger: 1 //set automatically delay to each element
    // });
    // gsap.from("h1", {
    //     x: -100,
    //     duration: 1,
    //     opacity: 0,
    //     stagger: 1 //set automatically delay to each element
    // });


    // #Timeline 
    // A timeline in GSAP is essentially a sequence of animations that you can control as a group

    // var tl = gsap.timeline();
    // //sequenced one-after-the-other
    // tl.to(".one", {
    //     duration: 2,
    //     x: 1000,
    //     color: "#F875AA"
    // }) //notice that there's no semicolon!
    //     .to(".two", {
    //         duration: 2,
    //         x: 1000,
    //         color: "#AEDEFC"
    //     })
    //     .to(".three", {
    //         duration: 2,
    //         x: 1000,
    //         color: "#00A9FF"
    //     });


    // template
    var tl = gsap.timeline();
    //sequenced one-after-the-other
    tl.from("header .logo, header nav, header .buttons_wrap", {
        duration: 1.5,
        y: -100,
        stagger: 0.5
    })
        .from(".hero .content h1", {
            duration: 1,
            opacity: 0,
            y: 100
        })
        .from(".img_wrap img:nth-child(1), .img_wrap img:nth-child(2), .img_wrap img:nth-child(3)", {
            duration: 1.5,
            scale: 0,
            stagger: 0.5
        })
        .to(".img_wrap img:nth-child(1)", {
            y: 20,
            duration: .75,
            repeat: -1,
            yoyo: true
        })
        .to(".img_wrap img:nth-child(2)", {
            y: 30,
            duration: 1,
            repeat: -1,
            yoyo: true
        })
        .to(".img_wrap img:nth-child(3)", {
            x: 20,
            duration: 1.5,
            repeat: -1,
            yoyo: true
        });
})