<?php
if (!defined('_JN_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_JN_VERSION', '1.0.16');
}
if (!function_exists('justco_theme_setup')) :
    /**z
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function justco_theme_setup()
    {
        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        // Logo support
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array('site-title', 'site-description'),
            'unlink-homepage-logo' => false,
        );

        add_theme_support('custom-logo', $defaults);

        /**
         * Enqueue scripts and styles.
         */

        function justco_scripts()
        {
            wp_enqueue_style('justco-style', get_stylesheet_uri(), array(), _JN_VERSION);
            wp_enqueue_style('justco-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-openSans-style', get_template_directory_uri() . '/assets/fonts/open-sans/stylesheet.css', false, _JN_VERSION, 'all');

            // owl and slick both are linked use one of them at once 
            // wp_enqueue_style('justco-owl-style', get_template_directory_uri() . '/assets/css/owl/owl-carousel-v2..3.4.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-slick-style', get_template_directory_uri() . '/assets/css/slick/slick-1.8.1.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-select2-style', get_template_directory_uri() . '/assets/css/select2/select2.min.css', false, _JN_VERSION, 'all');
            
            wp_enqueue_style('justco-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', false, _JN_VERSION, 'all');

            wp_enqueue_style('justco-latest-theme-style', get_template_directory_uri() . '/assets/css/latest-custom-style.css', false, _JN_VERSION, 'all');

            wp_enqueue_script('justco-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true);
            wp_enqueue_script('justco-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true);

            // owl and slick both are linked use one of them at once  
            // wp_enqueue_script('justco-owl-script', get_template_directory_uri() . '/assets/js/owl/owl-carousel-v2.3.4.min.js', array(), _JN_VERSION, true);
            wp_enqueue_script('justco-slick-script', get_template_directory_uri() . '/assets/js/slick/slick-1.8.1.js', array(), _JN_VERSION, true);
            wp_enqueue_script('justco-select2-script', get_template_directory_uri() . '/assets/js/select2/select2.min.js', array(), _JN_VERSION, true);
            
            wp_enqueue_script('justco-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true);
            wp_enqueue_script('justco-latest-theme-script', get_template_directory_uri() . '/assets/js/latest-function.js', array(), _JN_VERSION, true);


            //	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            //		wp_enqueue_script( 'comment-reply' );
            //	}
        }
        add_action('wp_enqueue_scripts', 'justco_scripts');

        function register_TM_menu()
        {
            register_nav_menu('header-menu_sg', __('sg_menu'));
            register_nav_menu('header-menu_au', __('au_menu'));
            register_nav_menu('header-menu_cn', __('cn_menu'));
            register_nav_menu('header-menu_cn_en', __('cn_en_menu'));
            register_nav_menu('header-menu_id', __('id_menu'));
            register_nav_menu('header-menu_id_en', __('id_en_menu'));
            register_nav_menu('header-menu_jp', __('jp_menu'));
            register_nav_menu('header-menu_jp_en', __('jp_en_menu'));
            register_nav_menu('header-menu_kr', __('kr_menu'));
            register_nav_menu('header-menu_kr_en', __('kr_en_menu'));
            register_nav_menu('header-menu_tw', __('tw_menu'));
            register_nav_menu('header-menu_tw_en', __('tw_en_menu'));
            register_nav_menu('header-menu_th', __('th_menu'));
            register_nav_menu('header-menu_th_en', __('th_en_menu'));
            register_nav_menu('header-menu_staging', __('staging_header_menu'));
            register_nav_menu('header-menu_staging_bottom', __('staging_header_menu_bottom'));
            register_nav_menu('footer-menu_staging_first', __('staging_footer_menu_first'));
            register_nav_menu('footer-menu_staging_second', __('staging_footer_menu_second'));
            register_nav_menu('footer-menu_staging_third', __('staging_footer_menu_third'));
            register_nav_menu('footer-menu_staging_fourth', __('staging_footer_menu_fourth'));
        }

        add_action('init', 'register_TM_menu');
    }
endif;

add_action('after_setup_theme', 'justco_theme_setup');

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/* Create Shortcode for custom form Contact */
function contactform_shortcode()
{
    include 'inc/justco-cf/contact.php';
}
add_shortcode('CustomForm', 'contactform_shortcode');

function newsletterform_shortcode()
{
    include 'inc/justco-cf/newsletter.php';
}
add_shortcode('NewsletterForm', 'newsletterform_shortcode');

function booktourform_shortcode()
{
    include 'inc/justco-cf/book-a-tour.php';
}
add_shortcode('BookTourForm', 'booktourform_shortcode');

function locationfilter_shortcode()
{
    include 'inc/justco-cf/location_filter.php';
}
add_shortcode('LocationFilter', 'locationfilter_shortcode');

function meetingfilter_shortcode()
{
    include 'inc/justco-cf/meeting_filter.php';
}
add_shortcode('MeetingFilter', 'meetingfilter_shortcode');

function locationpagefilter_shortcode()
{
    include 'inc/justco-cf/locationpage_filter.php';
}
add_shortcode('LocationpageFilter', 'locationpagefilter_shortcode');

function workspace_content()
{
    include 'inc/workspace-content.php';
}
add_shortcode('workspace-content', 'workspace_content');

function homepage_location_slider()
{
    include 'inc/shortcodes.php';
}
add_shortcode('location-slider', 'homepage_location_slider');
// function location_listings()
// {
//   include 'inc/shortcodes.php';
// }
// add_shortcode('location-listings', 'location_listings');

//Register Metting Room Custom Post in Function.php

require 'inc/custom_posts.php';
require 'inc/sidebars.php';


function meeting_post_country()
{
    $country_code = $_POST['city_val'];
    $language_code = $_POST['language_code'];

    if($language_code == "en" && $language_code != "" && $country_code != "cn"){
        $person_text = "Any Number";
        $district_text = "All District";
        $district_default = "District";
        $person_default = "Number of Persons";
        $enquire_btn = "ENQUIRE NOW";
    }else{
        if($country_code == "au" || $country_code == "sg"){
            $person_text = "Any Number";
            $district_text = "All District";
            $district_default = "District";
            $person_default = "Number of Persons";
            $enquire_btn = "ENQUIRE NOW";
        }else if($country_code == "id"){
            $person_text = "Semua";
            $district_text = "Semua";
            $district_default = "Distrik/Area";
            $person_default = "Jumlah Orang";
            $enquire_btn = "Hubungi Kami";
        }else if($country_code == "jp"){
            $person_text = "Any Number";
            $district_text = "All District";
            $district_default = "地区/エリア";
            $person_default = "収容人数";
            $enquire_btn = "お問い合わせ";
        }else if($country_code == "th"){
            $person_text = "ไม่ระบุ";
            $district_text = "ทุกอำเภอ";
            $district_default = "เขต/พื้นที่";
            $person_default = "จำนวนคน";
            $enquire_btn = "สนใจ";
        }else if($country_code == "cn" && $language_code != "en"){
            $person_text = "任何人数";
            $district_text = "地区/区域";
            $district_default = "地区/区域";
            $person_default = "办公人数";
            $enquire_btn = "立即咨询";
        }else if($country_code == "cn" && $language_code == "en"){
            $district_default = "District/Area";
            $person_text = "Any Number";
            $district_text = "All District";
            $person_default = "Number of Persons";
            $enquire_btn = "ENQUIRE NOW";
        }else if($country_code == "kr"){
            $person_text = "모든";
            $district_text = "모든";
            $district_default = "지역";
            $person_default = "사용인원";
            $enquire_btn = "문의 하기";
        }else if($country_code == "tw"){
            $person_text = "任何人数";
            $district_text = "行政區域";
            $district_default = "行政區域";
            $person_default = "人數";
            $enquire_btn = "立即諮詢";
        }
    }

    $response = '';
    $response_p = '';

    global $wpdb;
    $wpdb_prefix = $wpdb->prefix;
    $table_name = $wpdb_prefix . "countries_code";
    $country_id = $_POST['country_id'];
    $country_fullname = $_POST['country_fullname'];

    if($language_code == "en"){
       $District_main =  $country_fullname."-".$country_code."-".$language_code;
    }else{
        $District_main = $country_fullname."-".$country_code;
    }
    
    $term = get_term_by( 'slug', $District_main, "district" ); 
    $district_termchildren = get_term_children($term->term_id, "district" );
    // echo "<pre>"; print_r($district_termchildren); echo "</pre>"; die();

    $term1 = get_term_by( 'slug', $District_main, "meeting-person" ); 
    $person_termchildren = get_term_children($term1->term_id, "meeting-person" );


    $response .= '<div class="field ap-select2-design dist">
    <select class="select-header workspace" name="workspace" required>
    <option value="">'.$district_default.'</option>
    <option value="All">'.$district_text.'</option>';
    foreach($district_termchildren as $district_child){

        $term_district = get_term_by( 'id', $district_child, "district" ); 
        $response .= '<option value="'.$term_district->term_id.'">'.$term_district->name.'</option>';
    }
    $response .= '</select>
    </div>';

    $response_p .= '<div class="field ap-select2-design person_select">
    <select class="select-header number_of_person" name="number_of_person" required>
    <option value="">'.$person_default.'</option>
    <option value="All">'.$person_text.'</option>';
    foreach($person_termchildren as $person_child){

        $term_person = get_term_by( 'id', $person_child, "meeting-person" ); 
        $response_p .= '<option value="'.$term_person->term_id.'">'.$term_person->name.'</option>';
    }
    $response_p .= '</select>
    </div>';

    $html = '';
    $query = get_posts(array(
        'post_type' => 'meeting',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'location',
                'field' => 'term_id',
                'terms' => $_POST['country_id'],
            ),
        )
    ));

    $result = new WP_Query($query);
    $count = count($result->query);
    $viewing = 'Viewing <span class="js-centres-count">' . $count . '</span> meeting rooms in <span class="js-selected-location">' . $country_fullname . '</span>';
    if ($country_code == "id" && $language_code != "en"){
        $viewing = 'Menampilkan <span class="js-centres-count">' . $count . '</span> Tempat Kerja di <span class="js-selected-location">' . $country_fullname . '</span>';
    }
    if ($country_code == "kr" && $language_code != "en"){
        $viewing = '한국 서울에 있는 <span class="js-centres-count">' . $count . '</span>개의 센터';
    }
    if ($country_code == "cn" && $language_code != "en"){
        $viewing = '查看中国，上海的<span class="js-centres-count">' . $count . '</span>处据点';
    }

    if ($country_code == "tw" && $language_code != "en"){
        $viewing = '查看<span class="js-selected-location">' . $country_fullname . '</span>的<span class="js-centres-count">' . $count . '</span>處據點';
    }

    $html .= '<div class="d-flex meeting_room_results">
<div class="list-wrapper-meeting">
    <span class="results">' . $viewing . '</span>
    <div class="list-outer-meeting">';

    if ($result->have_posts()) {
        foreach ($result->query as $res) {
            $locationpost_ID = $res->ID;
            $charges = get_field("charges", $locationpost_ID);
            $people = get_field("people", $locationpost_ID);
            $room_type = get_field("room_type", $locationpost_ID);
            $whiteboard = get_field("whiteboard", $locationpost_ID);
            $tv = get_field("tv", $locationpost_ID);
            $blinds = get_field("blinds", $locationpost_ID);

            $location_image = wp_get_attachment_image_src(get_post_thumbnail_id($locationpost_ID), 'single-post-thumbnail');

            $html .= '<div class="list-item-meetings">
            <div class="list-item-meetings-inner">
                <div class="list-img">
                    <img src="' . $location_image[0] . '" alt="" class="img-fluid">
                </div>
                <div class="list-text">
                    <h4>' . $res->post_title . '</h4>
                    <p>' . $res->post_content . '</p>
                    <ul>
                <li>
                    <span class="icon">
                    <img src="/wp-content/uploads/2022/06/sdg-icon.png" alt="">
                    </span>' . $charges . '
                </li>
                <li>
                    <span class="icon">
                    <img src="/wp-content/uploads/2022/06/people-icon.svg" alt="">
                    </span>' . $people . '
                </li>';
				if($room_type != "Choose Room Type"){
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/room-icon.png" alt="">
                    </span>' . $room_type . '
                </li>';
				}
            if ($whiteboard != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/whiteboard-icon.png" alt="">
                    </span>'.$whiteboard.'
                    
                </li>';
            }
            if ($tv != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/screen-icon.png" alt="">
                    </span>'.$tv.'
                    
                </li>';
            }
            if ($blinds != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/blind-icon.png" alt="">
                    </span>'.$blinds.'
                    
                </li>';
            }
            $html .= '</ul>
                <div class="enq-button">
                <button>'.$enquire_btn.'</button>
                </div>
                </div></div></div>';
        }
    }
    $html .= '</div></div></div>';
    
$response_arr['res'] = array($response);
$html_arr['html'] = array($html);
$responsep_arr['resp'] = array($response_p);
$final_res = array_merge($html_arr,$response_arr,$responsep_arr);
echo json_encode($final_res);
    wp_die();
}

