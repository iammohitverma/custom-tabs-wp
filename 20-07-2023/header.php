<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justco-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<?php
global $post;

session_start();
$utm_source = "";
$utm_medium = "";
$utm_campaign = "";
$utm_content = "";
if (isset($_REQUEST['utm_source']) && $_REQUEST['utm_source'] != ''){
	$utm_source = $_REQUEST['utm_source'];
	$_SESSION['justco_utm_source'] = $utm_source;
}else{
    $_SESSION['justco_utm_source'] = "";
}

if (isset($_REQUEST['utm_medium']) && $_REQUEST['utm_medium'] != ''){
	$utm_medium = $_REQUEST['utm_medium'];
	$_SESSION['justco_utm_medium'] = $utm_medium;
}else{
    $_SESSION['justco_utm_medium'] = "";
}

if (isset($_REQUEST['utm_campaign']) && $_REQUEST['utm_campaign'] != ''){
	$utm_campaign = $_REQUEST['utm_campaign'];
	$_SESSION['justco_utm_campaign'] = $utm_campaign;
}else{
    $_SESSION['justco_utm_campaign'] = "";
}

if (isset($_REQUEST['utm_content']) && $_REQUEST['utm_content'] != ''){
	$utm_content = $_REQUEST['utm_content'];
	$_SESSION['justco_utm_content'] = $utm_content;
}else{
    $_SESSION['justco_utm_content'] = "";
}

if (isset($_REQUEST['utm_term']) && $_REQUEST['utm_term'] != ''){
	$utm_term = $_REQUEST['utm_term'];
	$_SESSION['justco_utm_term'] = $utm_term;
}else{
    $_SESSION['justco_utm_term'] = "";
}

if (isset($_REQUEST['utm_solution']) && $_REQUEST['utm_solution'] != ''){
	$utm_solution = $_REQUEST['utm_solution'];
	$_SESSION['justco_utm_solution'] = $utm_solution;
}else{
    $_SESSION['justco_utm_solution'] = "";
}

if (isset($_REQUEST['utm_objective']) && $_REQUEST['utm_objective'] != ''){
	$utm_objective = $_REQUEST['utm_objective'];
	$_SESSION['justco_utm_objective'] = $utm_objective;
}else{
    $_SESSION['justco_utm_objective'] = "";
}

if (isset($_REQUEST['utm_asset']) && $_REQUEST['utm_asset'] != ''){
	$utm_asset = $_REQUEST['utm_asset'];
	$_SESSION['justco_utm_asset'] = $utm_asset;
}else{
    $_SESSION['justco_utm_asset'] = "";
}

if (isset($_REQUEST['utm_agency']) && $_REQUEST['utm_agency'] != ''){
	$utm_agency  = $_REQUEST['utm_agency'];
	$_SESSION['justco_utm_agency'] = $utm_agency;
}else{
    $_SESSION['justco_utm_agency'] = "";
}


$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$current_url = explode("/", $actual_link);

$current_country = $current_url[3];
$country_lang = $current_url[4];
$media_center = $current_url[5];


$language_url = str_replace("/en", "", $actual_link);
$language_url_slug = substr($actual_link, 0, strpos($actual_link, "/en"));
$language_url_new = $post->post_name;

$language_urls = str_replace(array("/".$current_country), array("/".$current_country . "/en"), $actual_link)."\n";

$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
$domainLink = $protocol . '://' . $_SERVER['HTTP_HOST'];

$total_coutries = array('sg', 'au', 'id', 'cn', 'th', 'tw', 'jp', 'kr');
if (in_array($current_country, $total_coutries, TRUE)) {
    $data = $current_country;
} else {
    $data = "sg";
}

if ($country_lang == "en" && $country_lang != "") {
    $language = "en";
    $full_menu = $data . "_" . $language;
    $menu_theme_location = 'header-menu_' . $full_menu;
} else {
    $full_menu = $data;
    $menu_theme_location = 'header-menu_' . $full_menu;
}

