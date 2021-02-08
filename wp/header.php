<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Teamplate" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.png" type="image/ico" />
  <meta name="keywords" content="Teamplate" />
  <?php wp_head(); ?>
</head>
<body>

<?php $main_id = get_option( 'page_on_front' ); ?>

  <header class="header" id="pagepiling">
    <div class="container">
      <a href="<?php echo get_home_url() ?>" class="logo-min"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.png" alt=""></a>
      <div class="menu-wrapper">
        <?php 
        $my_lang = pll_current_language();  
        if ( $my_lang == 'en' ) { 
          $args = array(
            'menu'            => "MainMenus", // какое меню нужно вставить (по порядку: id, ярлык, имя)
            'container'       => false, // блок, в который нужно поместить меню, укажите false, чтобы не помещать в блок
            'container_class' => 'menu-{menu slug}-container', // css-класс блока
            'menu_class'      => 'menu-items', // css-класс меню
            'echo'            => true, // вывести или записать в переменную
            'fallback_cb'     => 'wp_page_menu', // какую функцию использовать если меню не существует, укажите false, чтобы не использовать ничего
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>', // HTML-шаблон
            'depth'           => 0 // количество уровней вложенности
          );
          wp_nav_menu($args); 
        }
        if ( $my_lang == 'uk' ) { 
          $args = array(
            'menu'            => "MenuUa", // какое меню нужно вставить (по порядку: id, ярлык, имя)
            'container'       => false, // блок, в который нужно поместить меню, укажите false, чтобы не помещать в блок
            'container_class' => 'menu-{menu slug}-container', // css-класс блока
            'menu_class'      => 'menu-items', // css-класс меню
            'echo'            => true, // вывести или записать в переменную
            'fallback_cb'     => 'wp_page_menu', // какую функцию использовать если меню не существует, укажите false, чтобы не использовать ничего
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>', // HTML-шаблон
            'depth'           => 0 // количество уровней вложенности
          );
          wp_nav_menu($args); 
        }
        if ( $my_lang == 'sv' ) { 
          $args = array(
            'menu'            => "MenuSW", // какое меню нужно вставить (по порядку: id, ярлык, имя)
            'container'       => false, // блок, в который нужно поместить меню, укажите false, чтобы не помещать в блок
            'container_class' => 'menu-{menu slug}-container', // css-класс блока
            'menu_class'      => 'menu-items', // css-класс меню
            'echo'            => true, // вывести или записать в переменную
            'fallback_cb'     => 'wp_page_menu', // какую функцию использовать если меню не существует, укажите false, чтобы не использовать ничего
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>', // HTML-шаблон
            'depth'           => 0 // количество уровней вложенности
          );
          wp_nav_menu($args); 
        }
        ?>
      </div>
      <div class="button-wrapper">
        <div class="language-wrapper">
          <ul><?php pll_the_languages(array('display_names_as' => 'slug', 'show_flags' => 1, 'dropdown'=>1 )); ?></ul>
        </div>
        <button class="button">
          <?php the_field('gettouch', $main_id) ?>
        </button>
        <button class="close">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close.svg" alt="">
        </button>
      </div>
    </div>
  </header>
  <main>

