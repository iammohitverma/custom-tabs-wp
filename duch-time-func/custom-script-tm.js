// script added by tm as on 21 - 06 - 2023 end
jQuery(document).ready(function () {
  let dateset, checkSet;
  jQuery(".product-single__meta").click(function (event) { //for listing page
    event.stopPropagation();
    var target = jQuery(event.target);

    if (target.is('#wear-date')) {
      dateset = $(this).attr("data-dateset");
      if (!dateset) {
        dateEventInit(jQuery(this));
      }
      $(this).attr("data-dateset", "yes");
    }

    // checkbox check only one
    if ((target.is(".custom_check_tm")) || (target.is(".custom_check_tm_label"))) {
      checkSet = $(this).attr("data-checkset");
      if (!checkSet) {
        checkBoxInit(jQuery(this));
      }
      $(this).attr("data-checkset", "yes");
    }
  });

  function setDateFun(parentSelector, y, m, d) {
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    let Sminimumweek = jQuery(parentSelector).find("#Sminimumweek");
    let SminimumweekVal = Sminimumweek.val();

    let Smaximumweek = jQuery(parentSelector).find("#Smaximumweek");
    let SmaximumweekVal = Smaximumweek.val();

    let Rminimumweek = jQuery(parentSelector).find("#Rminimumweek");
    let RminimumweekVal = Rminimumweek.val();

    let Rmaximumweek = jQuery(parentSelector).find("#Rmaximumweek");
    let RmaximumweekVal = Rmaximumweek.val();

    let standardMinElem = jQuery(parentSelector).find("#standardMin");
    let standardMaxElem = jQuery(parentSelector).find("#standardMax");
    let rushMinElem = jQuery(parentSelector).find("#rushMin");
    let rushMaxElem = jQuery(parentSelector).find("#rushMax");

    let SminimumweekNum = d + parseInt(SminimumweekVal);
    let SmaximumweekNum = d + parseInt(SmaximumweekVal);
    let RminimumweekNum = d + parseInt(RminimumweekVal);
    let RmaximumweekNum = d + parseInt(RmaximumweekVal);

    let SminimumweekDate = new Date();
    let SmaximumweekDate = new Date();
    let RminimumweekDate = new Date();
    let RmaximumweekDate = new Date();

    SminimumweekDate.setFullYear(y, m, SminimumweekNum);
    SmaximumweekDate.setFullYear(y, m, SmaximumweekNum);
    RminimumweekDate.setFullYear(y, m, RminimumweekNum);
    RmaximumweekDate.setFullYear(y, m, RmaximumweekNum);

    let standardMinD, standardMaxD, rushMinD, rushMaxD;
    standardMinD = SminimumweekDate.getDate();
    standardMaxD = SmaximumweekDate.getDate();
    rushMinD = RminimumweekDate.getDate();
    rushMaxD = RmaximumweekDate.getDate();

    let standardMinMonthNo, standardMaxMonthNo, rushMinMonthNo, rushMaxMonthNo;
    standardMinMonthNo = SminimumweekDate.getMonth();
    standardMaxMonthNo = SmaximumweekDate.getMonth();
    rushMinMonthNo = RminimumweekDate.getMonth();
    rushMaxMonthNo = RmaximumweekDate.getMonth();

    let standardMinMonthName, standardMaxMonthName, rushMinMonthName, rushMaxMonthName;
    standardMinMonthName = month[standardMinMonthNo];
    standardMaxMonthName = month[standardMaxMonthNo];
    rushMinMonthName = month[rushMinMonthNo];
    rushMaxMonthName = month[rushMaxMonthNo];

    let standardMaxYear, rushMaxYear;
    standardMaxYear = SmaximumweekDate.getFullYear();
    rushMaxYear = RmaximumweekDate.getFullYear();

    if (standardMinMonthNo == standardMaxMonthNo) {
      standardMinElem.text(`${standardMinD}`);
    } else {
      standardMinElem.text(`${standardMinD} ${standardMinMonthName}`);
    }
    standardMaxElem.text(`${standardMaxD}  ${standardMaxMonthName} ${standardMaxYear}`);


    if (rushMinMonthNo == rushMaxMonthNo) {
      rushMinElem.text(`${rushMinD}`);
    } else {
      rushMinElem.text(`${rushMinD} ${rushMinMonthName}`);
    }
    rushMaxElem.text(`${rushMaxD}  ${rushMaxMonthName} ${rushMaxYear}`);

  }
  //on date change
  function dateEventInit(currDateFieldParent) {
    let currTargetVal;
    let eventDate = jQuery(currDateFieldParent).find("#wear-date");
    currTargetVal = jQuery(eventDate).val();
    if (currTargetVal) {
      setDateMainFun(currTargetVal);
    }
    function setDateMainFun(currTargetVal) {
      let currDate = parseInt(currTargetVal.substring(8, 10));
      let currMonth = parseInt(currTargetVal.substring(5, 7));
      let currYear = parseInt(currTargetVal.substring(0, 4));
      setDateFun(currDateFieldParent, currYear, currMonth - 1, currDate);
    }
    jQuery(eventDate).change(function () {
      currTargetVal = jQuery(this).val();
      if (currTargetVal) {
        setDateMainFun(currTargetVal);
        jQuery(this).closest(".product-single__meta").find(".delivery_estimate_box").slideDown();
      } else {
        jQuery(this).closest(".product-single__meta").find(".delivery_estimate_box").slideUp();
      }
    });
  };

  // checkbox check only one
  function checkBoxInit(parentSelector) {
    // set previous check
    let prevCheck = jQuery(parentSelector).attr("data-checkid");
    if (prevCheck) {
      jQuery(`#${prevCheck}`).prop('checked', true);
    }
    // remove all check and select only one check like radio
    let checkBoxes = jQuery(parentSelector).find(".delivery_estimate_box [type='checkbox']");
    jQuery(checkBoxes).change(function () {
      jQuery(checkBoxes).prop("checked", false);
      jQuery(this).prop("checked", true);
      let currId = jQuery(this).attr("id");
      jQuery(parentSelector).attr("data-checkid", currId);
    });
  }

  // quick-product__btn click
  setTimeout(() => {
    jQuery("[data-section-type='collection-template'] .quick-product__btn").each(function () {
      $(this).click(function () {
        openModalFun();
      });
    });
  }, 2000);
  function openModalFun() {
    setTimeout(() => {
      let allModals = jQuery(".modal");
      if (allModals.hasClass("modal--is-active")) {
        let currActiveModal = jQuery(".modal--is-active");
        let currActiveModalMeta = jQuery(currActiveModal).find(".product-single__meta");
        setEstBoxHTML(currActiveModalMeta);
      }
    }, 2000);
  }

  // Set Estimate Box HTML
  function setEstBoxHTML(currParent) {
    let currEstBox = jQuery(currParent).find(".delivery_estimate_box");
    let currEstBoxInner = jQuery(currEstBox).find(".delivery_estimate_box_inner");
    let currEstBoxTextWrap = jQuery(currEstBoxInner).find(".text_wrap");
    let currEstBoxTextWrapHtml = `<div class="inner">
        <p>
          <input id="standard-fee" type="checkbox" value="no">
          <span class="custom_check_tm"></span>
          <label class="custom_check_tm_label" for="standard-fee">
              <span> Standard Delivery.
              </span>Order Today! Estimated. Ship Date: 
              <b id="standardMin"></b> - <b id="standardMax"></b>
          </label>
        </p><p>
          <input id="rush-fee" type="checkbox" name="attributes[rush-fee]" value="yes">
          <span class="custom_check_tm"></span>
          <label class="custom_check_tm_label" for="rush-fee">
              <span>Guaranteed Rush Priority Delivery $60 fee</span>
              Order Today! Estimated Ship Date:
              <b id="rushMin"></b> - <b id="rushMax"></b>
          </label>
      </p>
    </div>`;

    let allEstBoxes = jQuery(".delivery_estimate_box");
    if (allEstBoxes) {
      $(".delivery_estimate_box .text_wrap .inner").each(function () {
        jQuery(this).remove();
      });
    }
    $(currEstBoxTextWrap).html(currEstBoxTextWrapHtml);
    dateEventInit(currParent);
    checkBoxInit(currParent);
  }

  // modal close button
  setTimeout(() => {
    jQuery("[data-section-type='collection-template'] .modal__close ").each(function () {
      $(this).click(function () {
        closeModalFun();
      });
    });
  }, 2000);
  function closeModalFun() {
    let singleProductWrap = jQuery("#shopify-section-product-template").find(".product-single__meta");;
    setEstBoxHTML(singleProductWrap);
  }
});
