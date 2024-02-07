// Developer page search functionality 
$(".search_field").keyup(function (e) {
    let currVal = $(this).val();
    console.log(currVal);
    searchDevFilter(currVal);
});

function searchDevFilter(value) {
    $(".accordion-body ul li a, .accordion-body ul li a .text b").each(function () {
        console.log("searchvalue " + value);
        let option = $(this).text().toLowerCase();
        console.log("optionValue " + option);
        let filterVal = value.toLowerCase(); // Make sure to replace this with your actual filter value
        if (option.indexOf(filterVal) !== -1) {
            $(this).closest("li").addClass("show");
            $(this).closest("li").removeClass("hide");
        } else {
            $(this).closest("li").addClass("hide");
            $(this).closest("li").removeClass("show");
        }

        // Check if all li elements have the hide class, then add hide to accordion item
        $(".accordion-body ul").each(function () {
            let allLiHaveHideClass = true;

            $(this).find("li").each(function () {
                if (!$(this).hasClass("hide")) {
                    allLiHaveHideClass = false;
                    return false;  // Break out of the loop early if one li does not have hide class
                }
            });

            if (allLiHaveHideClass) {
                $(this).closest(".accordion-item").addClass("hide").removeClass("show");
            } else {
                $(this).closest(".accordion-item").removeClass("hide").addClass("show");
            }
        });

    });
}