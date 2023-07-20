<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justco-theme
 */
global $wpdb;
global $wp_query;
$wpdb_prefix = $wpdb->prefix;
$table_name = $wpdb_prefix . "newsletter_content";

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// print_r($actual_link);

$current_url = explode("/", $actual_link);
$current_country = $current_url[3];
$language_code = $current_url[4];

$total_coutries = array('sg', 'au', 'id', 'cn', 'th', 'tw', 'jp', 'kr');
if (in_array($current_country, $total_coutries, TRUE)) {
    $data = $current_country;
} else {
    $data = "sg";
}

$country_lang = $current_url[4];
$currentpage_ID = $wp_query->post->ID;
?>
<?php
    // check parent page id and show header accordingly
    $postParentID = $post->post_parent;
    if($postParentID != "45099"){
?>

<footer>
    <div class="container">
        <div class="row futr_top_row">
            <div class="col-md-1">
                <div class="logo_futr">
                    <a href="#">
                        <img src="/wp-content/uploads/2022/06/logo-white.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <?php

                if ($country_lang == "en" && $country_lang != "") {
                    $language = "en";
                    $full_menu = $data . "-" . $language;
                } else {
                    $full_menu = $data;
                }
                if (is_active_sidebar('footer-menu-widgets-' . $full_menu)) {
                    dynamic_sidebar('footer-menu-widgets-' . $full_menu);
                }

                $current_country1 = strtoupper($current_url[3]);
                $country_lang = strtoupper($current_url[4]);
                if ($country_lang == "EN" || $country_lang == "AU" || $country_lang == "SG") {
                    $language = $country_lang;
                } else {
                    $language = $current_country1;
                }
                $data = $wpdb->get_results("SELECT * FROM $table_name where country='$current_country1' AND language='$language'");

                // echo "<pre>"; print_r($data); echo "</pre>";
                ?>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <!--div class="boxed_form">
                    <h6 class="ne_ws"><--?php echo $data[0]->newsletter_heading; ?></h6>
                    <p><--?php echo $data[0]->newsletter_text; ?></p>
                    <div class="form_ed">
                        <form action="#">
						<input type="hidden" name="Preferred_Language" id="Preferred_Language" value="">
                        <input type="hidden" name="preferred_centre" id="preferred_centre" value="">
                        <input type="hidden" name="company" id="company" value="">
                        <input type="hidden" name="team_size" id="team_size" value="">
                        <input type="hidden" name="utm_campaign" id="utm_campaign" value="">
                        <input type="hidden" name="utm_source" id="utm_source" value="">
                        <input type="hidden" name="utm_medium" id="utm_medium" value="">
                        <input type="hidden" name="utm_content" id="utm_content" value="">
                        <input type="hidden" name="form_type" id="form_type" value="Newsletter">
                        <input type="hidden" name="last_form_submitted_timestamp" id="last_form_submitted_timestamp" value="">
                        <input type="text" name="" id="" placeholder="<--?php echo $data[0]->first_name_placeholder; ?>">
                        <input type="text" placeholder="<--?php echo $data[0]->last_name_placeholder; ?>">
                        <input type="email" name="" id="" placeholder="<--?php echo $data[0]->email_placeholder; ?>">
                        <button type="submit"><--?php echo $data[0]->button_text; ?></button>
                        </form>
                    </div>
                </div-->
				<?php echo do_shortcode("[NewsletterForm]"); ?>
            </div>
        </div>
        <div class="bootom_futr">
            <div class="icon_list">
                <a href="https://www.facebook.com/JustCoGlobal/" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/justcoglobal/" target="_blank"><i class="fab fa-instagram"></i> </a>
                <a href="https://www.linkedin.com/company/justco/" target="_blank"><i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://www.youtube.com/channel/UC9AoNevgy2yDXLyyVs3jVbw" target="_blank"><i
                        class="fab fa-youtube"></i> </a>
            </div>
            <div class="para_graphs">
                <p><a
                        href="/<?php echo $current_country; ?>/<?php if ($language_code == "en" && $language_code != "") { ?>en/<?php } ?>terms-of-service/">Terms
                        of Service</a> | <a
                        href="/<?php echo $current_country; ?>/<?php if ($language_code == "en" && $language_code != "") { ?>en/<?php } ?>privacy-policy/">Privacy
                        Policy</a> | © 2022 JustCo. All rights reserved</p>
            </div>
        </div>

    </div>
    <?php
    if($currentpage_ID != "38931" && $currentpage_ID != "39624" && $currentpage_ID != "42144"){ ?>            
    <div id="bookTour">
        <?php echo do_shortcode('[BookTourForm]'); ?>
    </div>
    <?php } ?>
</footer>

<div class="page__footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="socialIcon">
                    <a href="https://www.facebook.com/JustCoGlobal/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/justcoglobal/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/justco/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UC9AoNevgy2yDXLyyVs3jVbw">
                        <i class="fab fa-youtube"></i>
                    </a>
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center mt-2 mt-md-0">
                <p class="tp_links text-center text-md-end w-100">
                <a href="/<?php echo $current_country; ?>/<?php if ($language_code == "en" && $language_code != "") { ?>en/<?php } ?>terms-of-service/">Terms of Service</a> | <a href="/<?php echo $current_country; ?>/<?php if ($language_code == "en" && $language_code != "") { ?>en/<?php } ?>privacy-policy/">Privacy Policy</a> | © 2022 JustCo. All rights reserved
                </p>
            </div>
        </div>
    </div>
</div>

<?php
        } else {
            echo get_template_part( 'footer-latest' ); 
        }
        ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<?php
    if($current_country == 'sg') {
        $cityname = 'Singapore';
    }else if($current_country == 'au') {
        $cityname = 'Sydney';
    }else if($current_country == 'th' && $language_code == 'en') {
        $cityname = 'Bangkok';
    }else if($current_country == 'id' && $language_code == 'en') {
        $cityname = 'Jakarta';
    }else if($current_country == 'cn' && $language_code == 'en') {
        $cityname = 'Shanghai';
    }else if($current_country == 'kr' && $language_code == 'en') {
        $cityname = 'Seoul';
    }else if($current_country == 'tw' && $language_code == 'en') {
        $cityname = 'Hsinchu';
    }else if($current_country == 'jp' && $language_code == 'en') {
        $cityname = 'Tokyo';
    }else if($current_country == 'th' && $language_code != 'en'){
      $cityname = 'กรุงเทพมหานคร';
    } else if($current_country == 'id' && $language_code != 'en'){
      $cityname = 'Jakarta';
    } else if($current_country == 'cn' && $language_code != 'en'){
      $cityname = '上海';
    }else if($current_country == 'kr' && $language_code != 'en'){
      $cityname = '서울';
    }else if($current_country == 'tw' && $language_code != 'en'){
      $cityname = '台北';
    }else if($current_country == 'jp' && $language_code != 'en'){
      $cityname = '東京';
    }


    /* */
    if($current_country == 'sg') {
        $cityname_book = 'Singapore';
    }else if($current_country == 'au') {
        $cityname_book = 'Sydney';
    }else if($current_country == 'th') {
        $cityname_book = 'Bangkok';
    }else if($current_country == 'id') {
        $cityname_book = 'Jakarta';
    }else if($current_country == 'cn') {
        $cityname_book = 'Shanghai';
    }else if($current_country == 'kr') {
        $cityname_book = 'Seoul';
    }else if($current_country == 'tw') {
        $cityname_book = 'Hsinchu';
    }else if($current_country == 'jp') {
        $cityname_book = 'Tokyo';
    }
