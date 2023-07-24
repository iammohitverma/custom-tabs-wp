// custom accordion start
jQuery(document).ready(function () {
    jQuery(".custom_accordion_wrap .accordion_item").eq(0).addClass("active");
    jQuery(".custom_accordion_wrap .accordion_item .accordion_head").click(function () {
        let currItem = jQuery(this).closest(".accordion_item");
        jQuery(currItem).siblings().removeClass("active");
        if ((currItem).hasClass("active")) {
            jQuery(currItem).removeClass("active");
            jQuery(currItem).find(".accordion_body").slideUp();
        } else {
            jQuery(currItem).addClass("active");
            jQuery(currItem).closest(".custom_accordion_wrap").find(".accordion_body").slideUp();
            jQuery(currItem).find(".accordion_body").slideDown();
        }
    });
});
// custom accordion end