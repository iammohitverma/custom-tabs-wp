// gsap.from("#sec_1 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: "#sec_1 .box"
// });
// gsap.from("#sec_2 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: "#sec_2 .box"
// });
// gsap.from("#sec_3 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: "#sec_3 .box"
// });


// gsap.from("#sec_1 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_1 .box",
//         markers: true,
//         start: "top 100%", //set start position from top
//     },
// });
// gsap.from("#sec_2 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_2 .box",
//         markers: true,
//         start: "top 50%",
//     },
// });
// gsap.from("#sec_3 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_3 .box",
//         markers: true,
//         start: "top 70%",
//     },
// });


// gsap.from("#sec_1 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_1 .box",
//         markers: true,
//         start: "top 100%", //set start position from top
//         end: "top 100%", //set end position from top
//     },
// });
// gsap.from("#sec_2 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_2 .box",
//         markers: true,
//         start: "top 50%",
//         end: "top 100%", //set end position from top
//     },
// });
// gsap.from("#sec_3 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_3 .box",
//         markers: true,
//         start: "top 70%",
//         end: "top 100%", //set end position from top
//     },
// });


// gsap.from("#sec_1 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_1 .box",
//         markers: true,
//         start: "top 100%", //set start position from top (Jahan se animation start hoga)
//         end: "top 100%", //set end position from top (Jahan pe animation end hoga)
//         scrub: true,
//     },
// });
// gsap.from("#sec_2 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_2 .box",
//         markers: true,
//         start: "top 100%",
//         end: "top 50%",
//         scrub: true,
//     },
// });
// gsap.from("#sec_3 .box", {
//     scale: 0,
//     duration: 2,
//     scrollTrigger: {
//         trigger: "#sec_3 .box",
//         markers: true,
//         start: "top 100%",
//         end: "bottom 0%",
//         scrub: true,
//     },
// });



gsap.from("#sec_1 .box", {
    scale: 0,
    duration: 2,
    scrollTrigger: {
        trigger: "#sec_1 .box",
        markers: true,
        start: "top 100%", //set start position from top (Jahan se animation start hoga)
        end: "top 100%", //set end position from top (Jahan pe animation end hoga)
        scrub: 5, //jab jab scroll hoga tab animation trigger hoga har bar
    },
});
gsap.from("#sec_2 .box", {
    scale: 0,
    duration: 2,
    scrollTrigger: {
        trigger: "#sec_2 .box",
        markers: true,
        start: "top 100%",
        end: "top 50%",
        scrub: 5,
    },
});
gsap.from("#sec_3 .box", {
    scale: 0,
    duration: 2,
    scrollTrigger: {
        trigger: "#sec_3 .box",
        markers: true,
        start: "top 100%",
        end: "bottom 0%",
        scrub: 5,
    },
});