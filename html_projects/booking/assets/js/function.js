// jQuery(function ($) {
//     console.log(
//         "%cWebsite Built by Aditya Chauhan",
//         "background: #0a383f; color: #ffffff; display: block;padding:5px 15px;border-radius:7px"
//     );
// })

console.log(
    "%cWebsite Built by Techmind Softwares",
    "background: #0a383f; color: #ffffff; display: block;padding:5px 15px;border-radius:7px"
);

var change_text = false;
// Search box toggling option
function handleSearchBoxClick() {
    console.log(this.dataset.cText);
    this.classList.toggle("show-search");
    document.querySelector(".main_search_box").classList.toggle("show");

    // if (change_text === false) {
    //     this.innerText = this.dataset.cText;
    //     change_text = !change_text;
    // } else {
    //     this.innerText = this.dataset.oText;
    //     change_text = !change_text;
    // }

}

// Attach the event listener to the .searchBox element
let headerSearch = document.querySelector(".searchBox");
if (headerSearch) {
    headerSearch.addEventListener("click", handleSearchBoxClick);
}