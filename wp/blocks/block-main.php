<section class="section main-window">
  <div class="container">
    <div class="title-wrapper">
      <div class="circle move-left" data-time='1' data-long='100%'>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Circle.png" alt="">
      </div>
      <h1 class="title">
          <?php block_field ('title'); ?>
      </h1>
    </div>
    <p class="text">
        <?php block_field ('text'); ?>
    </p>
  </div>
  <div class="warm move-left"  data-time='1'  data-long='20%'>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/4-layers.png" alt="">
    </div>
    <div class="rectangle move-down"  data-time='1.5'  data-long='80%'>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/rectangle.png" alt="">
    </div>
</section>