add_action('wp_ajax_nopriv_meeting_post_country', 'meeting_post_country');
add_action('wp_ajax_meeting_post_country', 'meeting_post_country');



function meeting_post_workspace()
{
    $country_name = $_POST['country_name'];
    $country_code = $_POST['city_val'];
    $language_code = $_POST['language_code'];

    if($language_code == "en" && $language_code != ""){
        $enquire_btn = "ENQUIRE NOW";
    }else{
        if($country_code == "au" || $country_code == "sg"|| $country_code == "en"){
            $enquire_btn = "ENQUIRE NOW";
        }else if($country_code == "id"){
            $enquire_btn = "Hubungi Kami";
        }else if($country_code == "jp"){
            $enquire_btn = "お問い合わせ";
        }else if($country_code == "th"){
            $enquire_btn = "สนใจ";
        }else if($country_code == "cn" || $country_code == "tw"){
            $enquire_btn = "立即咨询";
        }else if($country_code == "kr"){
            $enquire_btn = "문의 하기";
        }
    }


    $html = '';
    $tax_query = array('relation' => 'AND');
    if ($_POST['workspace_id'] != "All"){
        $tax_query[] =  array(
            'taxonomy' => 'district',
            'field' => 'term_id',
            'terms' => $_POST['workspace_id'],
        );
    }
    if (isset($_POST['country_id'])){
        $tax_query[] =  array(
            'taxonomy' => 'location',
            'field' => 'term_id',
            'terms' => $_POST['country_id'],
        );
    }
    $query = get_posts(array(
        'post_type' => 'meeting',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => $tax_query,
    ));


    $result = new WP_Query($query);

    // echo "<pre>"; print_r($query); echo "<pre>"; die();

    $count = count($result->query);

    $viewing = 'Viewing <span class="js-centres-count">' . $count . '</span> meeting rooms in <span class="js-selected-location">' . $country_name . '</span>';
    if ($country_code == "id" && $language_code != "en"){
        $viewing = 'Menampilkan <span class="js-centres-count">' . $count . '</span> Tempat Kerja di <span class="js-selected-location">' . $country_name . '</span>';
    }
    if ($country_code == "kr" && $language_code != "en"){
        $viewing = '한국 서울에 있는 <span class="js-centres-count">' . $count . '</span>개의 센터';
    }
    if ($country_code == "cn" && $language_code != "en"){
        $viewing = '查看中国，上海的<span class="js-centres-count">' . $count . '</span>处据点';
    }

    if ($country_code == "tw" && $language_code != "en"){
        $viewing = '查看<span class="js-selected-location">' . $country_name . '</span>的<span class="js-centres-count">' . $count . '</span>處據點';
    }

    $html .= '<div class="d-flex meeting_room_results">
<div class="list-wrapper-meeting">
    <span class="results">' . $viewing . '</span>
    <div class="list-outer">';

    if ($result->have_posts()) {
        foreach ($result->query as $res) {
            $locationpost_ID = $res->ID;
            $charges = get_field("charges", $locationpost_ID);
            $people = get_field("people", $locationpost_ID);
            $room_type = get_field("room_type", $locationpost_ID);
            $whiteboard = get_field("whiteboard", $locationpost_ID);
            $tv = get_field("tv", $locationpost_ID);
            $blinds = get_field("blinds", $locationpost_ID);

            $location_image = wp_get_attachment_image_src(get_post_thumbnail_id($locationpost_ID), 'single-post-thumbnail');

            $html .= '<div class="list-item-meetings">
            <div class="list-item-meetings-inner">
                <div class="list-img">
                    <img src="' . $location_image[0] . '" alt="" class="img-fluid">
                </div>
                <div class="list-text">
                    <h4>' . $res->post_title . '</h4>
                    <p>' . $res->post_content . '</p>
                    <ul>
                <li>
                    <span class="icon">
                    <img src="/wp-content/uploads/2022/06/sdg-icon.png" alt="">
                    </span>' . $charges . '
                </li>
                <li>
                    <span class="icon">
                    <img src="/wp-content/uploads/2022/06/people-icon.svg" alt="">
                    </span>' . $people . '
                </li>
                <li>';
				if($room_type != "Choose Room Type"){
                $html .= '<span class="icon">
                <img src="/wp-content/uploads/2022/06/room-icon.png" alt="">
                    </span>' . $room_type . '
                </li>';
				}
            if ($whiteboard != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/whiteboard-icon.png" alt="">
                    </span>'.$whiteboard.'
                    
                </li>';
            }
            if ($tv != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/screen-icon.png" alt="">
                    </span>'.$tv.'
                    
                </li>';
            }
            if ($blinds != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/blind-icon.png" alt="">
                    </span>'.$blinds.'
                    
                </li>';
            }
            $html .= '</ul>
                <div class="enq-button">
                <button>'.$enquire_btn.'</button>
                </div>
                </div></div></div>';
            }
    }
    $html .= '</div>
</div>
</div>';

    print_r($html);
    wp_die();
}

