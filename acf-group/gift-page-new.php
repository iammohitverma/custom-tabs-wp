<?php
/*
Template Name: Gift Page New
*/
?>
<?php get_header(); 

$page_id = $post->ID;
?>
<main class="mv_main_wrap">

  <!-- hero area -->
  <section class="hero">
      <?php
        $banner_title = get_field( "banner_title" );
      ?>
        <div class="row gx-0">
          <div class="container">
            <div class="banner">
              <div class="row gx-0">
                <div class="col-md-8">
                  <div class="img_wrap">
                    <img src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php echo the_title();?>" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="intro">
                    <?php
                      if($banner_title){
                        ?>
                          <p><?php echo $banner_title;?></p>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <!-- page desc section -->
      <?php
        $page_description = get_field( "page_description" );
      ?>
      <?php
        if($page_description){
      ?>
      <section class="page_desc">
        <div class="container">
          <div class="row gx-0">
            <div class="col-12">
              <div class="description">
                  <?php echo $page_description;?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
        }
      ?>
  
      <!-- kits section -->
      <section class="kits">
        <div class="container">
          <div class="row gx-0">
            <div class="col-12">
              <div class="wrap">

                <?php if( have_rows('section_first') ): ?>
                  <?php while( have_rows('section_first') ): the_row(); 
                    // Get sub field values.
                    $section_first_heading = get_sub_field('section_first_heading');
                    $section_first_list = get_sub_field('section_first_list');
                    ?>
                    <?php
                      if($section_first_heading){
                    ?>
                      <h2 class="fs_22 text_black"><?php echo $section_first_heading;?></h2>
                    <?php
                      }
                    ?>

                    <?php 
                    if( $section_first_list ) {?>
                      <div class="boxed_text">
                        <ul>
                          <?php
                          foreach( $section_first_list as $list ) {
                              $list_text = $list['list_text'];
                              echo '<li>';
                                  echo $list_text;
                              echo '</li>';
                          }
                          ?>
                        </ul> 
                      </div>
                      <?php
                    }
                  endwhile; 
                endif; ?>

              </div>
            </div>

            <div class="col-12">
              <div class="product_row">
                <div class="row gx-0 align-items-center">
                  <?php if( have_rows('product_row_first') ): ?>
                    <?php while( have_rows('product_row_first') ): the_row(); 
                      // Get sub field values.
                      $product_row_first_title = get_sub_field('product_row_first_title');
                      $product_row_first_image = get_sub_field('product_row_first_image');
                      $product_row_first_list = get_sub_field('product_row_first_list');
                      $product_row_first_bold_text = get_sub_field('product_row_first_bold_text');
                      ?>
                      <?php
                        if($product_row_first_title){
                      ?>
                        <div class="col-12">
                          <h3 class="fs_22 text_blue">
                            <?php echo $product_row_first_title;?>
                          </h3>
                        </div>
                      <?php
                        }
                      ?>

                      <div class="col-md-6">
                        <?php
                          if($product_row_first_image){
                          ?>                      
                          <div class="image_wrap">
                            <img src="<?php echo esc_url($product_row_first_image['url']); ?>" alt="<?php echo esc_attr($product_row_first_image['alt']); ?>" />
                          </div>
                          <?php
                          }
                        ?>
                      </div>

                      <div class="col-md-6">
                        <div class="text_box">
                          <div class="boxed_text">
                            <?php 
                                if( $product_row_first_list ) {?>
                                  <ul>
                                    <?php
                                      foreach( $product_row_first_list as $list ) {
                                          $list_text = $list['list_text'];
                                          echo '<li>';
                                              echo $list_text;
                                          echo '</li>';
                                      }
                                    ?>
                                  </ul> 
                                  <?php
                                }?>       

                            <?php
                              if($product_row_first_bold_text){
                              ?>                      
                              <p class="bold"><?php echo $product_row_first_bold_text;?></p>
                              <?php
                              }
                            ?>
                          </div>
                        </div>
                      </div>

                     <?php
                    endwhile; 
                  endif; ?>
               
                </div>
              </div>
            </div>

            <!-- <div class="col-12">
              <div class="product_row">
                <div class="row gx-0 flex-column-reverse flex-md-row align-items-center">
                  
                </div>
              </div>
            </div> -->

            <div class="col-12">
              <div class="product_row">
                <div class="row gx-0 align-items-center">

                <?php if( have_rows('product_row_second') ): ?>
                    <?php while( have_rows('product_row_second') ): the_row(); 
                      // Get sub field values.
                      $product_row_second_title = get_sub_field('product_row_second_title');
                      $product_row_second_description = get_sub_field('product_row_second_description');
                      $product_row_second_image = get_sub_field('product_row_second_image');
                      $product_row_second_heading = get_sub_field('product_row_second_heading');
                      $product_row_second_subheading = get_sub_field('product_row_second_subheading');
                      $product_row_second_list = get_sub_field('product_row_second_list');
                      $product_row_second_bold_text = get_sub_field('product_row_second_bold_text');
                      ?>
                        <div class="col-12">
                          <?php
                          if($product_row_second_title){
                          ?>
                            <h4 class="fs_22 text_black"><?php echo $product_row_second_title;?></h4>
                          <?php }?>
                        
                          <?php
                          if($product_row_second_description){
                          ?>
                            <p><?php echo $product_row_second_description;?></p>
                          <?php }?>
                        </div>

                      <div class="col-md-6">
                        <?php
                          if($product_row_second_image){
                          ?>                      
                          <div class="image_wrap">
                            <img src="<?php echo esc_url($product_row_second_image['url']); ?>" alt="<?php echo esc_attr($product_row_second_image['alt']); ?>" />
                          </div>
                          <?php
                          }
                        ?>
                      </div>

                      <div class="col-md-6">
                        <div class="text_box">
                          <?php
                            if($product_row_second_heading){
                            ?>
                            <h5 class="fs_22 text_black"><?php echo $product_row_second_heading;?></h5>
                          <?php }?>
                          <?php
                            if($product_row_second_subheading){
                            ?>
                            <h3 class="fs_20 text_blue"><?php echo $product_row_second_subheading;?></h3>
                          <?php }?>
                          
                          <div class="boxed_text">
                            <?php 
                                if( $product_row_second_list ) {?>
                                  <ul>
                                    <?php
                                      foreach( $product_row_second_list as $list ) {
                                          $list_text = $list['list_text'];
                                          echo '<li>';
                                              echo $list_text;
                                          echo '</li>';
                                      }
                                    ?>
                                  </ul> 
                                  <?php
                                }?>       

                            <?php
                              if($product_row_second_bold_text){
                              ?>                      
                              <p class="bold"><?php echo $product_row_second_bold_text;?></p>
                              <?php
                              }
                            ?>
                          </div>
                        </div>
                      </div>

                     <?php
                    endwhile; 
                  endif; ?>

                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="product_row">
                <div class="row gx-0 align-items-center">
                <?php if( have_rows('delivery') ): ?>
                    <?php while( have_rows('delivery') ): the_row(); 
                      // Get sub field values.
                      $delivery_title = get_sub_field('delivery_title');
                      $delivery_description = get_sub_field('delivery_description');
                      $delivery_image = get_sub_field('delivery_image');
                      ?>
                      <div class="col-md-7">
                        <div class="text_box">
                          <?php
                            if($delivery_title){ ?>
                            <h4 class="fs_22 text_black">
                              <?php echo $delivery_title;?>
                            </h4>
                            <?php }?>
                            <?php
                            if($delivery_description){ 
                               echo $delivery_description;
                            }?>
                        </div>
                      </div>

                      <div class="col-md-5">
                        <?php
                          if($delivery_image){
                          ?>                      
                          <div class="image_wrap">
                            <img src="<?php echo esc_url($delivery_image['url']); ?>" alt="<?php echo esc_attr($delivery_image['alt']); ?>" />
                          </div>
                          <?php
                          }
                        ?>
                      </div>

                     <?php
                    endwhile; 
                  endif; ?>
               
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
       <!-- product desc section -->
       <section class="product_desc">
        <div class="container">
          <div class="row gx-0 gx-0">
            <div class="col-12">
              <div class="wrap">
                <?php if( have_rows('product') ): ?>
                  <?php while( have_rows('product') ): the_row(); 
                    // Get sub field values.
                    $product_title = get_sub_field('product_title');
                    $product_description = get_sub_field('product_description');
                    ?>
                    <?php
                      if($product_title){ ?>
                        <h4 class="fs_22 text_blue">
                          <?php echo $product_title;?>
                        </h4>
                      <?php }?>
                      <?php
                        if($product_description){ 
                            echo $product_description;
                      }?>

                    <?php
                  endwhile; 
                endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- commit_sec section -->
      <section class="commit_sec">
        <div class="container">
          <div class="row gx-0">
            <div class="col-12">
              <div class="wrap">
                <?php if( have_rows('commit') ): ?>
                  <?php while( have_rows('commit') ): the_row(); 
                    // Get sub field values.
                    $commit_title = get_sub_field('title');
                    $commit_content = get_sub_field('content');
                    ?>
                    <?php
                      if($commit_title){ ?>
                        <h3 class="fs_20 text_blue">
                          <?php echo $commit_title;?>
                        </h3>
                      <?php }?>
                      <?php
                        if($commit_content){ 
                            echo $commit_content;
                      }?>

                    <?php
                  endwhile; 
                endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      
<!-- end #content -->
<div class="product_with_form">
  <div class="product_listing">
    <div class="row">
      <?php
        $inStock = false;
        $args = array(
          'post_type' => 'product', //post for default
          'post_status' => 'publish'
      );
        $query = new WP_Query( $args );?>

        <?php if ( $query->have_posts() ) : 
          while ( $query->have_posts() ) :
              $query->the_post();
              $title = get_the_title(); 
              $featureImg = get_the_post_thumbnail_url(); 
              $outofstock = "";
              $product_in_stock = get_field('product_in_stock', get_the_ID());
              if($product_in_stock == "yes"){
                $outofstock = "";
                $inStock = true;
              }else {
                $outofstock = "outofstock";
              }
          ?>

            <div class="col-md-6 <?php echo $outofstock; ?>">
             <!-- <div class="custom_product">
                <div class="img_box">
                    <!--<img src="<?php //echo $featureImg;?>" alt="<?php //echo  $title;?>">
                </div>
                <div class="detail">
                  <h3><?php //echo $title;?></h3>
                </div>
              </div>-->
            </div>

          <?php
          endwhile; ?>
          <?php wp_reset_postdata(); ?>
      <?php else : ?>
          <p><?php esc_html_e( 'Sorry, no product found.' ); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <?php
    if($inStock){
  ?>
    <div class="medium-12 columns proposal">
      <div class="row text-center">
        <?php echo do_shortcode('[contact-form-7 id="4970" title="Product Gifting"]'); ?></div>
      </div>
    </div>
  <?php
    }
  ?>
</div>
    </main>

<!-- <script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
  console.log(document.title + 'gtag submission')
          gtag('event', 'submit', {
            'event_category' : 'form',
            'event_label' : document.title
          });
}, false ); 
</script> -->
<?php get_footer(); ?>
