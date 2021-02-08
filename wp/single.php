<?php
get_header();

$main_id = get_option( 'page_on_front' );

?>

    <section class="main-blog" id="main">
        <div class="container">
          <div class="content">
            <h1 class="title">
              <?php the_title(); ?>
            </h1>
            <p class="description">
              <?php the_field("main_text"); ?>
            </p>
          </div>
        </div>
    </section>

    <section class="red-block">
        <div class="container">
        <?php
            if( have_rows('slider')): 
            ?>
        <ul class="list-wrapper">
            <?php
                while ( have_rows('slider') ) : the_row();
                    ?>
                    <li class="list-item">
                        <p class="name">
                            <?php the_sub_field('title_slider') ?>
                        </p>
                        <p class="text">
                            <?php the_sub_field('text_slider') ?>
                        </p>
                        </li>
                    <?php
                endwhile;
            ?>
          </ul>
                <?php
            endif;
            ?>
            
        </div>
    </section>

    <section class="img-section">
        <div class="container">
          <div class="img-wrapper">
            <img src="<?php the_field('service_image') ?>" alt="" />
          </div>
          <?php 
            if (get_field("contact_text")) {
            ?>
            <div class="block-text">
                <p class="text">
                <?php the_field('contact_text') ?>
                </p>
                <a href="<?php the_field('contact_button_link') ?>" class="button">
                <?php the_field('contact_button_text') ?>
                </a>
            </div>
          <?php } ?>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
          <h2 class="title">
            <?php the_field('service_content_title') ?>
          </h2>
        </div>
            <?php 
                if( have_rows('content_repeater') ):
            ?>
                <div class="container">
                    <?php
                    while ( have_rows('content_repeater') ) : the_row();
                        if (get_sub_field('content_text')) {
                        ?>
                            <p class="description">
                                <?php the_sub_field('content_text') ?>
                            </p>
                        <?php
                        }
                        if (get_sub_field('content_image')) {
                            ?>
                                <div class="img-wrapper">
                                    <img src="<?php the_sub_field('content_image') ?>" alt="">
                                </div>
                            <?php
                        }
                    endwhile;
                    ?>
                </div>
            <?php
                endif;
            ?>
        </div>
    </section>

    <section class="works" id="works">
        <div class="container">
          <h2 class="title">
            Explore More Properties
          </h2>
        </div>
        <div class="container works-wrapper">
          <div class="works-slider">
            <?php
              $args = array( 'post_type' => 'postservies', 'posts_per_page' => -1 );
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();  
              ?>
                <a class="slider-item" href="<?php the_permalink() ?>" data-aos="zoom-out-up">
                    <div class="slide-image">
                        <img src="<?php the_field('service_image') ?>" alt="">
                        <?php
                            if( have_rows('preview_block') ):?>
                                <div class="cards-wrapper">
                                    <?php while ( have_rows('preview_block') ) : the_row();
                                    ?>
                                    <div class="card">
                                        <p class="number"><?php the_sub_field('number') ?></p>
                                        <p class="text"><?php the_sub_field('text') ?></p>
                                    </div>
                                    <?php
                                    endwhile; ?>
                                </div>
                            <?php endif;
                        ?>
                    </div>
                    <div class="slider-content">
                        <p class="title">
                            <?php the_title() ?>
                        </p>
                        <p class="text">
                            <?php the_field('main_text') ?>
                        </p>
                    </div>
                </a>  
              <?php
              endwhile;
            ?>
          </div>
        </div>
    </section>

    <section class="map-wrapper" id="contact">
      <div class="container">
        <ul class="list-wrapper">
          <?php        
            if( have_rows('footer_contacts', $main_id) ): 
              ?>
                <?php
                while ( have_rows('footer_contacts', $main_id) ) : the_row();
                  ?>
                    <li class="list-item">
                      <p class="adress">
                        <img src="<?php the_sub_field('adress_image') ?>" alt="" />
                        <?php the_sub_field('adress_text') ?>
                      </p>
                      <p class="phone">
                        <img src="<?php the_sub_field('phone_image') ?>" alt="" />
                        <?php the_sub_field('phone_text') ?>
                      </p>
                    </li>
                  <?php
                endwhile;
              ?>
            <?php
            endif;
          ?>
        </ul>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6547.631766123008!2d-79.25260063340144!3d43.82476934485423!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4d7975400d3e9%3A0xe52433bfed384cee!2sMobile%20Basements!5e0!3m2!1sen!2sua!4v1607512177135!5m2!1sen!2sua" 
        width="100%" height="500" 
        frameborder="0" style="border:0;" 
        allowfullscreen="" aria-hidden="false" tabindex="0">
      </iframe>
    </section>

<?php
get_footer();
?>