add_action('wp_ajax_nopriv_meeting_post_workspace', 'meeting_post_workspace');
add_action('wp_ajax_meeting_post_workspace', 'meeting_post_workspace');

function meeting_post_person()
{
    $country_name = $_POST['country_name'];
    $country_code = $_POST['city_val'];
    $language_code = $_POST['language_code'];

    if($language_code == "en" && $language_code != ""){
        $enquire_btn = "ENQUIRE NOW";
    }else{
        if($country_code == "au" || $country_code == "sg"|| $country_code == "en"){
            $enquire_btn = "ENQUIRE NOW";
        }else if($country_code == "id"){
            $enquire_btn = "Hubungi Kami";
        }else if($country_code == "jp"){
            $enquire_btn = "お問い合わせ";
        }else if($country_code == "th"){
            $enquire_btn = "สนใจ";
        }else if($country_code == "cn" || $country_code == "tw"){
            $enquire_btn = "立即咨询";
        }else if($country_code == "kr"){
            $enquire_btn = "문의 하기";
        }
    }

    $html = '';

    $tax_query = array('relation' => 'AND');
    if ($_POST['person_id'] != "All"){
        $tax_query[] =  array(
            'taxonomy' => 'meeting-person',
            'field' => 'term_id',
            'terms' => $_POST['person_id'],
        );
    }
    if (isset($_POST['country_id'])){
        $tax_query[] =  array(
            'taxonomy' => 'location',
            'field' => 'term_id',
            'terms' => $_POST['country_id'],
        );
    }
    if ($_POST['workspace_id'] != "All"){
        $tax_query[] =  array(
            'taxonomy' => 'district',
            'field' => 'term_id',
            'terms' => $_POST['workspace_id'],
        );
    }
    $query = get_posts(array(
        'post_type' => 'meeting',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => $tax_query,
    ));

    // echo "<pre>"; print_r($query); echo "</pre>";
    $result = new WP_Query($query);
    $count = count($result->query);
    $viewing = 'Viewing <span class="js-centres-count">' . $count . '</span> meeting rooms in <span class="js-selected-location">' . $country_name . '</span>';
    if ($country_code == "id" && $language_code != "en"){
        $viewing = 'Menampilkan <span class="js-centres-count">' . $count . '</span> Tempat Kerja di <span class="js-selected-location">' . $country_name . '</span>';
    }
    if ($country_code == "kr" && $language_code != "en"){
        $viewing = '한국 서울에 있는 <span class="js-centres-count">' . $count . '</span>개의 센터';
    }
    if ($country_code == "cn" && $language_code != "en"){
        $viewing = '查看中国，上海的<span class="js-centres-count">' . $count . '</span>处据点';
    }

    if ($country_code == "tw" && $language_code != "en"){
        $viewing = '查看<span class="js-selected-location">' . $country_name . '</span>的<span class="js-centres-count">' . $count . '</span>處據點';
    }

    $html .= '<div class="d-flex meeting_room_results">
<div class="list-wrapper-meeting">
    <span class="results">' . $viewing . '</span>
    <div class="list-outer-meeting">';

    if ($result->have_posts()) {
        foreach ($result->query as $res) {
            $locationpost_ID = $res->ID;
            $charges = get_field("charges", $locationpost_ID);
            $people = get_field("people", $locationpost_ID);
            $room_type = get_field("room_type", $locationpost_ID);
            $whiteboard = get_field("whiteboard", $locationpost_ID);
            $tv = get_field("tv", $locationpost_ID);
            $blinds = get_field("blinds", $locationpost_ID);

            $location_image = wp_get_attachment_image_src(get_post_thumbnail_id($locationpost_ID), 'single-post-thumbnail');

            $html .= '<div class="list-item-meetings">
            <div class="list-item-meetings-inner">
                <div class="list-img">
                    <img src="' . $location_image[0] . '" alt="" class="img-fluid">
                </div>
                <div class="list-text">
                    <h4>' . $res->post_title . '</h4>
                    <p>' . $res->post_content . '</p>
                    <ul>
                <li>
                    <span class="icon">
                    <img src="/wp-content/uploads/2022/06/sdg-icon.png" alt="">
                    </span>' . $charges . '
                </li>
                <li>
                    <span class="icon">
                    <img src="/wp-content/uploads/2022/06/people-icon.svg" alt="">
                    </span>' . $people . '
                </li>';
				if($room_type != "Choose Room Type"){
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/room-icon.png" alt="">
                    </span>' . $room_type . '
                </li>';
				}
            if ($whiteboard != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/whiteboard-icon.png" alt="">
                    </span>'.$whiteboard.'
                    
                </li>';
            }
            if ($tv != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/screen-icon.png" alt="">
                    </span>'.$tv.'
                    
                </li>';
            }
            if ($blinds != "") {
                $html .= '<li>
                <span class="icon">
                <img src="/wp-content/uploads/2022/06/blind-icon.png" alt="">
                    </span>'.$blinds.'
                    
                </li>';
            }
            $html .= '</ul>
                <div class="enq-button">
                <button>'.$enquire_btn.'</button>
                </div>
                </div>
                
            </div>
        </div>';
        }
    }
    $html .= '</div>
</div>
</div>';

    print_r($html);
    wp_die();
}