?>

<script type="text/javascript" src="/wp-content/themes/justCo/assets/js/locations.js"></script>
<script type="text/javascript" src="/wp-content/themes/justCo/assets/js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx4DPRPTmy8PiQUDzuvfGK3A_VUUmPcnw&callback=initMap&v=weekly" async ></script>

<script>
var utm_source = "<?php echo $_SESSION['justco_utm_source'] ?>";
var utm_medium = "<?php echo $_SESSION['justco_utm_medium'] ?>";
var utm_campaign = "<?php echo $_SESSION['justco_utm_campaign'] ?>";
var utm_content = "<?php echo $_SESSION['justco_utm_content'] ?>";

var utm_term = "<?php echo $_SESSION['justco_utm_term'] ?>";
var utm_solution = "<?php echo $_SESSION['justco_utm_solution'] ?>";
var utm_objective = "<?php echo $_SESSION['justco_utm_objective'] ?>";
var utm_asset = "<?php echo $_SESSION['justco_utm_asset'] ?>";
var utm_agency = "<?php echo $_SESSION['justco_utm_agency'] ?>";
var pagetype = "<?php echo $actual_link; ?>";

$('input[name="utm_source"]').val(utm_source);
$('input[name="utm_medium"]').val(utm_medium);
$('input[name="utm_campaign"]').val(utm_campaign);
$('input[name="utm_content"]').val(utm_content);

