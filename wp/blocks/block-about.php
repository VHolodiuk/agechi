<section class="section about">
  <div class="circle move-left" data-time='1' data-long='100%'>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Circle.png" alt="">
  </div>
  <div class="container">
    <div class="title-wrapper">
      <h2 class="title">
        <?php block_field ('title'); ?>  
      </h2>
    </div>
    <div class="content-wrapper">
      <p class="title">
        <?php block_field ('producttitle'); ?>
      </p>
      <p class="text">
        <?php block_field ('producttextfirst'); ?>  
      </p>
      <p class="text">
        <?php block_field ('product-text-second'); ?>
      </p>
      <div class="partner-wrapper">
        <p class="text">
            <?php block_field('partner-text'); ?>
        </p>
        <ul class="list-wrapper">
          <li class="list-item"><img src="<?php block_field('partner-image-1');?>" alt=""></li>
          <li class="list-item"><img src="<?php block_field('partner-image-2');?>" alt=""></li>
          <li class="list-item"><img src="<?php block_field('partner-image-3');?>" alt=""></li>
          <li class="list-item"><img src="<?php block_field('partner-image-4');?>" alt=""></li>
        </ul>
      </div>
    </div>
    <div class="provide-wrapper">
      <p class="title">
        <?php block_field('provide-title');?>
      </p>
      <ul class="list-wrapper">
        <li class="list-item">
          <img src="<?php block_field('image-1'); ?>" alt="">
          <p class="text"><?php block_field('textfirst'); ?></p>
        </li>
        <li class="list-item">
          <img src="<?php block_field('image-2'); ?>" alt="">
          <p class="text"><?php block_field('textsecond'); ?></p>
        </li>
        <li class="list-item">
          <img src="<?php block_field('image-3'); ?>" alt="">
          <p class="text"><?php block_field('text-third'); ?></p>
        </li>
      </ul>
    </div>
  </div>
  <div class="circle-rect">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-circle.png" alt="">
  </div>
  <div class="rect move-right"  data-time='1'  data-long='40%'>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations_3D.png" alt="">
  </div>
</section>