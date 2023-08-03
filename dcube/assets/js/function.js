jQuery(document).ready(function ($) {
    $(".tm__hamburger").click(function () {
        $(".sidebarMenu").toggleClass("show");
    })
    $("#hamburger").click(function () {
        $(this).toggleClass("is-active");
    });
    $(".second_banner").hide();
    $(".start_btn a").click(function () {
        $(".first_banner").hide();
        $(".second_banner").show();
    });

    // products tabs start
    // filter items on button click
    var filterValue = "";
    let tabBtns = $(".tab_button");
    $(tabBtns).eq(0).addClass("is-checked");

    if (tabBtns) {
        $(".tab_button").click(function () {
            $(".tm__productList .product_row").html("");
            $(".tm__productList .post_not_found").hide();
            $(".card_placeholders_mv").show();
            $(this).siblings().removeClass("is-checked");
            $(this).addClass("is-checked");
            filterValue = $(this).attr("data-cat");
            // on category change "click" run function ajaxRunOnClickFun call
            ajaxRunOnClickFun(filterValue);
        });
    }


    let pageCount = 1; //global var
    let postOffset = 0; //global offset
    let postsPerPage = 8 //post per page


    /********************************************************************/
    // on category change "click" run function ajaxRunOnClickFun defined
    /********************************************************************/
    function ajaxRunOnClickFun(currActive) {
        postOffset = 0; //after click we want all posts from 0 offset at initial state

        var dataObj = {
            cat: currActive,
            paged: postsPerPage,  //fetch 8 post from Wp and append 
            offset: postOffset,
        };
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            dataType: "html",
            data: {
                action: "fetchPostUsingAjaxTabs",
                obj: dataObj,
            },
            success: function (res) {
                if (res != 0) {
                    $(".card_placeholders_mv").hide();
                    $(".tm__productList .product_row").html(res);
                    $(".tm__productList .post_not_found").hide();
                } else {
                    $(".card_placeholders_mv").hide();
                    $(".tm__productList .post_not_found").show();
                }
            },
        });
        pageCount = 1;
    } //end ajaxRunOnClickFun
    // products tabs end
});