if ($current_country == "sg" || $current_country == "au") {
    $book_text = "Book a tour";
} else if ($current_country == "id" && $country_lang == "en") {
    $book_text = "Book a tour";
} else if ($current_country == "cn" && $country_lang == "en") {
    $book_text = "Book a tour";
} else if ($current_country == "th" && $country_lang == "en") {
    $book_text = "Book a tour";
} else if ($current_country == "tw" && $country_lang == "en") {
    $book_text = "Book a tour";
} else if ($current_country == "jp" && $country_lang == "en") {
    $book_text = "Book a tour";
} else if ($current_country == "kr" && $country_lang == "en") {
    $book_text = "Book a tour";
} else if ($current_country == "id" && $country_lang != "en") {
    $book_text = "Book a tour";
} else if ($current_country == "cn" && $country_lang != "en") {
    $book_text = "预约参观";
} else if ($current_country == "th" && $country_lang != "en") {
    $book_text = "นัดชมพื้นที่";
} else if ($current_country == "tw" && $country_lang != "en") {
    $book_text = "預約參觀";
} else if ($current_country == "jp" && $country_lang != "en") {
    $book_text = "ツアーを予約する";
} else if ($current_country == "kr" && $country_lang != "en") {
    $book_text = "투어 예약";
}

global $wp_query;
$current_ID = $wp_query->post->ID;

include get_template_directory() . '/inc/justco-cf/GTM/gtm.php';
// include get_template_directory() . '/inc/justco-cf/HrefLang/hreflang.php';
include get_template_directory() . '/inc/justco-cf/GTM/gtm_landing.php';
?>


<head>
<?php echo $maingtm; ?>
<?php echo $maingtm_landing; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=0"">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php 
  
        if ($current_country == "jp"){
            echo "<script type='text/javascript'>
            (function(a,b,c,d,e,f,g){e['ire_o']=c;e[c]=e[c]||function(){(e[c].a=e[c].a||[]).push(arguments)};f=d.createElement(b);g=d.getElementsByTagName(b)[0];f.async=1;f.src=a;g.parentNode.insertBefore(f,g);})('https://utt.impactcdn.com/A3982974-85da-4eb9-ba77-9d16cca608d41.js','script','ire',document,window);
            </script>
            ";
        }
    ?>
	<?php echo $hreflang; ?>
    <?php wp_head(); ?>
    <?php 
        if(is_archive()){
            //echo "Aditya";
            //echo '<meta name="robots" content="noindex,nofollow">';
        }
    ?>
	<meta name="google-site-verification" content="8jjkp8JH5Vb-HsTjfVhQCvIWUyK93mUj3NS2PVOFsz0" />												  	
</head>
<body <?php body_class(); ?>>
<?php $chinesevarOK = mb_convert_encoding($country_lang, 'HTML-ENTITIES', 'UTF-8'); ?>
<?php echo $additionalgtm; ?>
<?php 
    if ($current_country == "jp"){
        echo "<script type='text/javascript'>
            ire('identify');
        </script>";
    }