add_action('wp_ajax_nopriv_meeting_post_person', 'meeting_post_person');
add_action('wp_ajax_meeting_post_person', 'meeting_post_person');

/* */
// function location_post_redirect(){
//     global $wpdb;
//     $wpdb_prefix = $wpdb->prefix;
//     $table_name1 = $wpdb_prefix . "countries_code";

//     $country_name = $_POST['location_name'];
//     $country_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE country_name = '$country_name'");
//     $country_code = $country_full[0]->country_code;
//     $country_name1 = $country_full[0]->country_name;

//     $link_text = explode(",", $country_name1);
//     $link_text_new = strtolower($link_text[1]);
//     $str = str_replace(' ','',$link_text_new);

//    echo  $full_link = '/'.$country_code.'/locations/'.$str.'/';

//     wp_die();
// }
// add_action('wp_ajax_nopriv_location_post_redirect', 'location_post_redirect');
// add_action('wp_ajax_location_post_redirect', 'location_post_redirect');


function center_post_city(){
    global $wpdb;
    $html ='';
    $wpdb_prefix = $wpdb->prefix;
    $table_name1 = $wpdb_prefix . "centers";
    
    
    $country_code = $_POST['country_code'];
    $lang_code = $_POST['lang_code'];

    $city_val = $_POST['city_val'];
    if($lang_code == 'meeting-rooms' && $country_code == '' && $lang_code == ''){
      $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE countrycode = '$country_code'");
    }else if($country_code != '' && $lang_code != ''){
      if($lang_code != "en" && ($country_code != "id" && $country_code != "au" && $country_code != "sg" && $country_code != "jp")){
          $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE countrycode = '$country_code' && language = '$country_code'");
      }else if($lang_code != "en" && ($country_code == "id" || $country_code == "au" || $country_code == "sg")){
          $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE countrycode = '$country_code' && language = 'en'");
      }else if($lang_code != "en" && $country_code == "jp"){
          $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE language = '$country_code' && city = '$city_val'");
      }else{
          $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE countrycode = '$country_code' && language = '$lang_code'");
      }
    }else{
        $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE city = '$city_val'");
    }
    
    
    $centers = $center_full[0]->center;
    $local_centers = $center_full[0]->local_center;

    $center_records = explode(",", $centers);
    $local_center_records = explode(",", $local_centers);
    $center_count = count($center_records);
    for($i=0; $i<=$center_count; $i++){
        if($center_records[$i] != ""){
            $html .='<option class="center_data" data-center="'.$local_center_records[$i].'" value="'.$center_records[$i].'">'.$center_records[$i].'</option>';
        }
    }
    print_r($html);
    wp_die();
}
add_action('wp_ajax_nopriv_center_post_city', 'center_post_city');
add_action('wp_ajax_center_post_city', 'center_post_city');


