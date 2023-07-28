jQuery(document).ready(function () {
    jQuery(".menu_toggle").click(function () {
        jQuery(".customized_header").toggleClass("active");
    });
    jQuery(".subMenuAngle").click(function () {
        jQuery(this).toggleClass("active");
        jQuery(this).closest(".a-Wrap").next(".sub-menu").slideToggle();
    });
});