jQuery(document).ready(function () {
  jQuery("#engage-sec-read-more").click(function (e) {
    e.preventDefault();
    jQuery(".engage-sec-collapsible").slideToggle();
    let btn = jQuery(this).find(".elementor-button-text");
    let btnText = jQuery(this).find(".elementor-button-text").text();
    if (btnText == "Read More") {
      btn.text("Read Less");
    } else {
      btn.text("Read More");
    }
  });

  // disable accodion collapse option if there is no content

  jQuery(".agenda-sec .eael-tabs-content .elementor-tab-title").each(
    function () {
      let getParent = jQuery(this).parent();
      let accordionContent = getParent.find(".eael-accordion-content");
      let accordionContentHTML = accordionContent.html();
      if (accordionContentHTML == "" || accordionContentHTML == "<p></p>") {
        jQuery(this).parent().addClass("accordion-disabled");
      }
    }
  );


  // tab script start
  jQuery(".agenda_tab button").eq(0).addClass("active");
  jQuery(".agenda_tab .tab_content").eq(0).addClass("active");

  jQuery(".agenda_tab .tab_head button").click(function () {
    jQuery(".agenda_tab button").removeClass("active");
    jQuery(this).addClass("active");
    jQuery(".tab_content").removeClass("active");
    let indexOfElem = jQuery(this).index();
    jQuery(".tab_content").eq(indexOfElem).addClass("active");
  });
  // tab script end

  // accordion script start
  // set Initial height for accorion's item
  jQuery(".agenda_tab .accordion_item").each(function (index) {
    let dynHeight = jQuery(this).find(".accordion_content .inner").outerHeight();
    jQuery(this).get(0).style.setProperty("--dynHeight", dynHeight + "px");
    // set disabled class for items without content
    if ((dynHeight == 0) || (dynHeight == 20)) {
      jQuery(this).addClass("disabled");
    }
  });


  jQuery(".agenda_tab .accordion_head button").click(function () {
    let currItem = jQuery(this).closest(".accordion_item");
    jQuery(currItem).siblings().removeClass("active");
    if ((currItem).hasClass("active")) {
      jQuery(currItem).removeClass("active");
    } else {
      jQuery(currItem).addClass("active");
    }
  });
  // accordion script end
});