$('input[name="utm_term"]').val(utm_term);
$('input[name="utm_solution"]').val(utm_solution);
$('input[name="utm_objective"]').val(utm_objective);
$('input[name="utm_asset"]').val(utm_asset);
$('input[name="utm_agency"]').val(utm_agency);

$('input[name="page_type"]').val(pagetype);

$(".workspace_btn").on("click", function(){
    var location_action = $('.location-filter-sb').attr('action');
     var city_val = $('.location_country').select2('data')[0].element.attributes[1].nodeValue;
     var code_val = $('.location_country').select2('data')[0].element.attributes[3].nodeValue;
     var country_code = $('.location_country').select2('data')[0].element.attributes[2].nodeValue;
     if(country_code == "-"){
        $('.location-filter-sb').attr('action', "/"+code_val+'/locations/'+city_val);
     }else{
        $('.location-filter-sb').attr('action', "/"+code_val+'/'+country_code+'/locations/'+city_val);
     }
});


$(".loca_tion").on("change", function(){
     var city_val = $(this).select2('data')[0].element.attributes[1].nodeValue;
     var code_val = $(this).select2('data')[0].element.attributes[3].nodeValue;
     var country_code = $(this).select2('data')[0].element.attributes[2].nodeValue;
     if(country_code == "-"){
           window.location.href = "/"+code_val+'/locations/'+city_val;
     }else{
            window.location.href = "/"+code_val+'/'+country_code+'/locations/'+city_val;
     }
});

$("#workspace-district").on("change", function(){
    var district_val = $(this).find(":selected").val();
    var city_val = "<?php echo $current_country ?>";
    var language_code = "<?php echo $language_code ?>";
    var country_fullname = $(".loca_tion").find(":selected").text();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: {
            action: "center_post_district",
            district_val: district_val,
            city_val: city_val,
            language_code: language_code,
            country_fullname: country_fullname,
        },
        success: function(response) {
            $(".district_main_area").empty().replaceWith(response);
        }
    });
});

$(".location").on("change", function(){
    var city_val = $(this).find(":selected").val();
    var country_code = "<?php echo $current_url[3] ?>";
	var language_code1 = "<?php echo $language_code ?>";
	if(country_code == 'jp' && language_code1 != 'en'){
		var language_code = language_code1;
	}else{
		var language_code = '';
	}
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: {
            action: "center_post_city",
            city_val: city_val,
            country_code: country_code,
            lang_code: language_code
        },
        success: function(response) {
            $(".center").empty()
            $(".center").append(response);
            var current_selected_val = $('.location').find(':selected').data('localcity');
            var current_country_selected_val = $('.location').find(':selected').data('localcountry');
            $(".preferred_city").val(current_selected_val);
            $(".Preferred_Country").val(current_country_selected_val);
        }
    });
});

