var tl = gsap.timeline();
tl.to(".dark h1", {
    transform: "translateX(-100%)",
    scrollTrigger: {
        trigger: ".dark",
        markers: true,
        start: "top 0%",
        end: "top -500%",
        scrub: 3,
        pin: true
    }
})