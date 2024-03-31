<?php
/*
Template Name: 10th Year Anniversary Template HTML
*/
get_header();
?>

    <!-- main start -->

    <?php
$field_group_key = 'group_6604092a59469';
// $field_group_key = 'group_66068e11508c7';
   $fields = acf_get_fields($field_group_key);
if ($fields) {
    $tabheading = get_field('tab_heading');
    $beginningheading = get_field('beginning_heading');
    $beginningcontent = get_field('beginning_content');
    
     $secondtabheading = get_field('second_tab_heading');
     $journeyheading = get_field('journey_heading');
    $journeycontent = get_field('journey_content');
    
     $thirdtabheading = get_field('third_tab_heading');
     $aheadheading = get_field('ahead_heading');
    $aheadcontent = get_field('ahead_content');
?>

<style>
#transform {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}
</style>
<main>
   <div class="sections_area_wrap">
      <div class="tab_head_tm">
         <div class="container_tm">
            <div class="tab_buttons_tm">
               <!-- <button class="active" data-btn="beginning">BEGINNING</button>
                  <button data-btn="journey">JOURNEY</button>
                  <button data-btn="looking_ahead">LOOKING AHEAD</button> -->
               <a href="#beginning" class="active" data-btn="beginning">BEGINNING</a>
               <a href="#journey" data-btn="journey" class="">JOURNEY</a>
               <a href="#looking_ahead" data-btn="looking_ahead">LOOKING AHEAD</a>
            </div>
         </div>
      </div>
      <div class="sections_wrap active" id="beginning">
         <section class="example_classname sec_1">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <h3 data-0="transform: translateY(0); opacity: 1" data-500="transform: translateY(0); opacity: 0;" class="" style="">
                           IN THE BEGINNING                    
                        </h3>
                        <div data-0="transform: translateY(0); opacity: 1" data-500="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>When we began Donovan &amp; Ho in 2014, our vision was to be a law firm in Malaysia best known for its vibrancy, innovation and excellent service standards. We also had a mission to educate the public on legal issues and to make legal knowledge accessible.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap" data-0="transform: translateY(0) rotate(0deg); opacity: 1" data-200="transform: translateY(0) rotate(0deg); opacity: 0;" data-700="transform: translateY(0) rotate(0deg); opacity: 0;" style="">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_img01jpeg.jpeg" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_img02.jpeg" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/begining_im_03.jpeg" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="example_classname sec_2">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <blockquote data-0="transform: translateY(200px); opacity: 0" data-500="transform: translateY(200px); opacity: 0" data-700="transform: translateY(0); opacity: 1;" data-1200="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>“I am proud to be the first lawyer they hired. Working at Donovan &amp; Ho felt like it was possible to have work life balance as a lawyer. It was a pleasure working there. I believe in the vision of the firm that education is the way forward – we must first give value before we receive.”</p>
                           <p>– J.Ong, Former Associate</p>
                        </blockquote>
                        <div data-0="transform: translateY(200px); opacity: 0" data-700="transform: translateY(200px); opacity: 0" data-1000="transform: translateY(0); opacity: 1;" data-1200="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>During our early years, we faced challenges that included the deep-seated conservatism and traditionalism of the legal industry, while trying to establish a reputation in a fiercely competitive market. In an era when Malaysian law firms lacked an active social media presence, we distinguished ourselves as one of the pioneering firms that fully harnessed social media and the internet to connect with the public.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <!-- <div class="img_area_wrap"
                        data-0="top:100%; transform:scale(0.5) translateY(200px); opacity: 0"
                        data-200="top:0%; transform:scale(0.5) translateY(0); opacity:1;"
                        data-1000="transform:scale(1) translateY(0);"
                        data-2000="transform:scale(0.75) translateY(0);"
                        > -->
                     <div class="img_area_wrap" data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-1000="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-1500="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);" style="">
                        <!-- Your content here -->
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote01.jpeg" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote02.jpeg" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote03.png" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="sections_wrap journey" id="journey">
         <section class="example_classname sec_1">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <h3 data-0="transform: translateX(-100%); opacity: 0" data-1700="transform: translateY(0); opacity: 1;" class="" style="">
                           THE JOURNEY                    
                        </h3>
                        <div data-0="transform: translateY(200px); opacity: 0" data-1500="transform: translateY(200px); opacity: 0" data-1700="transform: translateY(0); opacity: 1;" data-2000="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>Defying convention, we have set benchmarks across the industry by championing the cause of legal understanding to honour our social responsibility. Our endeavours extend beyond boardrooms as we tirelessly work towards simplifying legal jargon, and raising awareness on legal issues that affect our society.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap" data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-1500="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-1700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-2000="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);" style="">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_img01.jpeg" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_img02.jpeg" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote03.png" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="example_classname sec_2">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <blockquote data-0="transform: translateY(200px); opacity: 0" data-2000="transform: translateY(200px); opacity: 0" data-2600="transform: translateY(0); opacity: 1;" data-2900="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>“I first came across Donovan &amp; Ho when I had to oversee employment matters for my company which was not my forte. I had to do a lot of reading and research. I then stumbled upon the firm’s articles and found them to be simple, straightforward and easy to read. This was when I decided to introduce the firm to my Company and entrusted the firm with employment portfolio. With the team’s reassuring knowledge and experience, we saved a lot of time explaining the issues and discussing strategies.”</p>
                           <p>– H. Johari, Head of Legal &amp; Business Integrity</p>
                        </blockquote>
                        <div data-0="opacity:0; transform: translateY(200px) rotate(0deg);" data-2400="opacity:0; transform: translateY(200px) rotate(0deg);" data-2600="opacity:1; transform: translateY(0) rotate(0deg)" data-3500="opacity:0; transform: translateY(0) rotate(0deg);" class="" style="">
                           <p>Staying true to our commitment to make legal knowledge accessible, our endeavours have encompassed thoughtfully written articles, bite-sized legal information, educational videos and informative comics. As we stand today, our website has more than 550 articles available for free, with views in the millions from all corners of the globe.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap" data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-1700="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-2400="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-2700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-3500="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);" style="">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote01.jpeg" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote02.jpeg" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote03.png" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="example_classname sec_3">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <div data-0="transform: translateX(-100%); opacity: 0" data-1700="transform: translateY(0); opacity: 1;" data-2500="transform: translateY(-100%); opacity: 0;" class="" style="">
                           <p>Our efforts and innovative approach led us to be recognised as one of Asian Legal Business’ “Firms to Watch” in 2016.</p>
                        </div>
                        <blockquote data-0="transform: translateY(200px); opacity: 0" data-2000="transform: translateY(200px); opacity: 0" data-2600="transform: translateY(0); opacity: 1;" data-2900="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>“Donovan &amp; Ho might be young (launched 2014) and small, but the firm is hard to miss online thanks to its robust social media strategy…And by the looks of it, the approach is working.”</p>
                           <p>– Asian Legal Business’ “Firms to Watch”, 2016</p>
                        </blockquote>
                        <div data-0="opacity:0; transform: translateY(200px) rotate(0deg);" data-2400="opacity:0; transform: translateY(200px) rotate(0deg);" data-2600="opacity:1; transform: translateY(0) rotate(0deg)" data-3500="opacity:0; transform: translateY(0) rotate(0deg);" class="" style="">
                           <p>We have earned a reputation for excellent services. We are consistently ranked and recognised in publications, including the Legal 500, Chambers and Partners, asialaw Profiles, Benchmark Litigation and IFLR 1000, standing among some of the oldest and largest firms in Malaysia.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap" data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-1700="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-2400="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-2700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-3500="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);" style="">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote04.jpeg" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/jouney_quote05.jpeg" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote03.png" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="example_classname sec_4">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <blockquote data-0="transform: translateY(200px); opacity: 0" data-2000="transform: translateY(200px); opacity: 0" data-2600="transform: translateY(0); opacity: 1;" data-2900="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>“The collaborative and collegiate work environment is the most striking aspect of the firm’s culture. Even though each person may have different job scopes, everyone is more than willing to help each other out in finding the solution to your work issues. The level of synergy in the firm is something that I truly cherish and appreciate.”</p>
                           <p>– HE. Leow, Associate<br>
                              “I enjoy working here because of the “team” environcment. There is a positive working culture and Donovan &amp; ho is always supporting us to grow professionally and personally.”
                           </p>
                           <p>– N, Aiman, Administrative Manager</p>
                        </blockquote>
                        <div data-0="opacity:0; transform: translateY(200px) rotate(0deg);" data-2400="opacity:0; transform: translateY(200px) rotate(0deg);" data-2600="opacity:1; transform: translateY(0) rotate(0deg)" data-3500="opacity:0; transform: translateY(0) rotate(0deg);" class="" style="">
                           <p>From a small team of two passionate individuals, we have grown into a dynamic workforce united by our commitment to re-energising the practice of law. As we continue to progress, our journey has been defined by meaningful collaborations with clients from all around the world, big and small, and across various sectors that have led to impactful solutions and enduring partnerships</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap" data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-1700="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-2400="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-2700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-3500="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);" style="">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote07.png" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote08.png" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote03.png" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="example_classname sec_5">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <blockquote data-0="transform: translateY(200px); opacity: 0" data-2000="transform: translateY(200px); opacity: 0" data-2600="transform: translateY(0); opacity: 1;" data-2900="transform: translateY(0); opacity: 0;" class="" style="">
                           <p>“What sets Donovan &amp; Ho apart is that personal touch. They don’t just specialise in giving sound legal advice and service, but they do take pride in their work. It feels like it’s tailor-made to suit the needs of their clients. To do so, much effort is made to understand their clients, their business, and their needs.”</p>
                           <p>– G. Ramakrishnan, Senior Employment Counsel<br>
                              “They are committed to their client’s needs. This is evident in their commitment to clear communication ensuring that clients are well-informed at every stage of their case. They are efficient and responsive whereby they are quick to address any concerns or questions.”
                           </p>
                           <p>– V. Ranganathan, Legal Assistant Manager</p>
                        </blockquote>
                        <div data-0="opacity:0; transform: translateY(200px) rotate(0deg);" data-2400="opacity:0; transform: translateY(200px) rotate(0deg);" data-2600="opacity:1; transform: translateY(0) rotate(0deg)" data-3500="opacity:0; transform: translateY(0) rotate(0deg);" class="" style="">
                           <p>Reflecting on our success stories, we have served a diverse clientele ranging from individuals and start-ups, to family-run businesses, multinational corporations, and renowned brand names across various industries, including healthcare, hotels and hospitality, technology, F&amp;B, manufacturing, chemicals, construction, property development, and professional services.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap" data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-1700="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);" data-2400="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-2700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);" data-3500="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);" style="">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote07.png" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote08.png" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote03.png" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="sections_wrap looking_ahead" id="looking_ahead">
         <section class="example_classname sec_1">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <h3>
                           Looking Ahead                    
                        </h3>
                        <div>
                           <p>With a decade behind us, we are excited for the future. Looking ahead, we set our vision higher and broader, aiming to forge strong strategic partnerships to better serve our global clientele. We also extend our heartfelt gratitude to our clients, partners, and team members who have been an integral part of this incredible journey.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/Ahead_img01.jpeg" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/Ahead_img02.jpeg" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/Ahead_img03.jpeg" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="example_classname sec_2">
            <div class="container_tm">
               <div class="row_tm">
                  <div class="col_6_tm">
                     <div class="text_wrap">
                        <blockquote>
                           <p>“I first came across Donovan &amp; Ho through a recommendation, when I moved to Kuala Lumpur 9 years ago, and was setting up my business. From the get-go, we were able to establish a professional, trusting working partnership. Donovan &amp; Ho have been my ‘go to’ employment and general corporate law firm ever since.”</p>
                           <p>– S. Baxendale, Founder<br>
                              “Every year is a milestone to be celebrated, but surpassing 10 years is something special; a testament to the quality of service. I only wish for continued success over the next 10 years.”
                           </p>
                           <p>– D. Woodroof, Founder</p>
                        </blockquote>
                     </div>
                  </div>
                  <div class="col_6_tm">
                     <div class="img_area_wrap">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote07.png" alt="" class="img_1">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/journey_quote08.png" alt="" class="img_2">
                        <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/beginning_quote03.png" alt="" class="img_3">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="Decadeo_section">
            <div class="container_tm">
               <div class="heading_wrap">
                  <h3>#DecadeofDNH</h3>
               </div>
               <div class="images_wrap">
                  <div class="row_tm">
                     <div class="col_4_tm">
                        <div class="image_wrap">
                           <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/decade_image.png" alt="" class="img_1">
                        </div>
                     </div>
                     <div class="col_4_tm">
                        <div class="image_wrap">
                           <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/decade_image.png" alt="" class="img_2">
                        </div>
                     </div>
                     <div class="col_4_tm">
                        <div class="image_wrap">
                           <img src="https://dnholdlive.dexsandbox.com/wp-content/uploads/2024/03/decade_image.png" alt="" class="img_3">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn_wrap">
                  <button href="#beginning" class="start_again">START AGAIN</button>
               </div>
            </div>
         </section>
      </div>
   </div>