function center_post_district(){
    global $wpdb;
    $html ='';

    $district_val = $_POST['district_val'];
    $country_name = $_POST['country_fullname'];
    $country_code = $_POST['city_val'];
    $language_code = $_POST['language_code'];

    $query = get_posts(array(
        'post_type' => 'workspace',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'workspace-district',
                'field' => 'term_id',
                'terms' => $district_val,
            ),
        )
    ));
    $result = new WP_Query($query);
    $count = count($result->query);

    $viewing = 'Viewing <span class="js-centres-count">' . $count . '</span> Workspace(s) in <span class="js-selected-location">' . $country_name . '</span>';
    if ($country_code == "id" && $language_code != "en"){
        $viewing = 'Menampilkan <span class="js-centres-count">' . $count . '</span> Tempat Kerja di <span class="js-selected-location">' . $country_name . '</span>';
    }
    if ($country_code == "kr" && $language_code != "en"){
        $viewing = '한국 서울에 있는 <span class="js-centres-count">' . $count . '</span>개의 센터';
    }
    if ($country_code == "cn" && $language_code != "en"){
        $viewing = '查看中国，上海的<span class="js-centres-count">' . $count . '</span>处据点';
    }
    if ($country_code == "tw" && $language_code != "en"){
        $viewing = '查看<span class="js-selected-location">' . $country_name . '</span><span class="js-centres-count">' . $count . '</span>處據點';
    }

            $html .='<div class="list-outer-wrap d-flex district_main_area">
            <div class="list-wrapper">
                <span class="results">'.$viewing.'</span>
                <div class="list-outer">';
                    if ( $result->have_posts() ) {
                    foreach($result->query as $res){
                    $locationpost_ID = $res->ID;
                    $location_image = wp_get_attachment_image_src( get_post_thumbnail_id( $locationpost_ID ), 'single-post-thumbnail' );
                    $html .='<div class="list-item">
                        <a href="'.get_permalink( $locationpost_ID ).'">
                            <div class="list-img">
                                <img src="'.$location_image[0].'" alt="" class="img-fluid">
                            </div>
                            <div class="list-text">
                                <h4>'.$res->post_title.'</h4>
                                <p>'.$res->post_excerpt.'</p>
                            </div>
                        </a>
                    </div>';
                    }
                }
                $html .='</div>
            </div>';
			if($count > 0){
            $html .='<div class="map-wrapper">
                <div class="wrap-map">
                    <div class="map">
                        <a class="transparent-btn" href=""></a>
                            <div class="mapouter">
                            <div class="gmap_canvas">
                                <style>#map{height:100%}</style>
                                <div id="map"></div>
                                <style>.mapouter{position:relative;height:500px;width:600px;}</style>
                                <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;min-height:255px;}</style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
			}
        $html .='</div>';

        if($count > 0){
        $positions = array();
        foreach ($result->query as $res) {
            $locationpost_ID = $res->ID;
            $location_image = wp_get_attachment_image_src( get_post_thumbnail_id( $locationpost_ID ), 'single-post-thumbnail' );
            
            $latitude_pins = get_field( "latitude", $locationpost_ID );
            $longitude_pins = get_field( "longitude", $locationpost_ID );
        
            $latitude_var = floatval($latitude_pins);
            $longitude_var = floatval($longitude_pins);
            /* */
        
            $address = $res->post_excerpt;
        
            // echo "<pre>"; print_r($address); echo "</pre>";
            $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyDx4DPRPTmy8PiQUDzuvfGK3A_VUUmPcnw&address=".str_replace(" ", "+", $address)."&sensor=false";
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
            $responseJson = curl_exec($ch);
            curl_close($ch);
        
            $response = json_decode($responseJson);
        
            if ($response->status == 'OK') {

                if($latitude_pins != "" && $longitude_pins != ""){
                    $latitude = $latitude_var;
                    $longitude = $longitude_var;
                }else{
                    $latitude = $response->results[0]->geometry->location->lat;
                    $longitude = $response->results[0]->geometry->location->lng;
                }
        
                // echo "<pre>"; print_r($latitude); echo "</pre>";
                // echo "<pre>"; print_r($longitude); echo "</pre>";
                // echo "<br>";
        
                $positions[] = array(
                    'name' => $res->post_title,
                    'address' => $res->post_excerpt,
                    'image' => $location_image[0],
                    'lat' => $latitude,
                    'lng' => $longitude,
                );
            } else {
            }
        }
        ?>

<script type="text/javascript">
// Pin to use for map
var pinUrl = '/wp-content/themes/justCo/assets/images/map-pin.png';
// Positions for Singapore workspaces
var positions = <?php echo json_encode($positions); ?>;
</script>
<script type="text/javascript" src="/wp-content/themes/justCo/assets/js/locations.js"></script>
<script type="text/javascript" src="/wp-content/themes/justCo/assets/js/map.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx4DPRPTmy8PiQUDzuvfGK3A_VUUmPcnw&callback=initMap&v=weekly"
    async></script>
<?php }
    print_r($html);
    wp_die();
}
add_action('wp_ajax_nopriv_center_post_district', 'center_post_district');
add_action('wp_ajax_center_post_district', 'center_post_district');

function center_post_default(){
    global $wpdb;
    $html ='';
    $wpdb_prefix = $wpdb->prefix;
    $table_name1 = $wpdb_prefix . "centers";

    $country_code = $_POST['country_code'];
    $lang_code = $_POST['lang_code'];
    $center_name_custom = $_POST['center_name_custom'];

    if($lang_code != "en" && ($country_code != "id" && $country_code != "au" && $country_code != "sg")){
        $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE countrycode = '$country_code' && language = '$country_code'");
    }else if($lang_code != "en" && ($country_code == "id" || $country_code == "au" || $country_code == "sg")){
        $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE countrycode = '$country_code' && language = 'en'");
    }else{
        $center_full = $wpdb->get_results("SELECT * FROM $table_name1 WHERE countrycode = '$country_code' && language = '$lang_code'");
    }

    $centers = $center_full[0]->center;

    $center_records = explode(",", $centers);
    
    foreach($center_records as $center_rec){
        if($center_name_custom == $center_rec){
            $selecttrue = "selected";
        }else{
            $selecttrue = "";
        }
         $html .='<option class="center_data" value="'.$center_rec.'" "'.$selecttrue.'">'.$center_rec.'</option>';
    }
    print_r($html);
    wp_die();
}
add_action('wp_ajax_nopriv_center_post_default', 'center_post_default');
add_action('wp_ajax_center_post_default', 'center_post_default');


