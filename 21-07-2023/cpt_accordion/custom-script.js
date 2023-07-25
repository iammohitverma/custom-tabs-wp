window.addEventListener("load", onPageLoad);
function onPageLoad() {

  let allAccordions = document.querySelectorAll(".custom_accordion_wrap");
  allAccordions.forEach(accordion_wrap => {
    let accordion_items = accordion_wrap.querySelectorAll(".accordion_item");
    let accordion_heads = accordion_wrap.querySelectorAll(".accordion_head");
    let accordion_bodies = accordion_wrap.querySelectorAll(".accordion_body");

    // set first item on accordion
    accordion_items[0].classList.add("active");

    // set dynamic height to each accordion's body
    accordion_bodies.forEach(itemBody => {
      let currBodyInner = itemBody.querySelector(".inner");
      let currBodyHeight = currBodyInner.clientHeight;
      itemBody.style.setProperty("--accordionBodyHeight", currBodyHeight + "px");
    });

    // accordion click function
    for (const [index, itemHead] of accordion_heads.entries()) {
      itemHead.addEventListener("click", accordionFun);
      function accordionFun(e) {
        let currHead = e.target;
        accordion_items.forEach((item, i) => {
          if (index !== i) {
            item.classList.remove("active");
          }
        });
        let currItem = currHead.closest(".accordion_item");
        if (currItem.classList.contains("active")) {
          currItem.classList.remove("active");
        } else {
          currItem.classList.add("active");
        }
      }
    }
  });
}