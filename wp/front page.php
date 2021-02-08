<?php
/*
Template Name: front-page
*/
get_header();

$main_id = get_option( 'page_on_front' );
?>

<div class="window-wrapper"  id="main">

  <?php the_content($main_id) ?>

  <section class="section jobs" >
    <div class="container">
      <div class="title-wrapper">
        <div class="title">
          <?php the_field('jobs', $main_id) ?>
        </div>
      </div>
      <div class="slider-wrapper">
        <?php
          $args = array( 'post_type' => 'postjobs', 'posts_per_page' => -1 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
          ?>
            <div class="slider-item">
              <div class="img-wrapper">
                <?php if (has_post_thumbnail()) {
                  echo get_the_post_thumbnail();
                }
                else { ?>
                  <div class="img"></div>
                <?php  }               
                ?>
              </div>
              <div class="type"><?php the_field('type') ?></div>
              <p class="text"><?php the_title() ?></p>
              <button class="more"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/view.svg" alt=""></button>
            </div>
          <?php
          endwhile;
        ?>
      </div>
    </div>
  </section>

  <section class="section teams" >
    <div class="container">
      <div class="title-wrapper">
        <div class="title">
          <?php the_field('teams', $main_id) ?>
        </div>
      </div>
      <div class="slider-wrapper">
        <?php
          $args = array( 'post_type' => 'postteams', 'posts_per_page' => -1 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
          ?>
            <div class="slider-item">
              <div class="img-wrapper">
                <?php if (has_post_thumbnail()) {
                  echo get_the_post_thumbnail();
                }
                else { ?>
                  <div class="img"></div>
                <?php  }               
                ?>
              </div>
              <p class="type"><?php the_field('position'); ?></p>
              <p class="name"><?php the_title(); ?></p>
              <p class="text"><?php the_field('description'); ?></p>
              <ul class="list-wrapper">
                <?php
                  if( have_rows('social') ):?>
                    <?php while ( have_rows('social') ) : the_row();?>
                      <?php 
                        $facebook = get_sub_field( 'facebook' );
                        if (!empty($facebook) || strlen($youtube) > 0) { ?>
                        <li><a href="<?php the_sub_field( 'facebook' ); ?>" target="_blank">
                          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class="svg-inline--fa fa-facebook-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg>
                        </a></li>
                      <?php } ?>
                      <?php
                        $youtube = get_sub_field( 'youtube' );
                        if (!empty($youtube) || strlen($youtube) > 0) { ?>
                        <li><a href="<?php the_sub_field( 'youtube' ); ?>" target="_blank">
                          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                        </a></li>
                      <?php } ?>
                      <?php
                        $twitter = get_sub_field( 'twitter' );
                        if (!empty($twitter) || strlen($twitter) > 0) { ?>
                        <li><a href="<?php the_sub_field( 'twitter' ); ?>" target="_blank">
                          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                        </a></li>
                      <?php } ?>
                      <?php
                        $instagram = get_sub_field( 'instagram' );
                        if (!empty($instagram) || strlen($instagram) > 0) { ?>
                        <li><a href="<?php the_sub_field( 'instagram' ); ?>" target="_blank">
                          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                        </a></li>
                      <?php } ?>
                    <?php endwhile; ?>
                  <?php endif;
                ?>          
              </ul>
            </div>
          <?php
          endwhile;
        ?>
      </div>
    </div>
  </section>

</div>

<section class="job-full"> 
  <div class="container">
    <div class="job-slider-wrapper">
      <?php
        $args = array( 'post_type' => 'postjobs', 'posts_per_page' => -1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        ?>
          <div class="slider-item">
            <div class="img-wrapper">
              <?php if (get_field('full_image')) { ?>
                <img src="<?php the_field('full_image') ?>" alt="" class="img">
              <?php }
              else {
                echo get_the_post_thumbnail();
              }               
              ?>
            </div>
            <div class="content-wrapper">
              <p class="type">
                <?php the_field('type'); ?>
              </p>
              <p class="title">
                <?php the_title(); ?>
              </p>
              <div class="date-wrapper">
                <?php if (get_field('start')) { ?>
                  <p class="data">
                    <strong><?php the_field('start_label') ?></strong>
                    <?php the_field('start') ?>
                  </p>
                <?php } ?>
                <?php if (get_field('completed')) { ?>
                  <p class="data">
                    <strong><?php the_field('completed_label') ?></strong>
                    <?php the_field('completed') ?>
                  </p>
                <?php } ?>
              </div>
              <?php if (get_field('location')) { ?>
                <p class="data">
                  <strong><?php the_field('location_label') ?></strong>
                  <?php the_field('location') ?>
                </p>
              <?php } ?>
              <?php if (get_field('services')) { ?>
                <p class="data">
                  <strong><?php the_field('services_label') ?></strong>
                  <?php the_field('services') ?>
                </p>
              <?php } ?>
              <p class="text">
                <?php the_field('text') ?>
              </p>
            </div>
          </div>

        <?php
        endwhile;
      ?>

    </div>
  </div>
</section>

<?php
get_footer();