/* */
function connect_another_db() {
    global $seconddb;
    $seconddb = new wpdb(CRM_USERNAME, CRM_PASSWORD, CRM_DATABASE_NAME, CRM_HOSTNAME);
}
add_action('init', 'connect_another_db');

/* Hook on contact form 7 mail sent from landing pages */

add_action('wpcf7_before_send_mail', 'wpcf7_before_send_mail_function');
function wpcf7_before_send_mail_function($contact_form){
    global $seconddb;
    global $wpdb;

    $contact_table = $wpdb->prefix . "jc_crm_web_enquiry";
    $form_id  = $contact_form->id();
    if($form_id == 16979 || $form_id == 18088 || $form_id == 17610 || $form_id == 18048 || $form_id == 17986 || $form_id == 18053 || $form_id == 17184 || $form_id == 17539 || $form_id == 16857 || $form_id == 17585 || $form_id == 18127 || $form_id == 17800 || $form_id == 17995 || $form_id == 18041 || $form_id == 17274 || $form_id == 17593 || $form_id == 17868 || $form_id == 17947 || $form_id == 17738 || $form_id == 17841 || $form_id == 17891 || $form_id == 17100 || $form_id == 18139 || $form_id == 18185 || $form_id == 17474 || $form_id == 21137 || $form_id == 21219 || $form_id == 21231 || $form_id == 21037 || $form_id == 21228 || $form_id == 21153 || $form_id == 22251  || $form_id == 23528  || $form_id == 23518  || $form_id == 23367  || $form_id == 23366  || $form_id == 23404 || $form_id == 23607 || $form_id == 23611 || $form_id == 24814 || $form_id == 22578 || $form_id == 22640 || $form_id == 21471 || $form_id == 21664 || $form_id == 21598 || $form_id == 21643 || $form_id == 21569 || $form_id == 21725 || $form_id == 21516 || $form_id == 21304 || $form_id == 21349 || $form_id == 21300 || $form_id == 25672 || $form_id == 25856 || $form_id == 26252 || $form_id == 26232 || $form_id == 26259 || $form_id == 26395 || $form_id == 26417 || $form_id == 26501 || $form_id == 26522 || $form_id == 26535 || $form_id == 26527 || $form_id == 26665 || $form_id == 26806 || $form_id == 26996 || $form_id == 26971 || $form_id == 27019 || $form_id == 27095 || $form_id == 27478 || $form_id == 27484 || $form_id == 27427 || $form_id == 27431 || $form_id == 27941 || $form_id == 27952 || $form_id == 26469 || $form_id == 24772 || $form_id == 23598 || $form_id == 26009 || $form_id == 25542 || $form_id == 25988 || $form_id == 23234 || $form_id == 26434 || $form_id == 28026 || $form_id == 28101 || $form_id == 28205 || $form_id == 28215 || $form_id == 28877 || $form_id == 28293 || $form_id == 29394 || $form_id == 29510 || $form_id == 30900 || $form_id == 31194 || $form_id == 31526 || $form_id == 31514 || $form_id == 31728 || $form_id == 31711 || $form_id == 32077 || $form_id == 32220 || $form_id == 32164 || $form_id == 32369 || $form_id == 32856 || $form_id == 32863 || $form_id == 32931 || $form_id == 32932 || $form_id == 34524 || $form_id == 34562 || $form_id == 34948 || $form_id == 34932 || $form_id == 34960 || $form_id == 34893 || $form_id == 34895 || $form_id == 35199 || $form_id == 35323 || $form_id == 35347 || $form_id == 35359 || $form_id == 36241 || $form_id == 36237 || $form_id == 36433 || $form_id == 36574 || $form_id == 36538 || $form_id == 36846 || $form_id == 36853 || $form_id == 37026 || $form_id == 37714 || $form_id == 37779 || $form_id == 37860 || $form_id == 37847 || $form_id == 37882 || $form_id == 38139 || $form_id == 38152 || $form_id == 38741 || $form_id == 38858 || $form_id == 38844 || $form_id == 38875 || $form_id == 39163 || $form_id == 39173 || $form_id == 39438 || $form_id == 39645 || $form_id == 39649 || $form_id == 39912 || $form_id == 39921 || $form_id == 40401 || $form_id == 40459 || $form_id == 40473 || $form_id == 40533 || $form_id == 41047 || $form_id == 41160 || $form_id == 41166 || $form_id == 41593 || $form_id == 41783 || $form_id == 42817 || $form_id == 43061 || $form_id == 43902 || $form_id == 43913 || $form_id == 44700 || $form_id == 44701 || $form_id == 44769 || $form_id == 44780 || $form_id == 45009){
        if(isset($_POST['firstname'])){
	        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
            $lastname  = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        }else if(!isset($_POST['firstname']) && isset($_POST['fullname'])){
            $firstname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
            $lastname  = '';
        } 

        if(isset($_POST['phone-cf7it-national'])){
	        $phone = isset($_POST['phone-cf7it-national']) ? $_POST['phone-cf7it-national'] : '';
        }else if(!isset($_POST['phone-cf7it-national']) && isset($_POST['phone'])){
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        }
        
        $email  = isset($_POST['email']) ? $_POST['email'] : '';

		if($form_id == 27427){
			$city_local = isset($_POST['city']) ? $_POST['city'] : '';
			if($city_local == "台北"){
				$city = "Taipei";
			}else if($city_local == "新竹"){
				$city = "Hsinchu";
			}
		}else{
			$city = isset($_POST['city']) ? $_POST['city'] : '';
		}
        $company_name = isset($_POST['company']) ? $_POST['company'] : '';
        $comment = isset($_POST['message']) ? $_POST['message'] : '';
		if($form_id == 21137 || $form_id == 21219 || $form_id == 21231 || $form_id == 21037 || $form_id == 21228 || $form_id == 21304 || $form_id == 21349 || $form_id == 21300 || $form_id == 21153){
			$formtype = 'Upcoming Events Booking Form';
		}else if($form_id == 23404 || $form_id == 23611 || $form_id == 23607){
			$formtype = isset($_POST['form_type']) ? $_POST['form_type'] : 'Visa Partnership Booking Form';
		}else{
			$formtype = isset($_POST['form_type']) ? $_POST['form_type'] : 'Landing Page Booking Form';
		}
        // $formtype = isset($_POST['form_type']) ? $_POST['form_type'] : 'Landing Page Booking Form';
        $country = isset($_POST['country_code']) ? $_POST['country_code'] : '';
        $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
        $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';
        $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
        $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
        $utm_term = isset($_POST['utm_term']) ? $_POST['utm_term'] : '';
        $utm_solution = isset($_POST['utm_solution']) ? $_POST['utm_solution'] : '';
        $utm_objective = isset($_POST['utm_objective']) ? $_POST['utm_objective'] : '';
        $utm_asset = isset($_POST['utm_asset']) ? $_POST['utm_asset'] : '';
        $utm_agency = isset($_POST['utm_agency']) ? $_POST['utm_agency'] : '';
        $page_type = isset($_POST['page_type']) ? $_POST['page_type'] : '';

        $center = isset($_POST['centre']) ? $_POST['centre'] : '';
        $team_size = isset($_POST['team-size']) ? $_POST['team-size'] : '';
        $moveindate = isset($_POST['moveindate']) ? $_POST['moveindate'] : '';

        $name = $firstname ." ". $lastname;
        $ip = $_SERVER['REMOTE_ADDR'];
        $created_on = date("Y-m-d h:i:s");
        $Preferred_Language = isset($_POST['Preferred_Language']) ? $_POST['Preferred_Language'] : '';

        $jmsg_referrer_name = isset($_POST['jmsg_referrer_name']) ? $_POST['jmsg_referrer_name'] : '';
        $jmsg_referrer_company = isset($_POST['jmsg_referrer_company']) ? $_POST['jmsg_referrer_company'] : '';
        $jmsg_referrer_email = isset($_POST['jmsg_referrer_email']) ? $_POST['jmsg_referrer_email'] : '';
        $jmsg_referrer_phone = isset($_POST['jmsg_referrer_phone']) ? $_POST['jmsg_referrer_phone'] : '';
        
        $landing_pages_form = $wpdb->insert($contact_table, array(
        'JC_CRM_Web_Enquiry_Name' => $name,
        'JC_CRM_Web_Enquiry_Email' => $email,
        'JC_CRM_Web_Enquiry_Telephone' => $phone,
        'JC_CRM_Web_Enquiry_Country' => $city,
        'JC_CRM_Web_Enquiry_Company' => $company_name,
        'JC_CRM_Web_Enquiry_IP' => $ip,
        'Posted_type' => $formtype,
        'Moveindate' => $moveindate,
        'Created_By' => $name,
        'Created_On' => $created_on,
        'JC_CRM_Web_Enquiry_Message' => $comment,
        'UTM_campaign' => $utm_campaign,
        'UTM_source' => $utm_source,
        'UTM_medium' => $utm_medium,
        'UTM_content' => $utm_content,
        'utm_term' => $utm_term,
        'utm_agency' => $utm_agency,
        'utm_asset' => $utm_asset,
        'utm_objective' => $utm_objective,
        'utm_solution' => $utm_solution,
        'JC_CRM_Web_Enquiry_referrer_name' => $jmsg_referrer_name,
        'JC_CRM_Web_Enquiry_referrer_company' => $jmsg_referrer_company,
        'JC_CRM_Web_Enquiry_referrer_email' => $jmsg_referrer_email,
        'JC_CRM_Web_Enquiry_referrer_phone' => $jmsg_referrer_phone,
        'JC_CRM_Web_Enquiry_Teamsize' => $team_size,
        'JC_CRM_Web_Enquiry_Location' => $center,
        'JC_CRM_Web_Enquiry_Page' => $page_type,
        'JC_CRM_Web_Enquiry_Status' => 0
        ));

        $landing_pages_jforce = $seconddb->insert("JC_CRM_Web_Enquiry", array(
        'JC_CRM_Web_Enquiry_Name' => $name,
        'JC_CRM_Web_Enquiry_Email' => $email,
        'JC_CRM_Web_Enquiry_Telephone' => $phone,
        'JC_CRM_Web_Enquiry_Country' => $city,
        'JC_CRM_Web_Enquiry_Company' => $company_name,
        'JC_CRM_Web_Enquiry_IP' => $ip,
        'Posted_type' => $formtype,
        'Moveindate' => $moveindate,
        'Created_By' => $name,
        'Created_On' => $created_on,
        'JC_CRM_Web_Enquiry_Message' => $comment,
        'UTM_campaign' => $utm_campaign,
        'UTM_source' => $utm_source,
        'UTM_medium' => $utm_medium,
        'UTM_content' => $utm_content,
        'utm_term' => $utm_term,
        'utm_agency' => $utm_agency,
        'utm_asset' => $utm_asset,
        'utm_objective' => $utm_objective,
        'utm_solution' => $utm_solution,
        'JC_CRM_Web_Enquiry_Teamsize' => $team_size,
        'JC_CRM_Web_Enquiry_Location' => $center,
        'JC_CRM_Web_Enquiry_Page' => $page_type,
        'JC_CRM_Web_Enquiry_Status' => 0
        ));

    }
}