$(".location_book_tour").on("change", function(){
    var city_val = $(this).find(":selected").val();
    var country_code = "<?php echo $current_url[3] ?>";
	var language_code1 = "<?php echo $language_code ?>";
	if(country_code == 'jp' && language_code1 != 'en'){
		var language_code = language_code1;
	}else{
		var language_code = '';
	}
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: {
            action: "center_post_city",
            city_val: city_val,
            country_code: country_code,
            lang_code: language_code
        },
        success: function(response) {
            $(".center").empty()
            $(".center").append(response);
            var current_selected_val = $('.location_book_tour').find(':selected').data('localcity');
            var current_country_selected_val = $('.location_book_tour').find(':selected').data('localcountry');
            $(".preferred_city_book").val(current_selected_val);
            $(".Preferred_Country_book").val(current_country_selected_val);
        }
    });
});


function abcdef(enq_cn){
    var city_val = "<?php echo $cityname ?>";
    var city_val_book = "<?php echo $cityname_book ?>";
    var country_code = "<?php echo $current_url[3] ?>";
    var lang_code = "<?php echo $current_url[4] ?>";
    $("#enqLocation select").val(city_val);
    $("#enqLocation .select2-selection__rendered").attr("title", city_val);
    $("#enqLocation .select2-selection__rendered").text(city_val);
    $(".preferred_city_book").val(city_val_book);
    var Countryc = country_code.toUpperCase();
    $(".Preferred_Country_book").val(Countryc);
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: {
            action: "center_post_city",
            city_val: city_val,
            country_code: country_code,
            lang_code: lang_code
        },
        success: function(response) {
            $(".center").empty()
            $(".center").append(response);
            var url      = window.location.href; 
            var splitUrl = url.split('/');
            if((splitUrl[4] != 'membership-plans') && (splitUrl[5] != 'membership-plans' ) ){
              if(splitUrl[3] == 'tw'){
              const str = enq_cn;
              string = str.replace(/[^a-zA-Z ]/g, "");
              enq_cn =  $.trim(string);
              }
                var center_records = $(".center").find(`[data-center='${enq_cn}']`).val();
                $("#enqCenter1 select").val(center_records);
                $("#enqCenter1 .select2-selection__rendered").attr("title", center_records)
                $("#enqCenter1 .select2-selection__rendered").text(center_records)
            }
        }
    });
}

$(".country").on("change", function() {
    var country_id = $(this).find(":selected").val();
    var country_fullname = $(this).find(":selected").data("name");
    var city_val = "<?php echo $current_country ?>";
    var language_code = "<?php echo $language_code ?>";
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        dataType: "json",
        data: {
            action: "meeting_post_country",
            country_id: country_id,
            country_fullname: country_fullname,
            city_val: city_val,
            language_code: language_code,
        },
        success: function(response) {
            $(".meeting_room_results").empty().replaceWith(response.html);
            $(".dist").empty().replaceWith(response.res);
            $(".person_select").empty().replaceWith(response.resp);
        }
    });
});

$(document).on("change", ".workspace", function() {
    var country_id = $(".country").find(":selected").val();
    var country_name = $(".country").find(":selected").data("name");
    var workspace_id = $(this).find(":selected").val();
    var city_val = "<?php echo $current_country ?>";
    var language_code = "<?php echo $language_code ?>";
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: {
            action: "meeting_post_workspace",
            workspace_id: workspace_id,
            country_id: country_id,
            country_name: country_name,
            city_val: city_val,
            language_code: language_code,
        },
        success: function(response) {
            $(".meeting_room_results").empty().replaceWith(response);
        }
    });
});

