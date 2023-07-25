jQuery(document).ready(function () {
    // New header script latest start
    let header = document.querySelector(".header_mv");
    if (header) {
        jQuery(document).ready(function () {
            jQuery(".menu_toggle").click(function () {
                jQuery(header).toggleClass("active");
                jQuery(this).toggleClass("active");
                jQuery(".navigation").slideToggle();
            });
            jQuery(".subMenuAngle").each(function () {
                jQuery(this).click(function () {
                    jQuery(this).toggleClass("active");
                    jQuery(this).closest(".a-Wrap").next(".sub-menu").slideToggle();
                });
            });
        });
    }// New header script latest end

    // append read more button along with excerpt start
    if (jQuery(".excerpt_with_readmore")) {
        jQuery(".excerpt_with_readmore").each(function () {
            let currPost = jQuery(this);
            let postExcerptContainer = jQuery(currPost).find(".elementor-widget-theme-post-excerpt .elementor-widget-container")
            let postReadmoreWrapper = jQuery(currPost).find(".readmore_btn");
            let postReadmoreBtn = jQuery(currPost).find(".readmore_btn .elementor-button");
            jQuery(postExcerptContainer).append(postReadmoreBtn);
            jQuery(postReadmoreWrapper).remove();
        });
    }// append read more button along with excerpt end

    // filter items on button click
    var filterValue = "";
    var currActiveWithoutDot = "";
    let tabBtns = $(".tab_button");
    $(tabBtns).eq(0).addClass("is-checked");

    if (tabBtns) {
        $(".tab_button").click(function () {
            $(".latest_post_tabs_mv .tabs_body .body.row").html("");
            $(".latest_post_tabs_mv .tabs_body .not_found").hide();
            $(".placeholderLoader").show();
            $(this).siblings().removeClass("is-checked");
            $(this).addClass("is-checked");
            filterValue = $(this).attr("data-filter");

            console.log(filterValue);

            currActiveWithoutDot = filterValue.substring(1);

            // on category change "click" run function ajaxRunOnClickFun call
            ajaxRunOnClickFun(currActiveWithoutDot);
        });
    }


    let pageCount = 1; //global var
    let postOffset = 0; //global offset
    let postsPerPage = 8 //post per page


    /********************************************************************/
    // on category change "click" run function ajaxRunOnClickFun defined
    /********************************************************************/
    function ajaxRunOnClickFun(currActive) {
        // $(".latest_post_tabs_mv .loader").show();
        // $(".latest_post_tabs_mv .loader").css("display", "flex");

        $(".mapscripts").html('');
        postOffset = 0; //after click we want all posts from 0 offset at initial state

        var dataObj = {
            cat: currActive,
            paged: postsPerPage,  //fetch 8 post from Wp and append 
            offset: postOffset,
        };
        jQuery.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            dataType: "json",
            data: {
                action: "fetchPostUsingAjaxTabs",
                obj: dataObj,
            },
            success: function (res) {
                if (res != 0) {
                    console.log("Found data");
                    console.log(res);
                    $(".latest_post_tabs_mv .tabs_body .body.row").html("");
                    $(".latest_post_tabs_mv .tabs_body .body.row").append(res.centers);
                    $(".map-wrapper").html(res.map);
                    $(".mapscripts").html(res.mapscript);
                    // $(".latest_post_tabs_mv .loader").hide();
                    $(".placeholderLoader").hide();
                } else {
                    console.log("No data");
                    // $(".latest_post_tabs_mv .loader").hide();
                    $(".placeholderLoader").hide();
                    $(".latest_post_tabs_mv .tabs_body .not_found").show();
                }
            },
        });
        pageCount = 1;
    } //end ajaxRunOnClickFun


    // session set
    // check Item
    // let isLoadSet = localStorage.getItem("onloadSet");
    // // Retrieve
    // if (isLoadSet) {
    //     console.log("Load is set val " + isLoadSet);
    //     $(".loadOnce").remove();
    // } else {
    //     console.log("Not set");
    // }
    // localStorage.setItem("onloadSet", "Yes");
    // $(".clearStorage").click(function () {
    //     localStorage.clear();
    // });

    let isClassOnce = jQuery(".loadOnce");
    let arrOfMulitplePages = [];
    if (isClassOnce) {
        let currUrl;
        currUrl = window.location.href;

        let getloadOnce, getloadOnceObj, getloadOnceStr, availInLoadObj = false;
        getloadOnce = localStorage.getItem("loadOnce");
        getloadOnceObj = JSON.parse(getloadOnce);

        if (getloadOnceObj == null) {
            arrOfMulitplePages.push({ currUrl: currUrl });
            getloadOnceStr = JSON.stringify(arrOfMulitplePages)
            localStorage.setItem("loadOnce", getloadOnceStr);
        } else {
            for (const key in getloadOnceObj) { //check in obj 
                if ((getloadOnceObj[key].currUrl) == currUrl) {
                    availInLoadObj = true;
                    break;
                }
            }
            if (availInLoadObj == true) {
                jQuery(isClassOnce).remove();
            } else {
                arrOfMulitplePages.push(...getloadOnceObj, { currUrl: currUrl });
                getloadOnceStr = JSON.stringify(arrOfMulitplePages)
                localStorage.setItem("loadOnce", getloadOnceStr);
            }
        }
    }
});