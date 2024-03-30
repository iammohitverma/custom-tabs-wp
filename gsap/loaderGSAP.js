let tl = gsap.timeline();
function loadingTime() {
    let per = 0;
    let percentWrap = document.querySelector("#preloader h4");
    setInterval(() => {
        let x = Math.floor(Math.random() * 10) + 10;
        per = per + x;
        if (per < 100) {
            console.log(per);
            percentWrap.innerHTML = parseInt(per) + "%";
        } else {
            per = 100;
            percentWrap.innerHTML = parseInt(per) + "%";
        }
    }, 200);
}


tl.to("#preloader h4", {
    onStart: loadingTime()
})
tl.to("#preloader", {
    transform: "translateY(-100%)",
    duration: 1.5,
    delay: 1.5,
})