/* Create Shortcode */
function testimonial_shortcode()
{
    include 'inc/justco-cf/testimonial_shortcode.php';
}
add_shortcode('testimonial', 'testimonial_shortcode');


/* Create Shortcode */
function signevents_shortcode()
{
    include 'inc/justco-cf/signevents_shortcode.php';
}
add_shortcode('signature_events', 'signevents_shortcode');

function pastevents_shortcode()
{
    include 'inc/justco-cf/pastevents_shortcode.php';
}
add_shortcode('past_events', 'pastevents_shortcode');

function timeLine_shortcode()
{
    include 'inc/justco-cf/timeline.php';
}
add_shortcode('timeline', 'timeLine_shortcode');

/* Dev Form Shortcodes */

function get_inTouch_shortcode()
{
    include 'inc/justco-cf/getintouch.php';
}
add_shortcode('getinTouch', 'get_inTouch_shortcode');

function office_tour_shortcode()
{
    include 'inc/justco-cf/officetour.php';
}
add_shortcode('officeTour', 'office_tour_shortcode');

/* Dev Form Shortcodes Ends*/

/**
 * Admin Style.
 */
require get_template_directory() . '/inc/admin_css.php';

// Remove <p> and <br/> from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpseo_robots', 'yoast_no_home_noindex', 999);
function yoast_no_home_noindex($string= "") {
    if (is_archive()) {
        $string= "noindex,nofollow";
    }
    return $string;
}


// disbale XML-RPC Protocol
add_filter('xmlrpc_enabled', '__return_false');




// added by tm as on 13-07-2023

/**
 * customizer
 */
require get_template_directory() . '/inc/customizer.php';