$(document).on("change", ".number_of_person", function() {
    var country_id = $(".country").find(":selected").val();
    var workspace_id = $(".workspace").find(":selected").val();
    var person_id = $(this).find(":selected").val();
    var city_val = "<?php echo $current_country ?>";
    var language_code = "<?php echo $language_code ?>";
    var country_name = $(".country").find(":selected").data("name");
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: {
            action: "meeting_post_person",
            workspace_id: workspace_id,
            country_id: country_id,
            person_id: person_id,
            country_name: country_name,
            city_val: city_val,
            language_code: language_code,
        },
        success: function(response) {
            $(".meeting_room_results").empty().replaceWith(response);
        }
    });
});

// $('.loca_tion').on('change', function() {
//     var location_name = $(this).find(":selected").text();
//     $.ajax({
//         type: "POST",
//         url: "<=--?php echo admin_url('admin-ajax.php'); ?>",
//         data: {
//             action: "location_post_redirect",
//             location_name: location_name,
//         },
//         success: function(response) {
//             window.location.href = response;
//         }
//     });
// });


$(document).ready(function() {
    $('body').find('.ap-select2-design select').each(function() {
        dropdownParent = $(this).parent();
        $(this).select2({
            dropdownParent: dropdownParent,
            minimumResultsForSearch: -1
        });
    })

    $('.mega-menu.max-mega-menu > li:nth-child(1) a, .mega-menu.max-mega-menu > li:nth-child(2) a')
        .click(function(e) {
            e.stopPropagation();
            $('body').toggleClass('header-dark');
        })
    $("body").click(function(e) {
        e.stopPropagation();
        $(this).removeClass("header-dark");
        // $('.mega-menu-item').removeClass("mega-toggle-on");
    })



    // on 09 August - for pre populated contact enquiry input from meeting rooms pages 
    // start
    var pageUrl = window.location.href;
    var cond = window.location.pathname == '/sg/contact-us/' || window.location.pathname == '/au/contact-us/' || window.location.pathname == '/tw/contact-us/' || window.location.pathname == '/th/contact-us/' || window.location.pathname == '/kr/contact-us/' || window.location.pathname == '/jp/contact-us/' || window.location.pathname == '/id/contact-us/' || window.location.pathname == '/cn/contact-us/' || window.location.pathname == '/tw/en/contact-us/' || window.location.pathname == '/th/en/contact-us/' || window.location.pathname == '/kr/en/contact-us/' || window.location.pathname == '/jp/en/contact-us/' || window.location.pathname == '/id/en/contact-us/' || window.location.pathname == '/cn/en/contact-us/';
    
    if (cond) {
        let repEnqCU = sessionStorage.getItem("repEnq");
        if (typeof repEnqCU !== 'undefined' && repEnqCU !== null){
            var dsfdr = $('#enquiry select option:eq(3)').text();
            $('#enquiry select option:eq(3)').attr('selected', 'selected');
            $("#enquiry .select2-selection__rendered").attr("title", dsfdr)
            $("#enquiry .select2-selection__rendered").text(dsfdr)
        }
    }
    
    if(pageUrl.search("meeting-rooms") == -1){
        sessionStorage.removeItem("repEnq");
    } else{
        $("#event_space_custom").click(function(){
            sessionStorage.setItem("repEnq", "yes");
        })
    }
    // ends


})

 $(".landing-page-book").click(function() {
	$("div#bookTour").css({
		"top": "91px",
		"height": "calc(100vh-91px)"
	})
});
$('#prefered__time__office__tour').select2({
  placeholder: 'Select an option',
  dropdownParent: $('.pc_dd')
});
$('#prefered__centre__office__tour').select2({
  placeholder: 'Select an option',
  dropdownParent: $('.pt_dd')
});
$('#enquiry__purpose__git').select2({
  placeholder: 'Select an option',
  dropdownParent: $('.epg')
});
</script>


</body>

</html>