</main>
<?php } ?>

<!-- main start -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://dnholdlive.dexsandbox.com/wp-content/themes/divi-child/skrollr.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script> -->
    
<script>
jQuery(document).ready(function () {
  // Add active to menu when section in viewport
  $(window).on('scroll', function () {
      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();
      var viewportMid = (viewportTop + viewportBottom) / 2;

      $('.sections_wrap').each(function () {
          var sectionId = $(this).attr('id');
          var correspondingLink = $('a[data-btn="' + sectionId + '"]');

          var sections = $(this).find('section');
          var sectionInViewport = null;

          sections.each(function () {
              var sectionTop = $(this).offset().top;
              var sectionBottom = sectionTop + $(this).outerHeight();

              if (sectionTop <= viewportMid && sectionBottom >= viewportMid) {
                  sectionInViewport = $(this);
                  return false; // Exit the loop if a section is found
              }
          });

          if (sectionInViewport) {
              $(this).addClass('active');
              correspondingLink.addClass('active');
          } else {
              $(this).removeClass('active');
              correspondingLink.removeClass('active');
          }
      });
  });

  // Event listener for tab button clicks
  jQuery(".tab_head_tm .tab_buttons_tm a").click(function (e) {
      jQuery(".tab_head_tm .tab_buttons_tm a").removeClass("active");
      jQuery(this).addClass("active");
      let currBtn = jQuery(this).attr("data-btn");
      jQuery(".sections_area_wrap .sections_wrap").removeClass("active");
      jQuery(".sections_area_wrap .sections_wrap." + currBtn).addClass("active");
  });

    // Event listener for clicking on elements with class "start_again"
    jQuery('.start_again').on('click', function() {
        // Scroll to the top of the window with smooth animation
        jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    var tabHeadHeight = jQuery('.tab_head_tm').outerHeight();
    jQuery('body').css('--tabHeadHeight', tabHeadHeight + 'px');

    
});
</script>

<script type="text/javascript">
 // Initialize Skrollr
 var skrollrInstance = skrollr.init();

// Function to destroy Skrollr
function destroySkrollr() {
  if (skrollrInstance) {
    skrollrInstance.destroy(); // Destroy Skrollr if it exists
    skrollrInstance = null; // Reset the Skrollr instance variable
  }
}

// Function to check window width and destroy Skrollr if necessary
function checkWindowWidth() {
  if (window.innerWidth < 992) {
    destroySkrollr(); // Destroy Skrollr if window width is under 992 pixels
  }
}

// Initial check on page load
checkWindowWidth();

// Event listener for window resize
window.addEventListener('resize', checkWindowWidth);
  window.onscroll = () => {
        let scrollY = this.scrollY;
        console.log(scrollY);
  }
</script>

<?php get_footer(); ?>


  