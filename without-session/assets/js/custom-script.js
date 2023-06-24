jQuery(document).ready(function () {
  // init Isotope
  var $grid = $(".grid").isotope({
    // options
    transitionDuration: 1000,
  });

  // filter items on button click
  var filterValue = "";
  var currActiveWithoutDot = "";
  $(".filter-button-group").on("click", "button", function () {
    $(this).siblings().removeClass("is-checked");
    $(this).addClass("is-checked");
    filterValue = $(this).attr("data-filter");

    $grid.isotope({
      filter: filterValue,
    });

    // set value in session if user back on previous page tab will be active which was last
    currActiveWithoutDot = filterValue.substring(1);

    // on category change "click" run function ajaxRunOnClickFun call
    ajaxRunOnClickFun();
  });

  
  let pageCount = 1; //global var
  let postOffset = 0; //global offset
  let postsPerPage = 8 //post per page


  /********************************************************************/
  // on category change "click" run function ajaxRunOnClickFun defined
  /********************************************************************/
  function ajaxRunOnClickFun() {
    $(".tabs_wrap .tabs_body .grid").css("height", 0);
    $(".tabs_wrap .tabs_body .grid").html("");
    $(".post-loader").show();
    $(".no-post-message").hide();
    $('.load_more').hide();

    postOffset = 0; //after click we want all posts from 0 offset at initial state
    
    var dataObj = {
      cat: currActiveWithoutDot,
      paged: postsPerPage,  //fetch 8 post from Wp and append 
      offset: postOffset,
    };
    jQuery.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      dataType: "html",
      data: {
        action: "fetchPostUsingAjaxTabs",
        obj: dataObj,
      },
      success: function (res) {
        if (res != 0) {
            $(".post-loader").hide();
            $(".tabs_wrap .tabs_body .grid").append(res);
            $grid.isotope("destroy"); // destroy
            $grid.isotope({
              filter: filterValue,
            });
            $('.load_more').show();
        } else {
          $(".post-loader").hide();
          $(".no-post-message").show();
          $('.load_more').hide();
        }
      },
    });
    pageCount = 1;
  } //end ajaxRunOnClickFun


  /********************************************************************/
  // Display more post on scroll like instagram 
  /********************************************************************/
  jQuery('.load_more').on('click', function() {
    $(".post-loader").show();
    $(".no-post-message").hide();
      postOffset = postsPerPage * pageCount;
      pageCount++;

      var dataObj = {
          cat: currActiveWithoutDot,
          paged: postsPerPage,  //fetch 8 post from Wp and append 
          offset: postOffset,
      };
          
      jQuery.ajax({
          type: 'POST',
          url: '/wp-admin/admin-ajax.php',
          dataType: 'html',
          data: {
              action: "fetchPostUsingAjaxTabs",
              obj: dataObj,
          },
          success: function (res) {
            if (res != 0) {
                $(".post-loader").hide();
                $(".tabs_wrap .tabs_body .grid").append(res);
                $grid.isotope("destroy"); // destroy
                $grid.isotope({
                  filter: filterValue,
                });
                document.querySelector(".progress_wrapper").scrollIntoView();
            } else {
              $(".post-loader").hide();
              $(".no-post-message").show();
              $('.load_more').hide();
            }
          }
      });
  }); //end load more

}); //end doc ready