?>
    <?php wp_body_open(); ?>
    <div id="page" class="site">

    <?php
        // check parent page id and show header accordingly
        $postParentID = $post->post_parent;
        if($postParentID != "45099"){
        ?>

            <header
                class="container-fluid ap_header p-0 <?php if ($country_lang == "locations" || $country_lang == "contact-us" || $country_lang == "centre" || $country_lang == "justdesk-basic" || $media_center == "justdesk-basic" || $country_lang == "media-centre" || $media_center == "centre" || $media_center == "locations" || $media_center == "center" || $country_lang == "center" || $media_center == "contact-us" || $country_lang == "community-blog" || $media_center == "community-blog" || $country_lang == "community-stories" || $media_center == "community-stories" || $country_lang == "justdesk-unlimited" || $media_center == "justdesk-unlimited" || $country_lang == "juststudio" || $media_center == "juststudio" || $country_lang == "justdesk-dedicated" || $media_center == "justdesk-dedicated" || $country_lang == "terms-of-service" || $media_center == "terms-of-service" || $media_center == "privacy-policy" || $country_lang == "privacy-policy" || $country_lang == "community" || $media_center == "community" || $country_lang == "justdesk基础办公桌" || $media_center == "justdesk基础办公桌" || $country_lang == "book-a-tour") { ?> ap_darkHeader  <?php } ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <a href="<?php if ($country_lang == "en") {
                                            echo $domainLink . "/" . $current_country . "/" . $country_lang . "/";
                                        } else {
                                            echo $domainLink . "/" . $current_country . "/";
                                        } ?>" class='main-logo'>
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                                echo '<img src="' . esc_url($custom_logo_url) . '" alt="Site Logo">';
                                ?>
                            </a>
                        </div>
                        <div class="col-8 d-md-flex align-items-center justify-content-end">
                            <div class="inner">
                                <?php
                                if ($current_country != "sg" && $current_country != "au" && $current_country != "" && $current_country != "enterprise-staging") { ?>
                                <div class="up">
                                    <p>
                                        <a href="<?php if ($country_lang == "en") { echo $actual_link; } else { echo $language_urls; } ?>">EN</a>|
                                        <?php if($language_url_new == "enterprise"){ ?>
                                        <a href="<?php if ($country_lang != "en") { echo $actual_link; } else { echo $language_url_slug. "/" . $language_url_new; } ?>"><?php echo $current_country; ?></a>
                                        <?php }else{ ?>
                                        <a href="<?php if ($country_lang != "en") { echo $actual_link; } else { echo $language_url; } ?>"> <?php echo $current_country; ?></a>
                                        <?php } ?>
                                
                                        <!-- <a href="<--?php if ($country_lang == "en") { echo $actual_link; } else { echo $language_urls; } ?>">EN</a>|
                                        <a href="<--?php if ($country_lang != "en") { echo $actual_link; } else { echo $language_url; } ?>"> <--?php echo $current_country; ?></a> -->
                                    </p>
                                </div>
                                <?php } ?>
                                <div class="bottom">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => $menu_theme_location
                                        )
                                    );
                                    ?>
                                    <?php
                                    if (count($current_url) != 5) {
                                        if ($media_center != "" || $country_lang == "membership-plans" || $country_lang == "meeting-rooms" || $country_lang == "contact-us" || $country_lang == "our-manifesto" || $country_lang == "about-new") {
                                    ?>
                                    <div class="bookNowBtnForMobile">
                                        <?php
                                        $post_id = $post->ID;       
                                        if(get_field('buy_hot_desk_text', $post_id)){ ?>
                                        <div class="buyhotdeskmobile">
                            <a class="button hot-desk" href="<?php the_field('buy_hot_desk_link', $post_id); ?>" target="_blank" id="hot-desk"><?php the_field('buy_hot_desk_text', $post_id); ?></a>
                                    </div>
                                    <?php } ?>
                                    <a class="button book-now" href="" id="nav-book-now"><?php echo $book_text; ?></a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($current_country == "cn" && $country_lang != "en") {
                    $discover_text = "寻找您理想中的办公空间";
                } else if ($current_country == "th" && $country_lang != "en") {
                    $discover_text = "ค้นหาพื้นที่ทำงานที่คุณต้องการ";
                } else if ($current_country == "kr" && $country_lang != "en") {
                    $discover_text = "원하는 업무 공간에 대해 알아보세요.";
                } else if ($current_country == "jp" && $country_lang != "en") {
                    $discover_text = "あなたの理想的なワークスペースを発見する";
                } else if ($current_country == "tw" && $country_lang != "en") {
                    $discover_text = "找到您理想中的共同工作空間";
                } else if ($current_country == "id" && $country_lang != "en") {
                    $discover_text = "TEMUKAN RUANG KERJA IDEAL ANDA";
                } else {
                    $discover_text = "Discover Your Ideal Workspace";
                }
                
                if (count($current_url) > 4 && $media_center == "" && $country_lang != "membership-plans" && $country_lang != "meeting-rooms" && $current_country != "enterprise-staging" && $country_lang != "our-leadership" && $country_lang != "about-us" && $country_lang != "enterprise-staging" && $country_lang != "enterprise" && $country_lang != "enterprise-suite") { ?>
                <div class="header-bottom main_sec">
                    <?= do_shortcode('[LocationFilter]'); ?>
                    <div class="container">
                        <div class="elementor-element elementor-element-3a78bfd elementor-align-center action-btn elementor-widget elementor-widget-button"
                            data-id="3a78bfd" data-element_type="widget" id="actionBtn" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a href="#" class="elementor-button-link elementor-button elementor-size-sm"
                                        role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text"><?php echo $discover_text; ?></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </header>
            <!----- harpreet create header for landing pages --->
            <div class="page__header">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="Just__head">


                            <?php $isQ3Logo = get_field('membership_40_location_logo'); ?>

                            
                            <?php if($isQ3Logo == '1'){ ?>

                                <a href="<?php if ($country_lang == "en") {
                                        echo $domainLink . "/" . $current_country . "/" . $country_lang . "/";
                                    } else {
                                        echo $domainLink . "/" . $current_country . "/";
                                    } ?>" class='main-logo'>
                                <?php 
                                if ($current_country == "th"){
                                    echo '<img src="/wp-content/uploads/2023/04/Q2-PO_KV-TH_LP-Logo-TH.jpg"class="img-fluid q3Lp">';
                                }elseif ($current_country == "tw"){
                                    echo '<img src="/wp-content/uploads/2023/04/2023-Q2-KeyVisual-TW-Lp-Logo.png"class="img-fluid q3Lp">';
                                }else{
                                    echo '<img src="/wp-content/uploads/2023/03/logo_for_q3_lp.png"class="img-fluid q3Lp">';
                                }
                                ?>
                                </a>

                            <?php } else{ ?>
                                
                                <a href="<?php if ($country_lang == "en") {
                                        echo $domainLink . "/" . $current_country . "/" . $country_lang . "/";
                                    } else {
                                        echo $domainLink . "/" . $current_country . "/";
                                    } ?>" class='main-logo'>
                                <?php
                                    $custom_logo_id = get_theme_mod('custom_logo');
                                    $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                                    
                                    echo '<img src="/wp-content/uploads/2022/08/logo_black.png"class="img-fluid">';
                                ?>
                                </a>

                            <?php } ?>
                            
                            </div>
                        </div>
                        <!--?php echo $language_url_new; ?-->
                        <?php 
                        global $wp_query;
                        $currentpage_ID = $wp_query->post->ID;
                        ?>
                        <div class="col-6 col-md-6 d-flex align-items-center justify-content-end">
                            <div class="right__section">
                                <ul>
                                    <?php if ($current_country == "sg" && $current_country != "au") { ?>
                                        <li class="active"><a href="tel:+65 6911 8891">+65 6911 8891</a></li>
                                    <?php  }else if($currentpage_ID == "28863"){ ?>
                                        <li><i class="fa fa-phone"></i> <a href="tel:+61 (02) 9159 1888">+61 (02) 9159 1888</a></li>
                                    <?php }else if($currentpage_ID == "28254"){ ?>
                                        <li><i class="fa fa-phone"></i> <a href="tel:+61 (03) 7019 0909">+61 (03) 7019 0909</a></li>
                                    <?php }else if($current_country != "sg" && $current_country != "au"){
                                        if ($current_country != "sg" && $current_country != "au" && $current_country != "") {
                                            if($currentpage_ID != "29489"){ ?>
                                            <li <?php if($country_lang == "en"){?> class="active" <?php } ?>><a href="<?php if ($country_lang == "en") { echo $actual_link; } else { echo $language_urls; } ?>">en</a></li>
                                            <li>|</li>
                                            <?php } ?>
                                            <li <?php if($country_lang != "en"){?> class="active" <?php } ?>><a href="<?php if ($country_lang != "en") { echo $actual_link; } else { echo $language_url_slug. "/" . $language_url_new; } ?>"><?php echo $current_country; ?></a></li>
                                        <?php } 
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } else {
            echo get_template_part( 'header-latest' ); 
        }
        