//=================================================================
// Add Logo Uploader to the Existing Site Title Section
//=================================================================
function justco_theme_customizer_options($wp_customize){
    $wp_customize->add_setting( 'justco_staging_logo', array(
		'default' => get_theme_file_uri(''), // Add Default Image URL 
		'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'justco_staging_logo_control', array(
		'label' => 'Staging header Logo',
		'priority' => 20,
		'section' => 'title_tagline',
		'settings' => 'justco_staging_logo',
		'button_labels' => array(// All These labels are optional
					'select' => 'Select Logo',
					'remove' => 'Remove Logo',
					'change' => 'Change Logo',
					)
    )));

}

add_action( 'customize_register', 'justco_theme_customizer_options' );


// added by mv for header
// add caret for submenus
function dynamicwp_menu_arrow($item_output, $item, $depth, $args) {
	if (in_array('menu-item-has-children', $item->classes)) {
		$arrow = '<button class="subMenuAngle"></button>'; // Change the class to your font icon
		$item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
	}
	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'dynamicwp_menu_arrow', 10, 4);


// for Staging footer
/**
 * Add a sidebar.
 */
function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer First', 'justco' ),
		'id'            => 'footer_first',
		'description'   => __( 'This is First Footer Widget.', 'justco' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Second', 'justco' ),
		'id'            => 'footer_second',
		'description'   => __( 'This is second Footer Widget.', 'justco' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Third', 'justco' ),
		'id'            => 'footer_third',
		'description'   => __( 'This is third Footer Widget.', 'justco' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Fourth', 'justco' ),
		'id'            => 'footer_fourth',
		'description'   => __( 'This is fourth Footer Widget.', 'justco' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

// latest-post-tabs-sc
require get_template_directory() . '/inc/sc/latest-post-tabs-sc.php';
// latest find suite sc
require get_template_directory() . '/inc/sc/find_suite_sc.php';

add_filter('icl_ls_languages', 'wpml_ls_filter');

function wpml_ls_filter($languages) {

   foreach ($languages as $lang_code => $language) {

       $mTempString = $languages[$lang_code]['url'];

       echo $mTempString; // HERE

       // If "tax" is found in that string, replace it with "" - remove it.
       if (strpos($mTempString, "tax") !== false) {

              $languages[$lang_code]['url'] = str_replace("tax", "", $mTempString);
       }

   }
return $languages;
}





#get_filtered_posts_fun defined here
function fetchPostUsingAjaxTabs()
{
	$dyn_obj = $_POST['obj'];
	$dyn_cat = $dyn_obj["cat"];
	$dyn_paged = $dyn_obj["paged"];
	$dyn_offset = $dyn_obj["offset"];

    $taxonomy = 'workspace-district';

    if($dyn_cat == "all"){
        $dyn_paged = '-1';
    }
	$ajaxposts = new WP_Query([
		'post_type' => 'workspace',
		// 'category_name' => $dyn_cat,
        // 'posts_per_page' => $dyn_paged,
        'offset'        => $dyn_offset,
        'orderby'    => 'ID',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => $dyn_paged, //initially 8 
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => array( $dyn_cat )
            )
        )
	]);
	
    
	$response = "";
    $centers = '';
	if($ajaxposts->have_posts()) {
        $positions = [];
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        
       
      
        
		
		$url = get_the_permalink();
		$postThumbUrl = get_the_post_thumbnail_url();
		$the_title = get_the_title();
		$the_excerpt = get_the_excerpt();
        $location = get_field('location', get_the_ID());
		
		$centers.='<div class="col-md-6 col-lg-4 col-xl-3">
			<div class="tab_card">
				<div class="img_box">
                    <a href="'. $url .'">
                        <img
                            src="'. $postThumbUrl .'"
                            class="card-img-top"
                            alt="'. $the_title .'"
                        />
                    </a>
				</div>
				<div class="detail">
                    <h4>
                        <a href="'. $url .'">' . $the_title .'</a>
                    </h4>
					<p class="card-text">
					'. $location .'
					</p>
				</div>
			</div>
		</div>';


		

   $locationpost_ID = get_the_ID();
        
    $location_image = wp_get_attachment_image_src( get_post_thumbnail_id( $locationpost_ID ), 'single-post-thumbnail' );
    $latitude_pins = get_field( "latitude", $locationpost_ID );
    $longitude_pins = get_field( "longitude", $locationpost_ID );

    $latitude_var = floatval($latitude_pins);
    $longitude_var = floatval($longitude_pins);
    // echo "<pre>"; print_r($latitude_pins); echo "</pre>";
    // echo "<pre>"; print_r($longitude_pins); echo "</pre>";
    /* */

    $address = trim($location);
    
    // echo "<pre>"; print_r($address); echo "</pre>";
    $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyDx4DPRPTmy8PiQUDzuvfGK3A_VUUmPcnw&address=".str_replace(" ", "+", $address)."&sensor=false";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
    $responseJson = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($responseJson);

    if ($response->status == 'OK') {

        if($latitude_pins != "" && $longitude_pins != ""){
            $latitude = $latitude_var;
            $longitude = $longitude_var;
        }else{
            $latitude = $response->results[0]->geometry->location->lat;
            $longitude = $response->results[0]->geometry->location->lng;
        }
        

        $positions []= [
            'name' => $the_title,
            'address' => $location,
            'image' => $location_image[0],
            'lat' => $latitude,
            'lng' => $longitude,
        ];
    } else {
    }
    
		endwhile;
        
       
        $map = '<div class="wrap-map"><div class="map">
            <a class="transparent-btn" href=""></a>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <div id="map"></div>
                </div>
            </div>
        </div></div>';
       

$mapscript.='<script type="text/javascript">
var pinUrl ="/wp-content/themes/justCo/assets/images/map-pin.png";
// Positions for Singapore workspaces
var positions = '.json_encode($positions).';
</script>
<script type="text/javascript" src="/wp-content/themes/justCo/assets/js/locations.js"></script>
<script type="text/javascript" src="/wp-content/themes/justCo/assets/js/map.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx4DPRPTmy8PiQUDzuvfGK3A_VUUmPcnw&callback=initMap&v=weekly"
    async></script>';

$response = array(
'centers' => $centers,
'map' => $map,
'mapscript' => $mapscript,
);
// header('Content-Type: application/json');
echo json_encode($response);
} else {
echo "0";
}

// echo $response;

exit;
}
add_action('wp_ajax_fetchPostUsingAjaxTabs', 'fetchPostUsingAjaxTabs');
add_action('wp_ajax_nopriv_fetchPostUsingAjaxTabs', 'fetchPostUsingAjaxTabs');