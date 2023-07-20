<?php


add_shortcode( 'justco_post_tabs', 'justco_post_tabs_shortcode_func' );
function justco_post_tabs_shortcode_func( $atts ) {
    
    $atts = shortcode_atts( array(
        'enableLocationMap' => 'yes',
    ), $atts, 'justco_post_tabs' );
    $enableLocationMap = $atts['enableLocationMap'];


    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $current_url = explode("/", $actual_link);
    $parentCatSlug = $current_url[4]; //get from url index
    $childCatSlug = $current_url[5]; //get lang from url index
    $cusomFieldTest = $parentCatSlug; 
    if($childCatSlug=='en'){ //if lang en avail then check and concat
        $cusomFieldTest.='-en';
    }
    
    $taxonomy = 'workspace-district';

    
?>



<section class="latest_post_tabs_mv">
    <?php
        if(($enableLocationMap == "yes")){
    ?>
        <div class="map-wrapper">
            <div class="wrap-map">
                <div class="map">
                    <a class="transparent-btn" href=""></a>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <div id="map"></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    <div class="container container_mv">
        <div class="tabs_head">
            <?php
                    // $cats = get_categories($args);
                    $parentTermId = get_term_by('slug',$parentCatSlug, $taxonomy);
                    $categories = get_terms($taxonomy, array('hide_empty' => false, 'child_of' => $parentTermId->term_id));
                    foreach($categories as $category) { 
                        $langValue = get_field( "district_country_code", $category );
                        $cat_name = $category -> name;
                        $cat_slug = $category -> slug;

                        if($cat_name !== "Uncategorized"){
                            if($cusomFieldTest==$langValue){
                                ?>
            <button data-filter=".<?php echo $cat_slug;?>" class="tab_button"><?php echo $cat_name; ?></button>
            <?php
                            }
                        }
                    }
                ?>

        </div>
        <div class="tabs_body">
            <?php
                    $args = array(
                        'post_type'=> 'workspace',
                        'orderby'    => 'ID',
                        'post_status' => 'publish',
                        'order'    => 'DESC',
                        'posts_per_page' => '8', //initially 8 post showing 
                        'hide_empty' => false,
                        'tax_query' => array(
                            array(
                                'taxonomy' => $taxonomy,
                                'field' => 'slug',
                                'terms' => $categories[0]->slug 
                            )
                        )
                    );
                ?>
            <div class="row">
                <?php $result = new WP_Query( $args );
                        if ( $result-> have_posts() ) : ?>
                <?php while ( $result->have_posts() ) : $result->the_post(); ?>

                <?php                           
                                // $categories = get_the_category();
                                $taxonomy = 'workspace-district';
                                $tax_terms = get_terms($taxonomy, array('hide_empty' => false));
                                $all_cats = "";
                                foreach ( $tax_terms as $key=>$category ) {
                                    $all_cats .= " " . $category->slug;
                                }

                                $location = get_field('location', get_the_ID());
                            ?>

                <div class="col-md-6 col-lg-4 col-xl-3 <?php echo $categories[0]->slug?>">
                    <div class="tab_card">
                        <div class="img_box">
                            <a href="<?php echo get_permalink();?>">
                                <img src="<?php the_post_thumbnail_url();?>" class="card-img-top" alt="bike" />
                            </a>
                        </div>
                        <div class="detail">
                            <h4>
                                <a href="<?php echo get_permalink();?>"><?php echo the_title();?></a>
                            </h4>
                            <p>
                                <?php
                                                if($location){
                                                    echo $location;
                                                }
                                            ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>

            </div>

            <!-- <div class="loaderWrap"> -->
            <div class="loader">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/loader.gif' ?>" alt="loader">
            </div>
            <!-- </div> -->
        </div>
    </div>

</section>
<?php
if ( $result-> have_posts() ) :
                while ( $result->have_posts() ) : $result->the_post(); 
                     
                $location = get_field('location', get_the_ID());


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
        
$the_title = get_the_title();
        $positions[] = array(
            'name' => $the_title,
            'address' => $location,
            'image' => $location_image[0],
            'lat' => $latitude,
            'lng' => $longitude,
        );
    } else {
   // echo $response->status;
   // var_dump($response);
    }
    
    /* */

endwhile; 
                 endif; wp_reset_postdata();

?>
<div class="mapscripts">
    <script type="text/javascript">
    // Pin to use for map
    var pinUrl = '/wp-content/themes/justCo/assets/images/map-pin.png';
    // Positions for Singapore workspaces
    var positions = <?php echo json_encode($positions); ?>;
    console.log(positions);
    </script>
</div>
<?php

}

?>