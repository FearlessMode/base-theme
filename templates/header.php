<header role="banner">
  <a class="site-title" href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a>
  <nav role="navigation">
    <?php
      if(has_nav_menu('primary_navigation')){
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => 'menu'));
      }
    ?>
  </nav>
</header>
