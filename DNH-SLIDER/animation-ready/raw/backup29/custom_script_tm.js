jQuery(document).ready(function () {
    // Get the outer height of #main-header
    var mainHeaderHeight = jQuery('#main-header').outerHeight();

    // Set CSS variable to the body element
    jQuery('body').css('--main-header-height', mainHeaderHeight + 'px');

    if (jQuery(".contact_form_tm")) {
        const myInterval = setInterval(checkNumberField, 1000);
        function checkNumberField() {

            if (jQuery(".iti.iti--allow-dropdown input")) {
                setTimeout(() => {
                    jQuery(".iti.iti--allow-dropdown input").attr("placeholder", "Phone Number");
                    jQuery(".iti.iti--allow-dropdown input").addClass("placeholderActive");
                    clearInterval(myInterval);
                }, 2000);
            }
        }
    }
});

